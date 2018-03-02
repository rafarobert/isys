<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 11:51 am
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
  1 => 'nombre',
  2 => 'apellido',
  3 => 'username',
  4 => 'email',
  5 => 'password',
  6 => 'fec_nacimiento',
  7 => 'sexo',
  8 => 'sexoCopy',
  9 => 'sexoCopyCopy',
  10 => 'sexoCopyCopyCopy',
  11 => 'sexoCopyCopyCopyCopy',
  12 => 'invitado_por',
  13 => 'phone_number_1',
  14 => 'phone_number_2',
  15 => 'cellphone_number_1',
  16 => 'cellphone_number_2',
  17 => 'cod_acceso',
  18 => 'id_tipo_asociado',
  19 => 'id_nivel_asociado',
  20 => 'id_turno',
  21 => 'id_role',
  22 => 'id_picture',
  23 => 'app_monitor',
  24 => 'app_orders',
  25 => 'app_admin',
  26 => 'herbalife_key',
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