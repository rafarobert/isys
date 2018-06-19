<?php 
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
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
        $this->initLoaded();
        //>>>initFieldsForeignTable<<<
        $lcFkObjFieldP = $this->model_lcFkTableP->get_by('$fFieldsRef', true);
        //<<<initFieldsForeignTable>>>
        //>>>compareFieldsForeignTable<<<
        $lcFkObjFieldP = $this->model_lcFkTableP->setForeignValues('$t1Contents','t1FieldRef','$t2Contents','t2FieldRef');
        //<<<compareFieldsForeignTable>>>
        //>>>setFieldsForeignTable<<<
        $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($lcFkObjFieldP,'divider');
        //<<<setFieldsForeignTable>>>
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

    public function edit($id_or_view = NULL , $id = NULL){
        if($id == null && (validateVar($id_or_view, 'numeric') || validateVar($id_or_view, 'string'))){
            if(!in_array("edit-$id_or_view",$this->data['editTags'])){
                $id = $id_or_view ;
                $id_or_view = null;
            }
        }
        // Optiene un lcTableS o crea uno nuevo
        // Se construye las reglas de validacion del formulario
        if(validateVar($id,'numeric') || validateVar($id,'string')){
            $oUcTableS = $this->model_lcTableP->get($id);
            if(!count((array)$oUcTableS)){
                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
            $rules = $this->model_lcTableP->rules_edit;
        } else {
            $rules = $this->model_lcTableP->rules;
            $oUcTableS = $this->model_lcTableP->get_new();
        }

        if(validateVar($id_or_view)){
            $this->form_validation->set_rules($this->model_lcTableP->{"rules_edit_$id_or_view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //>>>validateFieldImgIndex<<<
        $oUcTableS = $this->model_lcTableP->getThumbs($oUcTableS)[0];
        //<<<validateFieldImgIndex>>>
        $this->data["oUcTableS"] = $oUcTableS;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            if(compareStrStr($id_or_view, 'ini')){
                $data = $this->model_lcTableP->array_from_post($aFromPost = '$validatedFieldsEditIni');
            }
            //>>>validatedControllerFieldsEditView<<<
            else if(compareStrStr($id_or_view, 'editNameView')){$data = $this->model_lcTableP->array_from_post(
                $aFromPost = '$fieldsEditView'
                );}
            //<<<validatedControllerFieldsEditView>>>
            else {
                $data = $this->model_lcTableP->array_from_post(
                    $aFromPost = '$validatedFieldsNames'
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
                $data = $this->model_lcTableP->save($data,$id);
                if($this->input->post('fromAjax')){
                    $aReturn['message'] = setMessage($data,$aFromPost,'tableTitle agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oUcTableS'] = $data = $this->model_lcTableP->get_by($data,true)[0];
                    $data->primary = $primary = $this->model_lcTableP->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit",$this->data,true);
                    $aReturn['redirect'] = 'lcModS/lcTableP';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                } else {
                    redirect("lcModS/lcTableP");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit",$this->data,true);
                    echo json_encode($aReturn);
                } else {
                    $this->data["subview"] = "lcModS/lcTableP/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        if(strhas($id_or_view, 'ini')){
            if($this->input->post('fromAjax') && $error != 'ok'){
                $aReturn['error'] = $error;
                $aReturn['view'] = $this->load->view("lcModS/lcTableP/editView",$this->data,true);
                echo json_encode($aReturn);
            } else if(!$this->input->post('fromAjax')){
                $this->data["oUcTableS"]->fieldEditView = CiOptionsQuery::create()->findOneByEditTag('editView')->getIdSetting();
                $this->data["subview"] = "lcModS/lcTableP/edit-ini";
                return $this->load->view("lcModS/lcTableP/edit-ini",$this->data,true);
            }
        }
        //>>>viewLoadEditData<<<
        else if(compareStrStr($id_or_view, 'editNameView')){
            if($this->input->post('fromAjax') && $error != 'ok'){
                $aReturn['error'] = $error;
                $aReturn['view'] = $this->load->view("lcModS/lcTableP/editView",$this->data,true);
                echo json_encode($aReturn);
            } else if(!$this->input->post('fromAjax')){

                $this->data["oUcTableS"]->fieldEditView = CiOptionsQuery::create()->findOneByEditTag('editView')->getIdSetting();

                $this->data["subview"] = "lcModS/lcTableP/editView";
                return $this->load->view("lcModS/lcTableP/editView",$this->data,true);
            }
        }
        //<<<viewLoadEditData>>>
        else if($this->input->post('fromAjax') && $error != 'ok'){
            $aReturn['error'] = $error;
            $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit",$this->data,true);
            echo json_encode($aReturn);
        } else if(!$this->input->post('fromAjax')){
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