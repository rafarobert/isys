<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 2/22/2018
 * Time: 12:01 AM
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class ES_Backend_Controller extends ES_Controller
{
    function __construct()
    {
        $CI = $this->initLoaded();
        parent::__construct();
        $this->data['subLayout'] = 'backend/_subLayout';

        $this->data['siteTitle'] = config_item('site_title');
        $this->data['metaTitle'] = config_item('meta_title');
        $this->data['metaName'] = config_item('meta_name');
        $this->data['metaKeywords'] = config_item('meta_keywords');
        $this->data['metaThemeColor'] = config_item('meta_theme-color"');
        $this->data['metaDescription'] = config_item('meta_descripcion');

        // ------------- img configurations ----------------
        $this->data['imgMaxHeight'] = config_item('img_max_height');
        $this->data['imgMaxWidth'] = config_item('img_max_width');
        $this->data['fileMaxSize'] = config_item('file_max_size');
        $this->data['fileTypes'] = config_item('file_types');
        $this->data['fileTypesJs'] = config_item('file_types_js');
        // -------------------------------------------------
        $this->fromAjax = $this->input->post('fromAjax') ? true : false;
        $this->data['uri_string'] = $this->uri->uri_string();

        if(!$CI || strstr($this->uri->uri_string(), 'sys/migrate')){
            $this->onLoad();
        }

//        $editTagsSet = CiSettingsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTagsOpt = CiOptionsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTags = array_merge($editTagsSet,$editTagsOpt);
//        $this->data['editTags'] = $editTags;
    }

    public function onLoad() {
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
                $this->CI->data['subview'] = 'admin/dashboard/index';
                $sessUserData = (object)$this->session->get_userdata()[config_item('sess_key_admin')];
                $this->data['oUser'] = $sessUserData;
                $data = array(
                    'id_user' => $sessUserData->id_user
                );
                $this->session->set_userdata($data);
            } else if($this->input->post('login') == 'Ingresar'){
                $this->session->login();
            } else {
                $this->data['subLayout'] = 'login';
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
                        $this->data['oSysModules'] = CiModulesQuery::create()->find();
                    } else {
                        $this->data['oSysModules'] = CiModulesQuery::create()->find();
                        $this->data['oSysTables'] = CiTablesQuery::create()->
                        filterByIdNivelRole($sessUserData->id_role)->
                        find();
                    }
                }
            }
        }
    }
}