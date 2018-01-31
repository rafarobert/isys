<?php // *** estic - ctrl_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 31/01/2018
         * Time: 2:58 am
         * @property Model_Usuarios $model_usuarios
         */
        
        Class Ctrl_Usuarios extends Base_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_usuarios");
                
                    // Settings for images
                    
                $config["upload_path"]          = "img/usuarios/";
                $config["allowed_types"]        = "gif|jpg|png";
                $config["max_size"]             = 100;
                $config["max_width"]            = 1024;
                $config["max_height"]           = 768;

                $this->load->library("upload", $config);
                
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
                
                if(isset($oUsuario->img)){
                    $aImg = explode(".",$oUsuario->img);
                    if(count($aImg)>1){
                        $oUsuario->imgThumb = $aImg[0]."_thumb.".$aImg[1];
                    }
                }
                
                $this->data["oUsuario"] = $oUsuario;
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_usuarios->array_from_post(array(
                                  
                    // *** estic - tables - inicio ***
        "name",
                "email",
                "lastname",
                "mobile_number_1",
                "mobile_number_2",
                "ci",
                
        // *** estic - tables - fin ***
        ));
        
        
                    // Settings for images
                    
                 if ( ! $this->upload->do_upload("img"))
                {
                    $error = array("error" => $this->upload->display_errors());
                }
                else
                {
                    $file_info = $this->upload->data();
                    $this->_create_thumbnail("usuarios",$file_info["file_name"]);
                    $this->data["img"] = array("upload_data" => $file_info);
                    $data["img"] = $file_info["file_name"];
                }
                if($id == NULL){
                    $data["password"] = $this->input->post("password");
                    $data["password"] = $this->model_usuarios->hash($data["password"]);
                }
                
                    $this->model_usuarios->save($data,$id);
                    redirect("base/usuarios");
                }
        
                // Se carga la vista
                $this->data["subview"] = "base/usuarios/edit";
                $this->load->view("layouts/_layout_base", $this->data);
            }
        
            public function delete($id){
                $this->model_usuarios->delete($id);
                redirect("base/usuarios");
            }

            
        }

        // *** estic - ctrl_file - end ***