<?php // *** estic - ctrl_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         * @property Model_Files $model_files
         */
        
        Class Ctrl_Files extends Base_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_files");
                
            }
        
            public function index(){
                // Obtiene a todos los files
                
                $this->data["oFiles"] = $this->model_files->get();
        
                // Carga la vista
                
                $this->data["subview"] = "base/files/index";
            }
        
            public function edit($id = NULL){
                // Optiene un fil o crea uno nuevo
                // Se construye las reglas de validacion del formulario        
                if($id){
                    $oFil = $this->model_files->get($id);
                    if(!count($oFil)){
                        $this->data["errors"][] = "El fil no pudo ser encontrado";
                    }
                    $rules_edit = $this->model_files->rules_edit;
                    $this->form_validation->set_rules($rules_edit);
                } else {
                    $oFil = $this->model_files->get_new();
                    $rules = $this->model_files->rules;
                    $this->form_validation->set_rules($rules);
                }
                
                $this->data["oFil"] = $oFil;
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_files->array_from_post(array(
                                  
                    // *** estic - tables - inicio ***
        "path",
                "type",
                "size",
                "width",
                "height",
                "num_thumbs",
                "thumbnail_tag",
                "estado",
                "change_count",
                
        // *** estic - tables - fin ***
        ));
        
        
                    $this->model_files->save($data,$id);
                    redirect("base/files");
                }
        
                // Se carga la vista
                $this->data["subview"] = "base/files/edit";
            }
        
            public function delete($id){
                $this->model_files->delete($id);
                redirect("base/files");
            }
        }

        // *** estic - ctrl_file - end ***
        
        
        
        
        
        
        