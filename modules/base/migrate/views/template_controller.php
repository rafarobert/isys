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
    }

    public function index(){
        // Obtiene a todos los lcTableP
        $oUcTableP = $this->model_lcTableP->get();
        //>>>validateFieldsImgsIndex<<<
        $oUcTableP = $this->model_lcTableP->getThumbs($oUcTableP);
        //<<<validateFieldsImgsIndex>>>
        $this->data["oUcTableP"] = $oUcTableP;
        // Carga la vista
        $this->data["subview"] = "lcModS/lcTableP/index";
    }

    public function edit($id = NULL, $bEditIni = FALSE){
        // Optiene un lcTableS o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric')){
            $oUcTableS = $this->model_lcTableP->get($id);
            if(!count((array)$oUcTableS)){
                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
            $rules = $this->model_lcTableP->rules_edit;
        } else {
            $rules = $this->model_lcTableP->rules;
            $oUcTableS = $this->model_lcTableP->get_new();
        }

        if($bEditIni){
            $this->form_validation->set_rules($this->model_lcTableP->rules_ini);
        } else {
            $this->form_validation->set_rules($rules);
        }
        //>>>validateFieldImgIndex<<<
        $oUcTableS = $this->model_lcTableP->getThumbs($oUcTableS)[0];
        //<<<validateFieldImgIndex>>>
        $this->data["oUcTableS"] = $oUcTableS;

        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = "ok";
            if($bEditIni){
                $data = $this->model_lcTableP->array_from_post(
                //validatedFieldsIniNames
                );
            } else {
                $data = $this->model_lcTableP->array_from_post(
                //validatedFieldsNames
                );
            }
            //>>>validateFieldImgUpload<<<
            if ( ! $this->model_lcTableP->do_upload("lcField", $id) && $id == null) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
                show_error($error);
            } else {
                $file_info = $this->upload->data();
                $this->data["lcField"] = $file_info['file_name'];
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
        if($bEditIni){
            $this->data["subview"] = "lcModS/lcTableP/edit-ini";
            return $this->load->view("lcModS/lcTableP/edit-ini",$this->data,true);
        } else {
            $this->data["subview"] = "lcModS/lcTableP/edit";
            return $this->load->view("lcModS/lcTableP/edit",$this->data,true);
        }
    }

    public function delete($id){
        $this->model_lcTableP->delete($id);
        redirect("lcModS/lcTableP");
    }
    //extraFunctions
}