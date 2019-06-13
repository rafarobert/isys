<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class ES_Controller extends ES_Ctrl_Vars
{
    const STRING = 'string';
    const ARRAYS = 'array';
    const NUMERIC = 'numeric';
    public $fromAjax = false;
    public $fromFiles = false;
    public $error = 'ok';
    public $errors = [];
    public $model_initialized;

    public $request;
    public $response;
    public $restful;
    public $oauth;
    public $subjectP;
    public $subjectS;
    public $CI_global;
    /**
     * @var Model_Users $oUserLogguedIn
     * @var Model_Persons $oPersonLogguedIn
     */
    public $oUserLogguedIn;
    public $oPersonLogguedIn;
    public $aSessData;
    public $aRolesFromSess;

    public $data = array();

    function __construct(){

      $CI = $this->initLoaded();
      parent::__construct();

      $this->load->helper('security');
      $this->img_path = realpath(ROOTPATH.'assets/img/');

      $this->data['siteTitle'] = config_item('site_title');;
      $this->data['siteName'] = config_item('site_name');
      $this->data['siteDomain'] = config_item('site_domain');
      $this->data['metaReplyTo'] = config_item('meta_reply_to');
      $this->data['metaLanguaje'] = config_item('meta_languaje');
      $this->data['metaViewport'] = config_item('meta_viewport');
      $this->data['metaImage'] = config_item('meta_image');
      $this->data['favIcon'] = config_item('fav_icon');

      //$this->fromAjax = $this->input->post('fromAjax');
      $this->fromAjax = $this->router->class == 'ajax' ? true : $this->input->post('fromAjax');
      $this->data['layout'] = $this->uri->segment(1) == 'front' ? 'frontend/_layout' : 'backend/_layout';
      $this->data['subLayout'] = 'backend/_subLayout';
      $this->data['errors'] = array();
      $this->load->library('session');
      $this->fromFiles = isset($_FILES) && validateVar($_FILES,'array');
      $this->data['uri_string'] = $this->uri->uri_string();
      //$excepts = ['ajax'];
      $this->load->library('migration');
      if (!$CI) {
        if (validate_modulo('estic', 'users')) {
            $this->onLoad();
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

    if (validate_modulo('estic', 'persons')) {
      $this->load->model('estic/model_persons');
    } else {
      show_error('No se pudo cargar el modulo persons');
    }
    if (validate_modulo('estic', 'users')) {
      $this->load->model('estic/model_users');
    } else {
      show_error('No se pudo cargar el modulo users');
    }
    if (validate_modulo('estic', 'sessions')) {
      $this->load->model('estic/model_sessions');

      if ($this->session->isLoguedin()) {
        $this->CI->data['subview'] = $this->session->environment.'/dashboard/index';
        list($this->oUserLogguedIn,$this->oPersonLogguedIn) = $this->setSessData();
      } else if (compareStrStr($this->input->get_post_request('login'),'Ingresar') || compareStrStr($this->input->get_post_request('login'), 'Desbloquear')) {
        $this->session->login();
        list($this->oUserLogguedIn, $this->oPersonLogguedIn) = $this->setSessData();
      } else {
        $this->data['subLayout'] = 'pages/login';
        if (compareStrStr($this->input->get_post_request('signup'),'Registrarse')) {
          $this->session->signUp();
          list($this->oUserLogguedIn, $this->oPersonLogguedIn) = $this->setSessData();
        } else if (compareStrStr($this->input->get_post_request('login'),'Ingresar')) {
          $this->session->login();
          list($this->oUserLogguedIn, $this->oPersonLogguedIn) = $this->setSessData();
        }
      }

//                $this->data['oSysOptions'] = CiOptionsQuery::create()->find();
//                $this->data['oSysSettings'] = CiSettingsQuery::create()->find();
//                $this->data['oSysOptionsForTables'] = CiOptionsQuery::create()
//                    ->filterByIdSetting(1)
//                    ->find();

      if (is_object($this->oUserLogguedIn) && is_object($this->oPersonLogguedIn)) {

        $uri = $this->uri->segment(1) . '/' . $this->uri->segment(2);
        $aTablesUrls = array();

        if($uri != 'sys/ajax'){
          if (validate_modulo('estic', 'tables')) {
            $this->load->model('estic/model_tables');
            $this->aRolesFromSess[] = $this->oUserLogguedIn->getIdRole();
            $tablesEnabled = array();
            $idsRoles = isset($this->aSessData->ids_roles) ? $this->aSessData->ids_roles :
              isset($this->aSessData['ids_roles']) ? $this->aSessData['ids_roles'] : [];

            foreach ($idsRoles as $sessRole) {
              if (!in_array($sessRole, $this->aRolesFromSess)) {
                $this->aRolesFromSess[] = $sessRole;
              }
              $tablesEnabled[] = EsTablesRolesQuery::create()
                ->select(['id_table'])
                ->filterByIdRole($sessRole)
                ->find()
                ->toArray();
            }

            $this->data['aRolesFromSess'] = $this->aRolesFromSess;
            $aTablesIds = array();
            $aTablesUrls = array();
            foreach ($tablesEnabled as $tables) {
              foreach ($tables as $idTable) {
                if (!in_array($idTable, $aTablesUrls)) {
                  $aTablesIds[] = $idTable;
                  $aTablesUrls[] = EsTablesQuery::create()
                    ->select(['url'])
                    ->findOneByIdTable($idTable);
                }
              }
            }
          }
        }


        $aExcepts = [
          'admin/',
          'estic/',
          'estic/sessions',
          'admin/dashboard',
          'estic/dashboard',
          'sys/migrate',
          'sys/ajax',
            'sys/config',
          'twilio/send'
        ];
        $aTablesUrls = array_merge($aTablesUrls, $aExcepts);

        if(!in_array($uri, $aTablesUrls)){

            $this->data['oSysTables'] = array();
            $this->data['oSysModules'] = array();
            unset($this->oUserLogguedIn);
            $this->session->locked();
            return false;

        } else if($uri == 'sys/ajax') {

          return true;

        } else if($this->session->environment == 'sys' && $this->session->sessKey != config_item('sess_key_estic')){

            $this->data['oSysTables'] = array();
            $this->data['oSysModules'] = array();
            unset($this->oUserLogguedIn);
            $this->session->locked();
            return false;


        } else {

            if ($this->oUserLogguedIn->getIdRole() == 1) {
                $this->data['oSysTables'] = EsTablesQuery::create()->find();
                $this->data['oSysModules'] = EsModulesQuery::create()->find();
            } else {
                $this->data['oSysModules'] = EsModulesQuery::create()->find();
                $this->data['oSysTables'] = EsTablesQuery::create()->filterByIdTable($aTablesIds, Criteria::IN)->find();
            }
//                    if($this->aSessData->id_role == 1){
//                        $this->data['oSysTables'] = Model_Tables::create()->find();
//                        $this->data['oSysModules'] = Model_Modules::create()->find();
//                    } else {
//                        $this->data['oSysModules'] = Model_Modules::create()->find();
//                        $this->data['oSysTables'] = Model_Tables::create()->filterByIdNivelRole($this->oUserLogguedIn->id_role);
//                    }
          return true;
        }

      } else {
        show_error('Debes iniciar sesión');
      }
    } else {
      show_error('No se pudo cargar el modulo sessions');
    }
  }

  public function setSessData(){
        $oUserData = (object)$this->session->get_userdata();
        $sessKeyAdmin = config_item('sess_key_admin');
        $sessKeyEstic = config_item('sess_key_estic');
        $sessKeySys = config_item('sess_key_sys');

    if(isset($oUserData->$sessKeyAdmin)){
        $this->aSessData = $oUserData->$sessKeyAdmin;
    } else if(isset($oUserData->$sessKeyEstic)){
        $this->aSessData = $oUserData->$sessKeyEstic;
    } else if(isset($oUserData->$sessKeyEstic)){
        $this->aSessData = $oUserData->$sessKeySys;
    } else {
        return null;
    }

    $this->data['aSessData'] = std2array($this->aSessData);

    /**
     * @var Model_Users $oUserLogguedIn
     * @var Model_Persons $oPersonLogguedIn
     */

    $this->data['oUserLogguedIn'] = $oUserLogguedIn = $this->model_users->setFromData($this->aSessData);
    $this->data['aUserLogguedIn'] = $oUserLogguedIn->getArrayData();
    $this->data['oPersonLogguedIn'] = $oPersonLogguedIn = $this->model_persons->findOneByIdPerson($oUserLogguedIn->getIdPerson());
    $this->data['aPersonLogguedIn'] = $oPersonLogguedIn->getArrayData();
    $data = array(
      'id_user' => $oUserLogguedIn->getIdUser(),
      'id_person' => $oUserLogguedIn->getIdPerson()
    );

    $this->session->set_userdata($data);

    return [$oUserLogguedIn, $oPersonLogguedIn];
  }

    public function loadTemplates($view, $data = array()){
        $this->load->view("header");
        $this->load->view($view, $data);
        $this->load->view("footer");
    }

    public function initLoaded(){
        $CI=CI_Controller::get_instance();
        if($CI != null){
            foreach ($CI as $instance => $value) {
                if($instance == 'data'){
                    foreach ($CI->$instance as $dataKey => $dataVal){
                        $this->$instance[$dataKey] = $dataVal;
                    }
                } else {
                    $this->$instance = $value;
                }
            }
        }
        if(isset($this->load)){
            $models = $this->load->_ci_models;
            foreach ($models as $alias => $name) {
                $this->$name = new $name();
            }
        }
        return $CI;
    }

    public function loadView($path, $error = ''){
        $path = preg_replace(['/^\//','/\/$/'],'',$path);
        $mod = null;
        $class = null;
        $method = null;

        if(substr_count($path,'/') == 2 ){
            list($mod, $class, $method) = explode('/',$path);
        } else if(substr_count($path,'/') == 1 ){
            list($class, $method) = explode('/',$path);
        } else if(substr_count($path,'/') == 0){
            list($method) = explode('/',$path);
        }
        $method = isString($method) ? "$method" : '';
        $class = isString($class) ? "$class/" : '';
        $mod = isString($mod) ? "$mod/" : '';
        if ($this->input->post('fromAjax') || $this->fromAjax || isArray($_FILES)) {
            if (isString($this->error) || isArray($this->errors)){
                return [
                    'message' => validation_errors(),
                    'required' => validation_errors(),
                    'error' => $this->error,
                    'errors' => $this->errors,
                    'redirect' => isObject($this->oUserLogguedIn) ? '' : '/sys/ajax/locked',
                    'view' => $this->load->view($mod.$class.$method , $this->data, true)
                ];
            } else {
                return $this->load->view("$mod/$class/$method", $this->data, true);
            }
            $this->data["subview"] = $mod.$class.$method;
        } else if(isset($this->printView) && $this->printView) {
            unset($this->printView);

            return $this->load->view($mod.$class.$method, $this->data, true);
        } else {
            $this->data["subview"] = $mod.$class.$method;
        }

        $object = 'o'.ucfirst($this->subjectS);
        foreach ($this->input->post() as $keyPost => $dataPost){
            if(objectHas($this->data[$object],$keyPost,false)){
                $this->data[$object]->$keyPost = $dataPost;
            } else if(objectHas($this->data[$object],setObject($keyPost),false)){
                $this->data[$object]->{setObject($keyPost)}= $dataPost;
            } else if(objectHas($this->data[$object],ucfirst(setObject($keyPost)),false)){
                $this->data[$object]->{ucfirst(setObject($keyPost))} = $dataPost;
            } else if($response = objectHas($this->data[$object],ucfirst(setObject($keyPost)),false, true, true)){
                $this->data[$object]->{is_string($response) ? $response : ucfirst(setObject($keyPost))} = $dataPost;
            }
        }
    }

    public function filterIdOrView($id, $view){
        if($id == null && (isNumeric($view) || isString($view))){
            if(inArray('editTags',$this->data )){
                if(!inArray("edit-$view",$this->data['editTags'])){
                    $id = $view ;
                    $view = null;
                }
            } else {
                $id = $view;
                $view = null;
            }
        }
        return [$id,$view];
    }

    /**
     * @var Model_Files $oFile
     */
    public function doUpload($oFile = null){
        if (!$oFile->doUpload()) {
            $this->errors[] = $this->upload->display_errors();
            $this->error = $this->upload->display_errors();
        } else {
            $oFile->setFromData($oFile->getFileData());
        }
        return $oFile;
    }

  /**
   * @var Model_Files $oFile
   */
//    public function saveThumbs($oFile = null){
//        if(isset($oFile->aData)){
//            $this->data['aData'] = $oFile->aData;
//        }
//        $id = $oFile->getIdFile();
//        if(validateVar($this->upload->data_thumbs,'array') || validateVar($this->upload->data_thumbs,'object')){
//            foreach ($this->upload->data_thumbs as $index => $thumb){
//                $thumb['id_parent'] = $id;
//                $this->data['aData']['thumbs'][$index] = $this->model_files->save($thumb);
//            }
//            $oFile->setThumbs();
//        } else if($oFile->getIdFile() !== null && $oFile->getNroThumbs() > 0){
//            $thumbs = $this->model_files->filterByIdParent($id);
//            foreach ($thumbs as $index => $thumb){
//                $thumb = $this->model_files->setFromData($this->input->post(),$thumb);
//                $this->data['aData']['thumbs'][$index] = $thumb->saveOrUpdate($thumb->getIdFile());
//            }
//            $oFile->setThumbs();
//        }
//        return $oFile;
//    }

    public function returnResponse($oObject, $responseView = '', $responseRedirect = '')
    {
        if(isset($_FILES)){unset($_FILES);}

        if(strstr($responseView, 'sys/ajax/') || strstr($this->uri->uri_string(),'sys/ajax')){

            $responseView = !isString($responseView) ? $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) : $responseView;

        } else {

            $responseView = !isString($responseView) ? $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) : $responseView;
        }

        if(in_array('ajax',$this->uri->segments)){

          $responseRedirect = !isString($responseRedirect) ? $this->uri->segment(3).'/'.$this->uri->segment(4) : $responseRedirect;

        } else {

          $responseRedirect = !isString($responseRedirect) ? $this->uri->segment(1).'/'.$this->uri->segment(2) : $responseRedirect;
        }

        if($this->fromAjax){
            if ($this->error == 'ok') {
                $data = isset($this->data['aData']) ? $this->data['aData'] : (isset($oObject->aData) ? $oObject->aData : []);
                $aReturn['message'] = setMessage($data, ucfirst($this->subjectS).' agregado exitosamente');
                $aReturn['error'] = $this->error;
                $aReturn['errors'] = $this->errors;
                $this->data['oFile'] = $oObject = $this->model_initialized->setFromData($data, $oObject);
                $aReturn['primary'] = $primary = $this->model_initialized->getPrimaryKey();
                $aReturn['pk'] = $oObject->$primary;
                $aReturn['view'] = $this->load->view($responseView, $this->data, true);
                $aReturn['redirect'] = $responseRedirect;
                $aReturn['data'] = $data;
                return $aReturn;
//                echo json_encode($aReturn);
//                exit;
            } else {
                $aReturn['error'] = $error = ucfirst($this->subjectS)." con datos incompletos, porfavor revisa los datos";
                $aReturn['errors'] = $this->errors;
                $aReturn['message'] = validation_errors();
                $aReturn['required'] = validation_errors();
                $aReturn['view'] = $this->load->view($responseView, $this->data, true);
                return $aReturn;
//                echo json_encode($aReturn);
//                exit;
            }
        } else {
            redirect($responseRedirect);
        }
    }
}
