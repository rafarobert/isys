<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 30/04/2018
 * Time: 5:45 pm
 * @property Model_Sessions $model_sessions
 
 * @property Model_Usuarios $model_usuarios
 
 * @property Model_Sesiones $model_usuarios
 
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Sessions extends base_Controller {

    
    public $usuarios;
    
    public $sesiones;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_sessions");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_usuarios");
        
        
            $usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
));
            $this->data['oUsuarios'] = $this->model_usuarios->setOptions($usuarios);
        
            $sesiones = $this->model_usuarios->get_by(array (
  0 => 'nombre',
));
            $this->data['oSesiones'] = $this->model_usuarios->setOptions($sesiones);
        
        //initFieldImg
    }

    public function index(){
        // Obtiene a todos los sessions
        $this->data["oSessions"] = $this->model_sessions->get();

        // Carga la vista
        $this->data["view"] = "index";
    }

    public function edit($id = NULL){
        // Optiene un session o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oSession = $this->model_sessions->get($id);
            if(!count((array)$oSession)){
                $this->data["errors"][] = "El session no pudo ser encontrado";
            }
            $rules_edit = $this->model_sessions->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oSession = $this->model_sessions->get_new();
            $rules = $this->model_sessions->rules;
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oSession"] = $oSession;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_sessions->array_from_post(
                array (
  0 => 'ip_address',
  1 => 'timestamp',
  2 => 'data',
  3 => 'last_activity',
  4 => 'id_user',
  5 => 'id_hbf_sesion',
)
            );
            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $this->model_sessions->save($data,$id);
                redirect("base/sessions");
            } else {
                $this->data["view"] = "edit";
            }
        }
        // Se carga la vista
        $this->data["view"] = "edit";
    }

    public function delete($id){
        $this->model_sessions->delete($id);
        redirect("base/sessions");
    }
    
            public function login(){
                $this->session->login();
            }
            public function logout(){
                $this->session->logout();
            }
            public function signup(){
                $this->session->signUp();
            }
            
}