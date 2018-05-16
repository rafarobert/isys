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
    public $ctrl_detalle_vasos;
    function __construct()
    {
        parent::__construct();
        $this->load->model('base/model_ajax');

        // **************** Modelos **********************
        $this->model_vasos = Model_Vasos::create();
        $this->model_detalle_vasos = Model_Detalles_vasos::create();

        // **************** Controladores ************************
        $this->ctrl_vasos = Ctrl_Vasos::create();
        $this->ctrl_detalle_vasos = Ctrl_Detalles_vasos::create();
    }

    public function export($table = '', $funct = 'edit'){
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
        $view = $this->$ctrl_submod->$funct();
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
}