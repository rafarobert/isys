<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 03/05/2018
 * Time: 01:29 AM
 * @property CI_Migration $migration
 */


class Ctrl_Ajax extends ES_Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sys/model_ajax');
    }

    public function export($table = '', $funct = 'edit', $subview = ''){
        $SYS = config_item('sys');
        $data = $this->input->post('data');
        list($mod, $submod) = getModSubMod($table);
        if($tableRelated = $this->input->get('verifyFields')){
            list($modP, $submodP) = getModSubMod($tableRelated);
            $modP = $SYS[$modP]['name'];
            $this->{"init_$submodP"}(true);
            $ctrl_submod = "ctrl_".$submodP;
            $model_submod = "model_".$submodP;
            $fieldsP = $this->$model_submod->get_new();
            $fieldsP = std2array($fieldsP);
        };
//        $mod = $SYS[$mod]['name'];
        // ************** inicia el submodulo ************
        $this->{"init_$submod"}(true);
        // **********************
        $ctrl_submod = "ctrl_".$submod;
        $model_submod = "model_".$submod;
        $result = $this->$ctrl_submod->$funct($subview);
        $fields = $this->$model_submod->get_new();
        $fields = std2array($fields);

        if(isset($fieldsP)){
            $fields_diff = array_diff_assoc($fieldsP,$fields);
            $fields_intersect = array_intersect_assoc($fields,$fieldsP);
            $result['diff'] = $fields_diff;
            $result['intersect'] = $fields_intersect;
        }
        echo json_encode($result);

        exit();
    }

    public function exportFields($table = ''){
        $aReturn = array();
        if(validateVar($table)){
            $fields = $this->dbforge->getArrayFieldsFromTable($table);
            $vFields = array();
            foreach ($fields as $field => $settings){
                if(compareArrayStr($settings,'table','ci_options')){
                    $vFields[] = $field;
                }
            }
            if(validateVar($vFields, 'array')){
                $fields = array_keys($fields);
                $fields = array_combine($fields,$fields);
                $vFields = array_combine($vFields,$vFields);
                $vFields['fields'] = $fields;
                $vFields['error'] = 'ok';
            } else {
                $vFields['error'] = 'La tabla seleccionada no contiene columnas que referencien a la tabla ci_options';
            }
            $aReturn = $vFields;
        } else {
            $aReturn['error'] = 'Debe introducir como parametro el nombre de una tabla';
        }
        echo json_encode($aReturn);
    }

    public function filterOptions(){
        $name = $this->input->post('name');
        $pk = $this->input->post('pk');
        $checked = $this->input->post('check');
        $tipo = str_replace('id_option_','',$name);
        if($checked == 'true'){
            $oTipo = HbfOpcionesQuery::create()
                ->findOneByIdOption($pk);
            $aTipo = array(
                'id_option' => $oTipo->getIdOption(),
                'tabla' => $oTipo->getTabla(),
                'tipo' => $oTipo->getTipo(),
                'nombre' => $oTipo->getNombre(),
                'descripcion' => $oTipo->getDescripcion()
            );
            echo json_encode($aTipo);
        } else {
            $oTipos = HbfOpcionesQuery::create()
                ->filterByTipo($tipo)
                ->find();
            foreach ($oTipos as $k => $oTipo){
                $aTipos[$k] = array(
                    'id_option' => $oTipo->getIdOption(),
                    'tabla' => $oTipo->getTabla(),
                    'tipo' => $oTipo->getTipo(),
                    'nombre' => $oTipo->getNombre(),
                    'descripcion' => $oTipo->getDescripcion()
                );
            }
            echo json_encode($aTipos);
        }
    }

    public function deleteRegistryFromDB(){
        $dir = $this->input->post('dir');
        $dir = preg_replace(['/^\//','/\/$/'],'',$dir);
        list($mod, $table, $method, $pk) = substr_count($dir,'/') == 3 ? explode('/',$dir) : [];
        $this->{"init_$table"}(true);
        $response = $this->{"model_$table"}->{$method}($pk);
        if(validateArray($response,'message') && validateArray($response,'code')){
            preg_match_all("/`(.*?)`/",$response['message'],$aMessage);
            if(validateArray($aMessage,1)){
                $response['constraints'] = $aMessage[1];
                if(compareArrayNum($response,'code',1451)){
                    list($foreignMod, $foreignTable) = getModSubMod($aMessage[1][1]);
                    list($localMod, $localTable) = getModSubMod($aMessage[1][4]);
                    list($foreignTableS, $foreignP) = setSingularPlural($foreignTable);
                    list($localTableS, $localTableP) = setSingularPlural($localTable);
                    $response['SQL'] = $response['message'];
                    $response['message'] = "No se puede eliminar el registro debido a que existe un $foreignTableS que hace referencia a esta $localTableS";
                }
            }
            $response['error'] = 'Hubo un error al eliminar el registro';
        } else {
            $response = array();
            $view = $this->{"ctrl_$table"}->index();
            if(validateVar($view,'array')){
                list($response['view'], $response['error']) = $view;
            } else {
                $response['error'] = 'ok';
                $response['view'] = $view;
            }
            $response['message'] = 'El registro fue eliminado de forma definitiva exitosamente';
        }
        echo json_encode($response);
    }

    public function remove(){
        $this->load->library('migration');
        if(function_exists('initStaticTableVars')){
            initStaticTableVars($this);
        }

        $post = $this->input->post();
        $dir = '';
        if(inArray('dir',$post)){
            $dir = $post['dir'];
        }
        $dir = str_replace(WEBSERVER,'',$dir);
        $path = preg_replace(['/^\//','/\/$/'],'',$dir);
        $sys = config_item('sys');
        $mod = null;
        $class = null;
        $method = null;
        $pk = null;
        if(substr_count($path,'/') == 3 ){
            list($mod, $class, $method, $pk) = explode('/',$path);
        } else if(substr_count($path,'/') == 2 ){
            list($mod, $class, $method) = explode('/',$path);
        } else if(substr_count($path,'/') == 1 ){
            list($class, $method) = explode('/',$path);
        } else if(substr_count($path,'/') == 0){
            list($method) = explode('/',$path);
        }
        $method = isString($method) ? $method : $this->router->method;
        $class = isString($class) ? $class : $this->router->class;
        $mod = isString($mod) ? $mod : $this->router->module;
        $pk = isString($pk) || isNumeric($pk) ? $pk : '';
        $acr = $sys[$mod];

        $this->{"init".ucfirst($class)}(true);
        $response = $this->{"model_$class"}->{$method}($pk);
        if(validateArray($response,'message') && validateArray($response,'code')){
            preg_match_all("/`(.*?)`/",$response['message'],$aMessage);
            if(validateArray($aMessage,1)){
                $response['constraints'] = $aMessage[1];
                if(compareArrayNum($response,'code',1451)){
                    list($foreignMod, $foreignTable) = getModSubMod($aMessage[1][1]);
                    list($localMod, $localTable) = getModSubMod($aMessage[1][4]);
                    list($foreignTableS, $foreignP) = setSingularPlural($foreignTable);
                    list($localTableS, $localTableP) = setSingularPlural($localTable);
                    $response['SQL'] = $response['message'];
                    $response['message'] = "No se puede eliminar el registro debido a que existe un $foreignTableS que hace referencia a esta $localTableS";
                }
            }
            $response['error'] = 'Hubo un error al eliminar el registro';
        } else {
            $response = array();
            $view = $this->{"ctrl_$class"}->index();
            if(validateVar($view,'array')){
                list($response['view'], $response['error']) = $view;
            } else {
                $response['error'] = 'ok';
                $response['view'] = $view;
            }
            $response['message'] = 'El registro fue eliminado de forma exitosa';
        }
        echo json_encode($response);
        exit;
    }
}
