<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 11:39 am
 * @property Model_Modulos $model_modulos
 */

Class Ctrl_Modulos extends Base_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_modulos");

    }

    public function index(){
        // Obtiene a todos los modulos

        $this->data["oModulos"] = $this->model_modulos->get();

        // Carga la vista

        $this->data["subview"] = "Base/modulos/index";
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
            $data = $this->model_modulos->array_from_post(
                array (
  1 => 'titulo',
  2 => 'url',
  3 => 'descripcion',
  4 => 'icon',
  5 => 'listed',
  11 => 'status',
  12 => 'id_file',
)
            );

            $this->model_modulos->save($data,$id);
            redirect("Base/modulos");
        }

        // Se carga la vista
        $this->data["subview"] = "Base/modulos/edit";
    }

    public function delete($id){
        $this->model_modulos->delete($id);
        redirect("Base/modulos");
    }

    
}