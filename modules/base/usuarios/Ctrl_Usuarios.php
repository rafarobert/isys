<?php // *** estic - ctrl_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         * @property Model_Usuarios $model_usuarios
         */
        
        Class Ctrl_Usuarios extends Base_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_usuarios");
                
            }
        
            public function index(){
                // Obtiene a todos los usuarios
                
                $this->data["oUsuarios"] = $this->model_usuarios->get();
        
                // Carga la vista
                
                $this->data["subview"] = "base/usuarios/index";
            }
        
            public function edit($id = NULL){
                // Optiene un usuario o crea uno nuevo
                // Se construye las reglas de validacion del formulario        
                if($id){
                    $oUsuario = $this->model_usuarios->get($id);
                    if(!count($oUsuario)){
                        $this->data["errors"][] = "El usuario no pudo ser encontrado";
                    }
                    $rules_edit = $this->model_usuarios->rules_edit;
                    $this->form_validation->set_rules($rules_edit);
                } else {
                    $oUsuario = $this->model_usuarios->get_new();
                    $rules = $this->model_usuarios->rules;
                    $this->form_validation->set_rules($rules);
                }
                
                $this->data["oUsuario"] = $oUsuario;
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_usuarios->array_from_post(array(
                                  
                    // *** estic - tables - inicio ***
        "nombre",
                "apellido",
                "username",
                "email",
                "fec_nacimiento",
                "sexo",
                "invitado_por",
                "phone_number_1",
                "phone_number_2",
                "cellphone_number_1",
                "cellphone_number_2",
                "cod_acceso",
                "app_monitor",
                "app_orders",
                "app_admin",
                "herbalife_key",
                "estado",
                "change_count",
                
        // *** estic - tables - fin ***
        ));
        
        
                if($id == NULL){
                    $data["password"] = $this->input->post("password");
                    $data["password"] = $this->model_usuarios->hash($data["password"]);
                }
                
                    $this->model_usuarios->save($data,$id);
                    redirect("base/usuarios");
                }
        
                // Se carga la vista
                $this->data["subview"] = "base/usuarios/edit";
            }
        
            public function delete($id){
                $this->model_usuarios->delete($id);
                redirect("base/usuarios");
            }
        }

        // *** estic - ctrl_file - end ***