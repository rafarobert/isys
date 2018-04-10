<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 10/04/2018
 * Time: 1:00 am
 * @property Model_Options $model_options
 
 * @property Model_Usuarios $model_usuarios
 
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Options extends base_Controller {

    
    public $usuarios;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_options");
        
        $this->load->model("base/model_usuarios");
        
        
            $usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
));
            $this->data['oUsuarios'] = $this->model_usuarios->setOptions($usuarios);
        
            $usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
));
            $this->data['oUsuarios'] = $this->model_usuarios->setOptions($usuarios);
        
        //initFieldImg
    }

    public function index(){
        // Obtiene a todos los options
        $this->data["oOptions"] = $this->model_options->get();

        // Carga la vista
        $this->data["subview"] = "base/options/index";
    }

    public function edit($id = NULL){
        // Optiene un option o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oOption = $this->model_options->get($id);
            if(!count((array)$oOption)){
                $this->data["errors"][] = "El option no pudo ser encontrado";
            }
            $rules_edit = $this->model_options->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oOption = $this->model_options->get_new();
            $rules = $this->model_options->rules;
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oOption"] = $oOption;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_options->array_from_post(
                array (
  0 => 'tabla',
  1 => 'tipo',
  2 => 'nombre',
  3 => 'descripcion',
)
            );
            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $this->model_options->save($data,$id);
                redirect("base/options");
            } else {
                $this->data["subview"] = "base/options/edit";
            }
        }
        // Se carga la vista
        $this->data["subview"] = "base/options/edit";
    }

    public function delete($id){
        $this->model_options->delete($id);
        redirect("base/options");
    }
    
}