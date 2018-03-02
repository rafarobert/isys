<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 7:08 pm
 * @property Model_Usuarios $model_usuarios
 */

Class Ctrl_Usuarios extends Base_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_usuarios");

    }

    public function index(){
        // Obtiene a todos los usuarios

        $this->data["oUsuarios"] = $this->model_usuarios->get();

        // Carga la vista

        $this->data["subview"] = "Base/usuarios/index";
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

        $this->data["oUsuario"] = $oUsuario;
        // Se procesa el formulario

        if($this->form_validation->run() == true){
            $data = $this->model_usuarios->array_from_post(
                array (
  0 => 'nombre',
  1 => 'apellido',
  2 => 'username',
  3 => 'email',
  4 => 'password',
  5 => 'fec_nacimiento',
  6 => 'sexo',
  7 => 'sexoCopy',
  8 => 'sexoCopyCopy',
  9 => 'sexoCopyCopyCopy',
  10 => 'sexoCopyCopyCopyCopy',
  11 => 'invitado_por',
  12 => 'phone_number_1',
  13 => 'phone_number_2',
  14 => 'cellphone_number_1',
  15 => 'cellphone_number_2',
  16 => 'cod_acceso',
  17 => 'id_tipo_asociado',
  18 => 'id_nivel_asociado',
  19 => 'id_turno',
  20 => 'id_role',
  21 => 'id_picture',
  22 => 'app_monitor',
  23 => 'app_orders',
  24 => 'app_admin',
  25 => 'herbalife_key',
)
            );

            $this->model_usuarios->save($data,$id);
            redirect("Base/usuarios");
        }

        // Se carga la vista
        $this->data["subview"] = "Base/usuarios/edit";
    }

    public function delete($id){
        $this->model_usuarios->delete($id);
        redirect("Base/usuarios");
    }

    
}