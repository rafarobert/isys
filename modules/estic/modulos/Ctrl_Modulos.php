<?php // *** estic - ctrl_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 27/01/2018
         * Time: 3:04 am
         * @property Model_Modulos $model_modulos
         */
        
        Class Ctrl_Modulos extends Estic_Controller {
        
        
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_modulos");
                
            }
        
            public function index(){
                // Obtiene a todos los modulos
                
                $this->data["oModulos"] = $this->model_modulos->get();
        
                // Carga la vista
                
                $this->data["subview"] = "estic/modulos/index";
                $this->load->view("layouts/_layout_estic", $this->data);
            }
        
            public function edit($id = NULL){
                // Optiene un modulo o crea uno nuevo
                // Se construye las reglas de validacion del formulario        
                if($id){
                    $oModulo = $this->model_modulos->get($id);
                    if(!count($oModulo)){
                        $this->data["errors"][] = "El modulo no pudo ser encontrado";
                    }
                    $rules_edit = $this->model_modulos->rules_edit;
                    $this->form_validation->set_rules($rules_edit);
                } else {
                    $oModulo = $this->model_modulos->get_new();
                    $rules = $this->model_modulos->rules;
                    $this->form_validation->set_rules($rules);
                }
                
                $this->data["oModulo"] = $oModulo;
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_modulos->array_from_post(array(
                                  
                    // *** estic - tables - inicio ***
        "titulo",
                "url",
                "descripcion",
                "icon",
                "opt_estado",
                "opt_listado",
                
        // *** estic - tables - fin ***
        ));
        
        
                    $this->model_modulos->save($data,$id);
                    redirect("estic/modulos");
                }
        
                // Se carga la vista
                $this->data["subview"] = "estic/modulos/edit";
                $this->load->view("layouts/_layout_estic", $this->data);
            }
        
            public function delete($id){
                $this->model_modulos->delete($id);
                redirect("estic/modulos");
            }

            
        }

        // *** estic - ctrl_file - end ***