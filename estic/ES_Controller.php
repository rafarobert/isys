<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
use Propel\Runtime\Exception\PropelException;
use ES_Table_Trait as table_trait;

/**
 * @property CI_DB_query_builder $db              This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system without hacking.
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 * @property  Middleware $middleware Middleware
 * @property  Request $request Request
 * @property  Response $response Response
 * @property  RESTful $restful RESTful
 * @property  MyOAuth2 $oauth MyOAuth2
 *
 * @property Model_Tables $model_tables
 * @property Model_Clubs $model_clubs
 * @property Model_Turnos $model_turnos
 * @property Model_Sesiones $model_sesiones
 * @property Model_Users $model_users
 * @property Model_Comandas $model_comandas
 * @property Model_Vasos $model_vasos
 * @property Model_Productos $model_productos
 * @property Model_Detalles_pedidos $model_detalles_pedidos
 * @property Model_Prepagos $model_prepagos
 * @property Model_Ingresos $model_ingresos
 * @property Model_Porciones $model_porciones
 * @property Model_Sessions $model_sessions
 *
 * @property Ctrl_Tables $ctrl_tables
 * @property Ctrl_Clubs $ctrl_clubs
 * @property Ctrl_Turnos $ctrl_turnos
 * @property Ctrl_Sesiones $ctrl_sesiones
 * @property Ctrl_Users $ctrl_users
 * @property Ctrl_Comandas $ctrl_comandas
 * @property Ctrl_Vasos $ctrl_vasos
 * @property Ctrl_Productos $ctrl_productos
 * @property Ctrl_Detalles_pedidos $ctrl_detalles_pedidos
 * @property Ctrl_Prepagos $ctrl_prepagos
 * @property Ctrl_Ingresos $ctrl_ingresos
 * @property Ctrl_Porciones $ctrl_porciones
 * @property Ctrl_Sessions $ctrl_sessions
 *
 * @property CiModulos $oModulo
 *
 */
class ES_Controller extends CI_Controller
{
//    use ES_Table_Trait;

    const STRING = 'string';
    const ARRAYS = 'array';
    const NUMERIC = 'numeric';

    public $request;
    public $response;
    public $restful;
    public $oauth;

    public $data = array();

    function __construct(){
        parent::__construct();
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

        $this->data['layout'] = $this->uri->segment(1) == 'base' || $this->uri->segment(1) == 'admin'? 'backend/_layout' : ($this->uri->segment(1) == 'front' ? 'frontend/_layout' : '');
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

    public function loadView($path, $view = '', $idFieldEditView = '', $error = ''){
        $path = preg_replace(['/^\//','/\/$/'],'',$path);
        if(substr_count($path,'/') == 2 ){
            list($mod, $class, $method) = explode('/',$path);
            list($classSin, $classPlu) = setSingularPlural($class);
            $ucClassSin = ucfirst($classSin);
            $method = validateVar($method) ? $method : $this->router->method;
            $class = validateVar($class) ? $class : $this->router->class;
            $mod = validateVar($mod) ? $mod : $this->router->module;
            if (($this->input->post('fromAjax') || compareStrStr($this->router->class,'ajax'))) {
                if (validateVar($error)){
                    if(validateVar($view)){
                        return ['view' => $this->load->view("$mod/$class/$method-$view", $this->data, true),'error'=>$error];
                    } else {
                        return ['view' => $this->load->view("$mod/$class/$method", $this->data, true), 'error' => $error];
                    }
                } else {
                    if(validateVar($view)){
                        return $this->load->view("$mod/$class/$method-$view", $this->data, true);
                    } else {
                        return $this->load->view("$mod/$class/$method", $this->data, true);
                    }
                }
            } else if (!$this->input->post('fromAjax') && validateVar($idFieldEditView)) {
                if (validateVar($view)) {
                    $this->{"init_$class"}(true);
                    if ($this->{"model_$class"}->_table_name == 'ci_options' || $view == 'tipo_usuario') {
                        $this->data["o$ucClassSin"]->$idFieldEditView = CiSettingsQuery::create()->findOneByEditTag("edit-$view")->getIdSetting();
                    } else {
                        $this->data["o$ucClassSin"]->$idFieldEditView = CiOptionsQuery::create()->findOneByEditTag("edit-$view")->getIdSetting();
                    }
                    $this->data["subview"] = "$mod/$class/$method-$view";
                        return $this->load->view("$mod/$class/$method-$view", $this->data, true);
                } else {
                    $this->data["subview"] = "$mod/$class/$method";
//                    return $this->load->view("$mod/$class/$method", $this->data, true);
                }
            } else {
                $this->data["subview"] = "$mod/$class/$method";
//                return $this->load->view("$mod/$class/$method", $this->data, true);
            }
        } else {

        }
    }

    public function filterIdOrView($id, $view){
        if($id == null && (validateVar($view, 'numeric') || validateVar($view, 'string'))){
            if(!in_array("edit-$view",$this->data['editTags'])){
                $id = $view ;
                $view = null;
            }
        }
        return [$id,$view];
    }
}
