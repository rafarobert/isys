<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class ES_Ctrl_UcTableP extends ES_UcModS_Controller
{

    //>>>initVarsForeignTable<<<
    public $lcFkObjFieldP;

    //<<<initVarsForeignTable>>>

    public function __construct()
    {
        parent::__construct();
        $this->load->model("lcModS/model_lcTableP");
        //>>>loadModelsForeignTable<<<
        $this->load->model("lcFkModS/model_lcFkTableP");
        //<<<loadModelsForeignTable>>>
        $this->initLoaded();
        //>>>initFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->get_by('$fFieldsRef', true);
        //<<<initFieldsForeignTable>>>
        //>>>compareFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->setForeignValues($this->t1Contents, 't1FieldRef', $this->t2Contents, 't2FieldRef');
        //<<<compareFieldsForeignTable>>>
        $this->data['tabName'] = $this->model_lcTableP->_table_name;
        //>>>setFieldsForeignTable<<<
        $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($this->lcFkObjFieldP, 'divider');
        //<<<setFieldsForeignTable>>>
    }

    public function getUcObjTableP(){
        // Obtiene a todos los lcTableP
        $oUcObjTableP = $this->model_lcTableP->get();
        //>>>setForeignTableFields<<<
        $oUcObjTableP = $this->model_fkLcTableP->setForeignFields($this->lcFkObjFieldP, 'idFkLcTableP', $oUcObjTableP, 'idLocalLcTableP', true);
        //<<<setForeignTableFields>>>
        //>>>validateFieldsImgsIndex<<<
        $oUcObjTableP = $this->model_lcTableP->getThumbs($oUcObjTableP);
        //<<<validateFieldsImgsIndex>>>

        return $this->setUcObjTableP($oUcObjTableP);
    }


    public function setUcObjTableP($oData, $oUcObjTableP = null){
        if(validateVar($oData,'array')){
            $oModelUcObjTableP = array();
            foreach ($oData as $key => $lcObjTableS){
                if(validateVar($oUcObjTableP,'object')){
                    $oModelUcObjTableP[$key] = $oUcObjTableP;
                } else {
                    $oModelUcObjTableP[$key] = new ES_Model_UcTableP();
                }
                $oModelUcObjTableP[$key] = $oModelUcObjTableP[$key]->setFromObject($lcObjTableS);
            }
            return $oModelUcObjTableP;
        } else if(validateVar($oData,'object')){
            if(validateVar($oUcObjTableP,'object')){
                $oModelUcObjTableS = $oUcObjTableP;
            } else {
                $oModelUcObjTableS = new ES_Model_UcTableP();
            }
            $oModelUcObjTableS = $oModelUcObjTableS->setFromObject($oData);
            return $oModelUcObjTableS;
        } else {
            return new ES_Model_Conceptos();
        }
    }


    public function dataFromPost($view)
    {
        if (!validateVar($view)) {
            $data = $this->model_lcTableP->array_from_post(
                $aFromPost = '$validatedFieldsNames'
            );
        } //>>>validatedControllerFieldsEditView<<<
        else if (compareStrStr($view, 'editNameView')) {
            $data = $this->model_lcTableP->array_from_post(
                $aFromPost = '$fieldsEditView'
            );
        }
        //<<<validatedControllerFieldsEditView>>>
        return [$data, $aFromPost];
    }
    //extraFunctions
}