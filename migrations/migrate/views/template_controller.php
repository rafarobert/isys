<?php 
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @property Model_ucTableP $model_lcTableP
 */

Class Ctrl_ucTableP extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_lcTableP");

    }

    public function index(){
        // Obtiene a todos los lcTableP

        $this->data["oucTableP"] = $this->model_lcTableP->get();

        // Carga la vista

        $this->data["subview"] = "admin/lcTableP/index";
    }

    public function edit($id = NULL){
        // Optiene un lcTableS o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oClub = $this->model_lcTableP->get($id);
            if(!count($oClub)){
                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
            $rules_edit = $this->model_lcTableP->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oClub = $this->model_lcTableP->get_new();
            $rules = $this->model_lcTableP->rules;
            $this->form_validation->set_rules($rules);
        }

        $this->data["oClub"] = $oClub;
        // Se procesa el formulario

        if($this->form_validation->run() == true){
            $data = $this->model_lcTableP->array_from_post(array(

                // *** estic - tables - inicio ***
                "nombre",
                "email",
                "direccion",
                "licencia",
                "estado",
                "change_count",

                // *** estic - tables - fin ***
            ));


            $this->model_lcTableP->save($data,$id);
            redirect("admin/lcTableP");
        }

        // Se carga la vista
        $this->data["subview"] = "admin/lcTableP/edit";
    }

    public function delete($id){
        $this->model_lcTableP->delete($id);
        redirect("admin/lcTableP");
    }
}