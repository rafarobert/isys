<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 2/22/2018
 * Time: 12:01 AM
 */

class ES_Backend_Controller extends ES_Controller
{
    public function init(){

    }

    function __construct()
    {
        $this->initLoaded();
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
//        $this->load->library('request');
        $this->load->library('encryption');
//        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if(validate_modulo('base','users')) {
            $this->load->model('base/model_users');
        }
        if(validate_modulo('base','sessions')) {
            $this->load->library('session');
            $this->session->userTable = 'ci_users';
            $this->session->userIdTable = 'id_user';
            $this->session->sessKey = config_item('sess_key_admin');
            $sessUserData = null;

            if ($this->session->isLoguedin()) {
                $this->data['subLayout'] = $this->uri->segment(1) == 'base' ? 'backend/base/_subLayout' : 'backend/admin/_subLayout';
                $this->CI->data['subview'] = 'admin/dashboard/index';
                $sessUserData = (object)$this->session->get_userdata()[config_item('sess_key_admin')];
                $this->data['oUser'] = $sessUserData;
            } else {
                $this->data['subLayout'] = 'start';
                if ($this->input->post('signup') == 'Registrarse') {
                    $this->session->signUp();
                } else if ($this->input->post('login') == 'Ingresar') {
                    $this->session->login();
                }
            }

            if(validate_modulo('base','tables')){
                $this->load->model('base/model_tables');
//                $this->data['oSysOptions'] = CiOptionsQuery::create()->find();
//                $this->data['oSysSettings'] = CiSettingsQuery::create()->find();
//                $this->data['oSysOptionsForTables'] = CiOptionsQuery::create()
//                    ->filterByIdSetting(1)
//                    ->find();

                if (is_object($sessUserData)) {
                    if($sessUserData->id_role == 1){
                        $this->data['oSysTables'] = CiTablesQuery::create()->find();
                    } else {
                        $this->data['oSysTables'] = CiTablesQuery::create()->
                        filterByIdRoles($sessUserData->id_role)->
                        find();
                    }
                }
            }
        }
//        $editTagsSet = CiSettingsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTagsOpt = CiOptionsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTags = array_merge($editTagsSet,$editTagsOpt);
//        $this->data['editTags'] = $editTags;
    }
}