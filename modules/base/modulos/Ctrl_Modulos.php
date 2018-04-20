<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 19/04/2018
 * Time: 1:32 am
 * @property Model_Modulos $model_modulos
 
 * @property Model_Usuarios $model_usuarios
 
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Modulos extends base_Controller {

    
    public $usuarios;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_modulos");
        
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
        // Obtiene a todos los modulos
        $this->data["oModulos"] = $this->model_modulos->get();

        // Carga la vista
        $this->data["subview"] = "base/modulos/index";
    }

    public function edit($id = NULL){
        // Optiene un modulo o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oModulo = $this->model_modulos->get($id);
            if(!count((array)$oModulo)){
                $this->data["errors"][] = "El modulo no pudo ser encontrado";
            }
            $rules_edit = $this->model_modulos->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oModulo = $this->model_modulos->get_new();
            $rules = $this->model_modulos->rules;
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oModulo"] = $oModulo;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_modulos->array_from_post(
                array (
  0 => 'id_modulo',
  1 => 'name_modulo',
  2 => 'titulo',
  3 => 'url',
  4 => 'descripcion',
  5 => 'icon',
  6 => 'listed',
  7 => 'status',
)
            );
            //validateFieldImgUpload
            //validateFieldPassword
            if ($error == 'ok') {
                $this->model_modulos->save($data,$id);
                redirect("base/modulos");
            } else {
                $this->data["subview"] = "base/modulos/edit";
            }
        }
        // Se carga la vista
        $this->data["subview"] = "base/modulos/edit";
    }

    public function delete($id){
        $this->model_modulos->delete($id);
        redirect("base/modulos");
    }
    
}