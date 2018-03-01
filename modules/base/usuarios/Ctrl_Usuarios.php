<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 01/03/2018
 * Time: 6:10 pm
 * @property Model_Usuarios $model_usuarios
 */

Class Ctrl_Usuarios extends Admin_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_usuarios");

    }

    public function index(){
        // Obtiene a todos los usuarios

        $this->data["oUsuarios"] = $this->model_usuarios->get();

        // Carga la vista

        $this->data["subview"] = "admin/usuarios/index";
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
  8 => 'invitado_por',
  9 => 'phone_number_1',
  10 => 'phone_number_2',
  11 => 'cellphone_number_1',
  12 => 'cellphone_number_2',
  13 => 'cod_acceso',
  14 => 'id_tipo_asociado',
  15 => 'id_nivel_asociado',
  16 => 'id_turno',
  17 => 'id_role',
  18 => 'id_picture',
  19 => 'app_monitor',
  20 => 'app_orders',
  21 => 'app_admin',
  22 => 'herbalife_key',
)
            );

            $this->model_usuarios->save($data,$id);
            redirect("admin/usuarios");
        }

        // Se carga la vista
        $this->data["subview"] = "admin/usuarios/edit";
    }

    public function delete($id){
        $this->model_usuarios->delete($id);
        redirect("admin/usuarios");
    }
}