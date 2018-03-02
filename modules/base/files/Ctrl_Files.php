<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 5:31 pm
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

        $this->data["subview"] = "Base/files/index";
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
            $data = $this->model_files->array_from_post(
                array (
  0 => 'nombre',
  1 => 'path',
  2 => 'type',
  3 => 'size',
  4 => 'width',
  5 => 'height',
  6 => 'id_file_parent',
  7 => 'num_thumbs',
  8 => 'thumbnail_tag',
)
            );

            $this->model_files->save($data,$id);
            redirect("Base/files");
        }

        // Se carga la vista
        $this->data["subview"] = "Base/files/edit";
    }

    public function delete($id){
        $this->model_files->delete($id);
        redirect("Base/files");
    }

    
}