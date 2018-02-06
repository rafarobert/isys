<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends Base_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_sessions');
        $this->load->model('model_usuarios');
        $this->load->library('session');
    }

    public function index(){
        if($this->validate_modulo('base','usuarios')){
            $id_user = $this->session->getId();
            $oUser = $this->model_usuarios->get($id_user);
            if (is_object($oUser)){
                $this->data['oUser'] = $oUser;
                $this->data['subview'] = 'estic/dashboard/index';
            } else {
                $this->data['subLayout'] = 'start';
            }
        } else {
            $this->data['subLayout'] = 'admin/_construccion';
        }
    }
    public function modal(){
        $this->data['layout'] = 'modal_estic';
    }
}