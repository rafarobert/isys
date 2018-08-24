<?php 
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Ctrl_UcTableP extends ES_Ctrl_UcTableP {

    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        if(!self::$instance){
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index($view = NULL , $id = NULL){
        list($id, $view) = $this->filterIdOrView($id, $view);
        // Obtiene a todos los lcTableP
        $oUcTableP = $this->model_lcTableP->get();
        //>>>setForeignTableFields<<<
        $oUcTableP = $this->model_fkLcTableP->setForeignFields($this->lcFkObjFieldP,'idFkLcTableP',$oUcTableP,'idLocalLcTableP', true);
        //<<<setForeignTableFields>>>
        //>>>validateFieldsImgsIndex<<<
        $oUcTableP = $this->model_lcTableP->getThumbs($oUcTableP);
        //<<<validateFieldsImgsIndex>>>
        $this->data["oUcTableP"] = $oUcTableP;
        // Carga la vista
        return $this->loadView('lcModS/lcTableP/index',$view);
    }

    public function edit($view = NULL , $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);
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

        if(validateVar($view)){
            $this->form_validation->set_rules($this->model_lcTableP->{"rules_edit_$view"});
        } else {
            $this->form_validation->set_rules($rules);
        }
        //>>>validateFieldImgIndex<<<
        $oUcTableS = $this->model_lcTableP->getThumbs($oUcTableS)[0];
        //<<<validateFieldImgIndex>>>
        //>>>setADBTablesRefFields<<<
        $aDBTables = std2array($this->model_tables->get_by(['tabla']));
        $this->data['aDBTables'] = array_combine(array_column($aDBTables,'id_table'),array_column($aDBTables,'tabla'));
        $this->data['aDBTableRef'] = isset($oUcTableS->idDBTableRef) && $oUcTableS->idDBTableRef != null ? [$oUcTableS->idDBTableRef => $oUcTableS->idDBTableRef]: [];
        $this->data['aDBTableFields'] = isset($oUcTableS->fieldDBTableRef) && $oUcTableS->fieldDBTableRef != null ? std2array($oUcTableS->fieldDBTableRef) : [];
        //<<<setADBTablesRefFields>>>
        $this->data["oUcTableS"] = $oUcTableS;
        $aReturn = array();
        // Se procesa el formulario
        if($this->form_validation->run() == true){
            $error = 'ok';
            list($data,$aFromPost) = $this->dataFromPost($view);

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
                    $this->data['oUcTableS'] = $data = $this->model_lcTableP->get_one_by($data,true);
                    $data->primary = $primary = $this->model_lcTableP->_primary_key;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit",$this->data,true);
                    $aReturn['redirect'] = 'lcModS/lcTableP';
                    $aReturn = array_merge($aReturn,std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("lcModS/lcTableP");
                }
            } else {
                if($this->input->post('fromAjax')){
                    $aReturn['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit",$this->data,true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "lcModS/lcTableP/edit";
                }
            }
        } else {
            $aReturn['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('lcModS/lcTableP/edit',$view ,'fieldEditView', $error);
    }
    //extraFunctions
}