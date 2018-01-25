<?php // *** estic - ctrl_file - start ***
        /**
         * Created by estic.
         * User: Rafael Gutierrez Gaspar
         * Date: 16/01/2018
         * Time: 2:45 am
         * @property Model_Users $model_users
         */
        
        Class Ctrl_Users extends Estic_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_users");
                
                    // Settings for images
                    
                $config["upload_path"]          = "img/users/";
                $config["allowed_types"]        = "gif|jpg|png";
                $config["max_size"]             = 100;
                $config["max_width"]            = 1024;
                $config["max_height"]           = 768;

                $this->load->library("upload", $config);
                
            }
        
            public function index(){
                // Obtiene a todos los users
                
                $this->data["oUsers"] = $this->model_users->get();
        
                // Carga la vista
                
                $this->data["subview"] = "estic/users/index";
                $this->load->view("layouts/_layout_estic", $this->data);
            }
        
            public function edit($id = NULL){
                // Optiene un user o crea uno nuevo
                // Se construye las reglas de validacion del formulario        
                if($id){
                    $oUser = $this->model_users->get($id);
                    if(!count($oUser)){
                        $this->data["errors"][] = "El user no pudo ser encontrado";
                    }
                    $rules_edit = $this->model_users->rules_edit;
                    $this->form_validation->set_rules($rules_edit);
                } else {
                    $oUser = $this->model_users->get_new();
                    $rules = $this->model_users->rules;
                    $this->form_validation->set_rules($rules);
                }
                
                if(isset($oUser->img)){
                    $aImg = explode(".",$oUser->img);
                    if(count($aImg)>1){
                        $oUser->imgThumb = $aImg[0]."_thumb.".$aImg[1];
                    }
                }
                
                $this->data["oUser"] = $oUser;
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_users->array_from_post(array(
                                  
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
                    $this->_create_thumbnail("users",$file_info["file_name"]);
                    $this->data["img"] = array("upload_data" => $file_info);
                    $data["img"] = $file_info["file_name"];
                }
                if($id == NULL){
                    $data["password"] = $this->input->post("password");
                    $data["password"] = $this->model_users->hash($data["password"]);
                }
                
                    $this->model_users->save($data,$id);
                    redirect("estic/users");
                }
        
                // Se carga la vista
                $this->data["subview"] = "estic/users/edit";
                $this->load->view("layouts/_layout_estic", $this->data);
            }
        
            public function delete($id){
                $this->model_users->delete($id);
                redirect("estic/users");
            }

            
        }

        // *** estic - ctrl_file - end ***