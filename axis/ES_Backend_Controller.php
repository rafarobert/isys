<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 2/22/2018
 * Time: 12:01 AM
 */

use Propel\Runtime\ActiveQuery\Criteria as Criteria;

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
        $this->load->library('session');
        $this->fromAjax = $this->input->post('fromAjax') ? true : false;
        $this->fromFiles = isset($_FILES) && validateVar($_FILES,'array');
        $this->data['uri_string'] = $this->uri->uri_string();
        $excepts = ['ajax'];
        $this->load->library('migration');
        if (!$CI) {
            if (validate_modulo('base', 'users')) {
                if(!in_array($this->router->class, $excepts)){
                    $this->onLoad();
                }
            }
        }
        $this->CI_global = $vars = get_defined_vars()['CI'];

//        $editTagsSet = CiSettingsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTagsOpt = CiOptionsQuery::create()->select(['EditTag'])->find()->getData();
//        $editTags = array_merge($editTagsSet,$editTagsOpt);
//        $this->data['editTags'] = $editTags;
    }

    public function onLoad()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
//        $this->load->library('request');
        $this->load->library('encryption');
//        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        if (validate_modulo('base', 'users')) {
            $this->load->model('base/model_users');
        } else {
            show_error('No se pudo cargar el modulo users');
        }
        if (validate_modulo('base', 'sessions')) {
            $this->load->model('base/model_users');
            $this->session->userTable = 'ci_users';
            $this->session->userIdTable = 'id_user';
            $this->session->sessKey = config_item('sess_key_admin');

            if ($this->session->isLoguedin()) {
                $this->CI->data['subview'] = 'admin/dashboard/index';
                $this->aSessData = (object)$this->session->get_userdata()[config_item('sess_key_admin')];
                $this->data['aSessData'] = std2array($this->aSessData);
                $this->data['oUserLogguedIn'] = $this->oUserLogguedIn = $this->model_users->setFromData($this->aSessData);
                $this->data['aUserLogguedIn'] = $this->oUserLogguedIn->getArrayData();
                $data = array(
                    'id_user' => $this->oUserLogguedIn->getIdUser()
                );

                $this->session->set_userdata($data);
            } else if ($this->input->post('login') == 'Ingresar' || $this->input->post('login') == 'Desbloquear') {
                $this->session->login();
            } else {
                $this->data['subLayout'] = 'login';
                if ($this->input->post('signup') == 'Registrarse') {
                    $this->session->signUp();
                } else if ($this->input->post('login') == 'Ingresar') {
                    $this->session->login();
                }
            }

//                $this->data['oSysOptions'] = CiOptionsQuery::create()->find();
//                $this->data['oSysSettings'] = CiSettingsQuery::create()->find();
//                $this->data['oSysOptionsForTables'] = CiOptionsQuery::create()
//                    ->filterByIdSetting(1)
//                    ->find();

            if (is_object($this->oUserLogguedIn)) {
                if (validate_modulo('base', 'tables')) {
                    $this->load->model('base/model_tables');
                }
                if (validate_modulo('admin', 'empleados')) {
                    $this->load->model('admin/model_empleados');
                }
                if (isset($this->model_empleados)) {
                    $this->data['oEmpleado'] = $this->model_empleados->findOneByIdUser($this->oUserLogguedIn->getIdUser());
                }
                $this->aRolesFromSess[] = $this->oUserLogguedIn->getIdRole();
                $tablesEnabled = array();
                if (isset($this->aSessData->ids_roles)) {
                    foreach ($this->aSessData->ids_roles as $sessRole) {
                        if (!in_array($sessRole, $this->aRolesFromSess)) {
                            $this->aRolesFromSess[] = $sessRole;
                        }
                        $tablesEnabled[] = CiTablesRolesQuery::create()
                            ->select(['id_table'])
                            ->filterByIdRole($sessRole)
                            ->find()
                            ->toArray();
                    }
                }
                $this->data['aRolesFromSess'] = $this->aRolesFromSess;
                $aTablesIds = array();
                $aTablesUrls = array();
                foreach ($tablesEnabled as $tables) {
                    foreach ($tables as $idTable) {
                        if (!in_array($idTable, $aTablesUrls)) {
                            $aTablesIds[] = $idTable;
                            $aTablesUrls[] = CiTablesQuery::create()
                                ->select(['url'])
                                ->findOneByIdTable($idTable);
                        }
                    }
                }

                $aExcepts = ['admin/', 'base/', 'base/sessions', 'admin/dashboard', 'base/dashboard', 'sys/migrate', 'sys/ajax'];
                $aTablesUrls = array_merge($aTablesUrls, $aExcepts);
                $uri = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                if (in_array($uri, $aTablesUrls)) {
                    if ($this->oUserLogguedIn->getIdRole() == 1) {
                        $this->data['oSysTables'] = CiTablesQuery::create()->find();
                        $this->data['oSysModules'] = CiModulesQuery::create()->find();
                    } else {
                        $this->data['oSysModules'] = CiModulesQuery::create()->find();
                        $this->data['oSysTables'] = CiTablesQuery::create()->filterByIdTable($aTablesIds, Criteria::IN)->find();
                    }
//                    if($this->aSessData->id_role == 1){
//                        $this->data['oSysTables'] = Model_Tables::create()->find();
//                        $this->data['oSysModules'] = Model_Modules::create()->find();
//                    } else {
//                        $this->data['oSysModules'] = Model_Modules::create()->find();
//                        $this->data['oSysTables'] = Model_Tables::create()->filterByIdNivelRole($this->oUserLogguedIn->id_role);
//                    }
                } else {
                    $this->data['oSysTables'] = array();
                    $this->data['oSysModules'] = array();
                    $this->session->locked();
                }

            }
        }
    }
}