<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/2/2017
 * Time: 12:34
 */

class Ctrl_Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){

        if(validate_modulo('base','usuarios')){
            $id_user = $this->session->getIdUserLoggued() ;
            $oUser = $this->model_usuarios->get($id_user);
            if (is_object($oUser)){
                $this->data['oUser'] = $oUser;
                $this->data['subview'] = 'admin/dashboard/index';
            } else {
                $this->data['subLayout'] = 'start';
            }
        } else {
            $this->data['subLayout'] = 'admin/_construccion';
        }
    }

    public function modal(){
        $this->data['subLayout'] = 'start';
    }
}