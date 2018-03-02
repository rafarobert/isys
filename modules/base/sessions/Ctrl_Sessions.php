<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 5:31 pm
 * @property Model_Sessions $model_sessions
 */

Class Ctrl_Sessions extends Base_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_sessions");

    }

    public function index(){
        // Obtiene a todos los sessions

        $this->data["oSessions"] = $this->model_sessions->get();

        // Carga la vista

        $this->data["subview"] = "Base/sessions/index";
    }

    public function edit($id = NULL){
        // Optiene un session o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oSession = $this->model_sessions->get($id);
            if(!count($oSession)){
                $this->data["errors"][] = "El session no pudo ser encontrado";
            }
            $rules_edit = $this->model_sessions->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oSession = $this->model_sessions->get_new();
            $rules = $this->model_sessions->rules;
            $this->form_validation->set_rules($rules);
        }

        $this->data["oSession"] = $oSession;
        // Se procesa el formulario

        if($this->form_validation->run() == true){
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

            $this->model_sessions->save($data,$id);
            redirect("Base/sessions");
        }

        // Se carga la vista
        $this->data["subview"] = "Base/sessions/edit";
    }

    public function delete($id){
        $this->model_sessions->delete($id);
        redirect("Base/sessions");
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