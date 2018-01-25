<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends Estic_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        if($this->validate_modulo('estic','users')){
            $id_user = $this->session->getIdUser();
            $oUser = $this->model_users->get($id_user);
            if (is_object($oUser)){
                $this->data['oUser'] = $oUser;
                $this->data['subview'] = 'estic/dashboard/index';
            }
            $this->load->view("_layout_estic", $this->data);
        } else {
            $this->data['subview_layout'] = 'estic/_construccion';
            $this->load->view("_layout_construccion", $this->data);
        }
    }
    public function modal(){
        $this->data['layout'] = 'modal_estic';
        $this->load->view("_layout_estic", $this->data);
    }
}