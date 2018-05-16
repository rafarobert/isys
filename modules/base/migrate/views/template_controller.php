<?php 
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @property Model_UcTableP $model_lcTableP
 //>>>initPropertiesVarsForeignTable<<<
 * @property Model_UcFkTableP $model_lcFkTableP
 //<<<initPropertiesVarsForeignTable>>>
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_UcTableP extends UcModS_Controller {

    //>>>initVarsForeignTable<<<
    public $lcFkObjFieldP;
    //<<<initVarsForeignTable>>>
    private static $instance = null;

    public static function create()
    {
        if(!self::$instance){
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model("lcModS/model_lcTableP");
        //>>>loadModelsForeignTable<<<
        $this->load->model("lcFkModS/model_lcFkTableP");
        //<<<loadModelsForeignTable>>>
        //>>>initFieldsForeignTable<<<
        $this->initLoaded();
        $lcFkObjFieldP = $this->model_lcFkTableP->get_by('$fFieldsRef');
            $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($lcFkObjFieldP,'divider');
        //<<<initFieldsForeignTable>>>
        //>>>initFieldImg<<<
        $dirPictures = 'assets/img/lcTableP/';
        createFolder(FCPATH.$dirPictures);
        // Settings for images
        $config['upload_path']          = $dirPictures;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 2024;
        $config['max_height']           = 1008;
        $this->load->library('upload', $config);
        //<<<initFieldImg>>>
    }

    public function index(){
        // Obtiene a todos los lcTableP
        $this->data["oUcTableP"] = $this->model_lcTableP->get();

        // Carga la vista
        $this->data["subview"] = "lcModS/lcTableP/index";
    }

    public function edit($id = NULL){
        // Optiene un lcTableS o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if($id){
            $oUcTableS = $this->model_lcTableP->get($id);
            if(!count((array)$oUcTableS)){
                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
            $rules_edit = $this->model_lcTableP->rules_edit;
            $this->form_validation->set_rules($rules_edit);
        } else {
            $oUcTableS = $this->model_lcTableP->get_new();
            $rules = $this->model_lcTableP->rules;
            $this->form_validation->set_rules($rules);
        }
        //>>>validateFieldImgIndex<<<
        if(isset($oUcTableS->lcField)){
            $aImg = explode('.',$oUcTableS->lcField);
            if(count($aImg)>1){
                $oUcTableS->imgThumb = $aImg[0].'_thumb.'.$aImg[1];
            } else {
                $oUcTableS->imgThumb = '';
            }
        } else {
            $oUcTableS->imgThumb = '';
        }
        //<<<validateFieldImgIndex>>>
        $this->data["oUcTableS"] = $oUcTableS;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            $data = $this->model_lcTableP->array_from_post(
                //validatedFieldsNames
            );
            //>>>validateFieldImgUpload<<<
            if ( ! $this->upload->do_upload('lcField') && $id == null)
            {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
            }
            else if($this->upload->do_upload('foto_producto'))
            {
                $file_info = $this->upload->data();
                $this->_create_thumbnail('lcTableP',$file_info['file_name']);
                $this->data['lcField'] = array('upload_data' => $file_info);
                $data['lcField'] = $file_info['file_name'];
            }
            //<<<validateFieldImgUpload>>>
            //>>>validateFieldPassword<<<
            if($id == NULL){
                $data["lcField"] = $this->input->post('lcField');
                $data["lcField"] = $this->session->hash($data['lcField']);
            }
            //<<<validateFieldPassword>>>
            if ($error == 'ok') {
                $this->model_lcTableP->save($data,$id);
                redirect("lcModS/lcTableP");
            } else {
                $this->data["subview"] = "lcModS/lcTableP/edit";
            }
        }
        // Se carga la vista
        $this->data["subview"] = "lcModS/lcTableP/edit";
        return $this->load->view("lcModS/lcTableP/edit",$this->data,true);
    }

    public function delete($id){
        $this->model_lcTableP->delete($id);
        redirect("lcModS/lcTableP");
    }
    //extraFunctions
}