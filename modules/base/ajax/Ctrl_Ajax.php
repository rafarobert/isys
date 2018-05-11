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
        $this->ctrl_vasos = Ctrl_Vasos::create();
        $this->ctrl_detalle_vasos = Ctrl_Detalles_vasos::create();
    }

    public function export($table = '', $funct = 'edit'){
        list($mod, $submod) = getModSubMod($table);
        $SYS = config_item('sys');
        $mod = $SYS[$mod]['name'];
        $submod = "ctrl_".$submod;
        $view = $this->$submod->$funct();
        echo $view;
        exit();
    }
}
