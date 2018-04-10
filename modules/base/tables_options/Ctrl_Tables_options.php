<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 08/04/2018
 * Time: 4:28 pm
 * @property Model_Tables_options $model_tables_options
 
 * @property Model_Usuarios $model_usuarios
 
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Tables_options extends base_Controller {

    
    public $usuarios;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_tables_options");
        
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
        // Obtiene a todos los tables_options
        $this->data["oTables_options"] = $this->model_tables_options->get();

        // Carga la vista
        $this->data["subview"] = "base/tables_options/index";
    }

    public function edit($id = NULL){
        // Optiene un tabl_option o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oTabl_option = $this->model_tables_options->get($id);
            if(!count((array)$oTabl_option)){
                $this->data["errors"][] = "El tabl_option no pudo ser encontrado";
            }
            $rules_edit = $this->model_tables_options->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oTabl_option = $this->model_tables_options->get_new();
            $rules = $this->model_tables_options->rules;
            $this->form_validation->set_rules($rules);
        }
        //validateFieldImgIndex
        $this->data["oTabl_option"] = $oTabl_option;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_tables_options->array_from_post(
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
                $this->model_tables_options->save($data,$id);
                redirect("base/tables_options");
            } else {
                $this->data["subview"] = "base/tables_options/edit";
            }
        }
        // Se carga la vista
        $this->data["subview"] = "base/tables_options/edit";
    }

    public function delete($id){
        $this->model_tables_options->delete($id);
        redirect("base/tables_options");
    }
    
}