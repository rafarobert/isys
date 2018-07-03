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
    public $ctrl_vasos;
    public $ctrl_detalles_pedidos;
    public $model_vasos;
    public $model_detalles_pedidos;

    function __construct()
    {
        parent::__construct();
        $this->load->model('base/model_ajax');

        // **************** Modelos **********************
        $this->model_vasos = Model_Vasos::create();
        $this->model_usuarios = Model_Usuarios::create();
        $this->model_vasos = Model_Vasos::create();
        $this->model_turnos = Model_Turnos::create();
        $this->model_sesiones = Model_Sesiones::create();
        $this->model_detalles_pedidos = Model_Detalles_pedidos::create();
        $this->model_porciones = Model_Porciones::create();

        // **************** Controladores ************************
        $this->ctrl_vasos = Ctrl_Vasos::create();
        $this->ctrl_usuarios = Ctrl_Usuarios::create();
        $this->ctrl_vasos = Ctrl_Vasos::create();
        $this->ctrl_turnos = Ctrl_Turnos::create();
        $this->ctrl_sesiones = Ctrl_Sesiones::create();
        $this->ctrl_detalles_pedidos = Ctrl_Detalles_pedidos::create();
        $this->ctrl_porciones = Ctrl_Porciones::create();
    }

    public function export($table = '', $funct = 'edit', $subview = ''){
        $SYS = config_item('sys');
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
        $ctrl_submod = "ctrl_".$submod;
        $model_submod = "model_".$submod;
        $view = $this->$ctrl_submod->$funct($subview);
        $fields = $this->$model_submod->get_new();
        $fields = std2array($fields);

        $result['view'] = $view;
        if(isset($fieldsP)){
            $fields_diff = array_diff_assoc($fieldsP,$fields);
            $fields_intersect = array_intersect_assoc($fields,$fieldsP);
            $result['diff'] = $fields_diff;
            $result['intersect'] = $fields_intersect;
        }
        echo json_encode($result);

        exit();
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
}
