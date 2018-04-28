<?php 
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 28/04/2018
 * Time: 1:05 am
 * @property Model_Usuarios $model_usuarios
 
 * @property Model_Usuarios $model_usuarios
 
 * @property Model_Options $model_options
 
 * @property Model_Turnos $model_usuarios
 
 * @property Model_Roles $model_roles
 
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_Usuarios extends base_Controller {

    
    public $usuarios;
    
    public $options;
    
    public $turnos;
    
    public $roles;
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_usuarios");
        
        $this->load->model("base/model_usuarios");
        
        $this->load->model("admin/model_options");
        
        $this->load->model("admin/model_usuarios");
        
        $this->load->model("admin/model_roles");
        
        
            $usuarios = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
));
            $this->data['oUsuarios'] = $this->model_usuarios->setOptions($usuarios);
        
            $tipo_asociado = $this->model_options->get_by(array (
  0 => 'nombre',
  1 => 'descripcion',
  'tipo' => 'tipo_asociado',
));
            $this->data['oTipoAsociado'] = $this->model_options->setOptions($tipo_asociado);
        
            $nivel_asociado = $this->model_options->get_by(array (
  0 => 'nombre',
  1 => 'descripcion',
  'tipo' => 'nivel_asociado',
));
            $this->data['oNivelAsociado'] = $this->model_options->setOptions($nivel_asociado);
        
            $turnos = $this->model_usuarios->get_by(array (
  0 => 'nombre',
  1 => 'apellido',
));
            $this->data['oTurnos'] = $this->model_usuarios->setOptions($turnos);
        
            $roles = $this->model_roles->get_by(array (
  0 => 'nombre',
));
            $this->data['oRoles'] = $this->model_roles->setOptions($roles);
        
        
        $dirPictures = 'img/usuarios/';
        createFolder(FCPATH.$dirPictures);
        // Settings for images
        $config['upload_path']          = $dirPictures;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 2024;
        $config['max_height']           = 1008;
        $this->load->library('upload', $config);
        
    }

    public function index(){
        // Obtiene a todos los usuarios
        $this->data["oUsuarios"] = $this->model_usuarios->get();

        // Carga la vista
        $this->data["subview"] = "base/usuarios/index";
    }

    public function edit($id = NULL){
        // Optiene un usuario o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oUsuario = $this->model_usuarios->get($id);
            if(!count((array)$oUsuario)){
                $this->data["errors"][] = "El usuario no pudo ser encontrado";
            }
            $rules_edit = $this->model_usuarios->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oUsuario = $this->model_usuarios->get_new();
            $rules = $this->model_usuarios->rules;
            $this->form_validation->set_rules($rules);
        }
        
        if(isset($oUsuario->foto_perfil)){
            $aImg = explode('.',$oUsuario->foto_perfil);
            if(count($aImg)>1){
                $oUsuario->imgThumb = $aImg[0].'_thumb.'.$aImg[1];
            } else {
                $oUsuario->imgThumb = '';
            }
        } else {
            $oUsuario->imgThumb = '';
        }
        
        $this->data["oUsuario"] = $oUsuario;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_usuarios->array_from_post(
                array (
  0 => 'nombre',
  1 => 'apellido',
  2 => 'username',
  3 => 'email',
  4 => 'fec_nacimiento',
  5 => 'sexo',
  6 => 'invitado_por',
  7 => 'phone_number_1',
  8 => 'phone_number_2',
  9 => 'cellphone_number_1',
  10 => 'cellphone_number_2',
  11 => 'cod_acceso',
  12 => 'id_option_tipo_asociado',
  13 => 'id_option_nivel_asociado',
  14 => 'id_turno',
  15 => 'id_role',
  16 => 'app_monitor',
  17 => 'app_orders',
  18 => 'app_admin',
  19 => 'herbalife_key',
)
            );
            
            if ( ! $this->upload->do_upload('foto_perfil'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
            }
            else
            {
                $file_info = $this->upload->data();
                $this->_create_thumbnail('usuarios',$file_info['file_name']);
                $this->data['foto_perfil'] = array('upload_data' => $file_info);
                $data['foto_perfil'] = $file_info['file_name'];
            }
            
            
            if($id == NULL){
                $data["password"] = $this->input->post('password');
                $data["password"] = $this->session->hash($data['password']);
            }
            
            if ($error == 'ok') {
                $this->model_usuarios->save($data,$id);
                redirect("base/usuarios");
            } else {
                $this->data["subview"] = "base/usuarios/edit";
            }
        }
        // Se carga la vista
        $this->data["subview"] = "base/usuarios/edit";
    }

    public function delete($id){
        $this->model_usuarios->delete($id);
        redirect("base/usuarios");
    }
    
}