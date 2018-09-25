<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
use Propel\Runtime\Exception\PropelException;
use ES_Table_Trait as table_trait;

class ES_Controller extends ES_Ctrl_Vars
{
//    use ES_Table_Trait;

    const STRING = 'string';
    const ARRAYS = 'array';
    const NUMERIC = 'numeric';
    public $fromAjax = false;

    public $request;
    public $response;
    public $restful;
    public $oauth;

    public $data = array();

    function __construct(){
        parent::__construct();
        $this->load->helper('security');
        $this->img_path = realpath(ROOTPATH.'assets/img/');
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
                $this->$instance = $value;
            }
        }
        if(isset($this->load)){
            $models = $this->load->_ci_models;
            foreach ($models as $alias => $name) {
                $this->$name = new $name();
            }
        }
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
        if (($this->input->post('fromAjax') || compareStrStr($this->router->class,'ajax'))) {
            if (validateVar($error)){
                return ['view' => $this->load->view("$mod/$class/$method", $this->data, true), 'error' => $error];
            } else {
                return $this->load->view("$mod/$class/$method", $this->data, true);
            }
            $this->data["subview"] = "$mod/$class/$method";
        } else {
            $this->data["subview"] = "$mod/$class/$method";
        }
    }

    public function filterIdOrView($id, $view){
        if($id == null && (isNumeric($view) || isString($view))){
            if(keyInArray('editTags',$this->data )){
                if(!keyInArray("edit-$view",$this->data['editTags'])){
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
}
