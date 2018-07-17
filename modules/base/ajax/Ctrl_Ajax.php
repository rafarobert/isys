<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 03/05/2018
 * Time: 01:29 AM
 * @property CI_Migration $migration
 */
class Ctrl_Ajax extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('base/model_ajax');
    }

    public function export($table = '', $funct = 'edit', $subview = ''){
        $SYS = config_item('sys');
        $data = $this->input->post('data');
        list($mod, $submod) = getModSubMod($table);
        if($tableRelated = $this->input->get('verifyFields')){
            list($modP, $submodP) = getModSubMod($tableRelated);
            $modP = $SYS[$modP]['name'];
            $ctrl_submod = "ctrl_".$submodP;
            $model_submod = "model_".$submodP;
            $fieldsP = $this->$model_submod->get_new();
            $fieldsP = std2array($fieldsP);
        };
        $mod = $SYS[$mod]['name'];
        // ************** inicia el submodulo ************
        $this->{"init_$submod"}(true);
        // **********************
        $ctrl_submod = "ctrl_".$submod;
        $model_submod = "model_".$submod;
        list($view, $error) = $this->$ctrl_submod->$funct($subview);
        $fields = $this->$model_submod->get_new();
        $fields = std2array($fields);

        $result['view'] = $view;
        $result['error'] = $error;
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
            $fields = $this->dbforge->getArrayFieldsFromTable($table)[$table];
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
                $vFields['error'] = 'Algo salio mal, revisa el nombre de la tabla';
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
        $this->{"init_$table"}();
        $response = $this->{"model_$table"}->{$method}($pk);
        if(validateArray($response,'message')){
            $message = preg_match_all("/^`/",$response['message']);
            $aMessage = explode('CONSTRAINT',$response['message']);

            $response['error'] = $response['message'];
        } else {
            $response['error'] = 'ok';
        }
        echo json_encode($response);
    }




    private function init_comandas($both){
        if($both){
            $this->ctrl_comandas = Ctrl_Comandas::create();
        }
        $this->model_comandas = Model_Comandas::create();
    }
    private function init_vasos($both){
        if($both){
            $this->ctrl_vasos = Ctrl_Vasos::create();
        }
        $this->model_vasos = Model_Vasos::create();
    }
    private function init_porciones($both){
        if($both){
            $this->ctrl_porciones = Ctrl_Porciones::create();
        }
        $this->model_porciones = Model_Porciones::create();
    }
    private function init_detalles_pedidos($both){
        if($both){
            $this->ctrl_detalles_pedidos = Ctrl_Detalles_pedidos::create();
        }
        $this->model_detalles_pedidos = Model_Detalles_pedidos::create();
    }
    private function init_productos($both){
        if($both){
            $this->ctrl_productos = Ctrl_Productos::create();
        }
        $this->model_productos = Model_Productos::create();
    }
    private function init_usuarios($both){
        if($both){
            $this->ctrl_usuarios = Ctrl_Usuarios::create();
        }
        $this->model_usuarios= Model_Usuarios::create();
    }
    private function init_turnos($both){
        if($both){
            $this->ctrl_turnos = Ctrl_Turnos::create();
        }
        $this->model_turnos= Model_Turnos::create();
    }
    private function init_sesiones($both){
        if($both){
            $this->ctrl_sesiones = Ctrl_Sesiones::create();
        }
        $this->model_sesiones= Model_Sesiones::create();
    }
}
