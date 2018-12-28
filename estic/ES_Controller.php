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
     */
    public $oUserLogguedIn;
    public $aSessData;
    public $aRolesFromSess;

    public $data = array();

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->img_path = realpath(ROOTPATH.'assets/img/');
        $this->fromAjax = $this->input->post('fromAjax');
        $this->data['errors'] = array();
        $this->data['siteTitle'] = config_item('site_title');;
        $this->data['siteName'] = config_item('site_name');
        $this->data['siteDomain'] = config_item('site_domain');
        $this->data['metaReplyTo'] = config_item('meta_reply_to');
        $this->data['metaLanguaje'] = config_item('meta_languaje');
        $this->data['metaViewport'] = config_item('meta_viewport');
        $this->data['metaImage'] = config_item('meta_image');
        $this->data['favIcon'] = config_item('fav_icon');
        $this->data['layout'] = $this->uri->segment(1) == 'base' || $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'sys' ? 'backend/_layout' : ($this->uri->segment(1) == 'front' ? 'frontend/_layout' : '');
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
        $method = isString($method) ? $method : $this->router->method;
        $class = isString($class) ? $class : $this->router->class;
        $mod = isString($mod) ? $mod : $this->router->module;
        if ($this->input->post('fromAjax') || compareStrStr($this->router->class,'ajax') || isArray($_FILES)) {
            if (validateVar($error)){
                return [
                    'view' => $this->load->view("$mod/$class/$method", $this->data, true),
                    'required' => validation_errors(),
                    'error' => $error,
                    'errors' => $this->errors
                ];
            } else {
                return $this->load->view("$mod/$class/$method", $this->data, true);
            }
            $this->data["subview"] = "$mod/$class/$method";
        } else if(isset($this->printView) && $this->printView) {
            unset($this->printView);

            return $this->load->view("$mod/$class/$method", $this->data, true);
        } else {
            $this->data["subview"] = "$mod/$class/$method";
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

    public function doUpload($oFile){
        $id = $oFile->getIdFile();
        if (!$this->model_files->do_upload("file", $id) && $id == null) {
            $this->data['errors'] = $this->error = array('error' => $this->upload->display_errors());
            $this->fromAjax = true;
        } else if($id != null){
            $this->fromAjax = true;

        } else {
            $this->data["file"] = $this->upload->data();
            $oFile = $this->model_files->setFromData($this->upload->data(),$oFile);
            $this->fromAjax = true;
        }
        return $oFile;
    }

    public function saveThumbs($oFile){
        if(isset($oFile->aData)){
            $this->data['aData'] = $oFile->aData;
        }
        $id = $oFile->getIdFile();
        if(validateVar($this->upload->data_thumbs,'array') || validateVar($this->upload->data_thumbs,'object')){
            foreach ($this->upload->data_thumbs as $index => $thumb){
                $thumb['id_parent'] = $id;
                $this->data['aData']['thumbs'][$index] = $this->model_files->save($thumb);
            }
            $oFile->setThumbs();
        } else if($oFile->getIdFile() !== null && $oFile->getNroThumbs() > 0){
            $thumbs = $this->model_files->filterByIdParent($oFile->getIdFile());
            foreach ($thumbs as $index => $thumb){
                $thumb = $this->model_files->setFromData($this->input->post(),$thumb);
                $this->data['aData']['thumbs'][$index] = $thumb->saveOrUpdate($thumb->getIdFile());
            }
            $oFile->setThumbs();
        }
        return $oFile;
    }

    public function returnResponse($oObject, $responseView = '', $responseRedirect = '')
    {
        if(isset($_FILES)){unset($_FILES);}

        if(strstr($responseView, 'sys/ajax/') || strstr($this->uri->uri_string(),'sys/ajax')){

            $responseView = !isString($responseView) ? $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) : $responseView;

        } else {

            $responseView = !isString($responseView) ? $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) : $responseView;
        }
        $responseRedirect = !isString($responseRedirect) ? $this->uri->segment(1).'/'.$this->uri->segment(2) : $responseRedirect;

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
