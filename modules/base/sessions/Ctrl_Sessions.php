<?php // *** estic - ctrl_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 07/02/2018
         * Time: 2:42 am
         * @property Model_Sessions $model_sessions
         */
        
        Class Ctrl_Sessions extends Base_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model('model_usuarios');
                $this->load->library('session');
                $this->session->sessTable = 'hbf_usuarios';
                $this->session->sessIdTable = 'id_usuario';
                $this->session->sessKey= config_item('sess_key_admin');
                $this->load->model("model_sessions");
                
            }
        
            public function index(){
                // Obtiene a todos los sessions
                
                $this->data["oSessions"] = $this->model_sessions->get();
        
                // Carga la vista
                
                $this->data["subview"] = "base/sessions/index";
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
                    $data = $this->model_sessions->array_from_post(array(
                                  
                    // *** estic - tables - inicio ***
        "ip_address",
                "timestamp",
                "data",
                "ci_usuarios_id_usuario",
                "hbf_usuarios_id_usuario",
                
        // *** estic - tables - fin ***
        ));
        
        
                    $this->model_sessions->save($data,$id);
                    redirect("base/sessions");
                }
        
                // Se carga la vista
                $this->data["subview"] = "base/sessions/edit";
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

        // *** estic - ctrl_file - end ***