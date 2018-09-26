<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_UcTableP extends ES_UcModS_Model
{
    protected $_timestaps = true;
    protected $_order_by = "idTable desc";
    public $_primary_key = "idTable";
    public $_table_name = "lcmodType_lcTableP";
    public $_es_class = "ES_Model_UcTableP";
    public $lcTableS;

    //>>>globalLocalFieldsVars<<<
    /**
     * Value for lcLocalField field.
     *
     * @var        dataType
     */
    public $lcVarLocalField = '$defaultDataVal';
    //<<<globalLocalFieldsVars>>>

    //>>>globalLocalWithForeignFieldsVars<<<
    /**
     * Value for lcLocalField field related with lcForeignField.
     *
     * @var        dataType
     */
    public $lcVarLocalField_lcForeignField = null;
    //<<<globalLocalWithForeignFieldsVars>>>

    public $rules = '$tableRules';
    public $rules_edit = '$tableRulesEdit';
    //>>>validatedModelFieldsEditView<<<
    public $rulesNameEditView = '$tableRulesEditView';
    //<<<validatedModelFieldsEditView>>>

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $this->lcTableS = new ES_Model_UcTableP();
        return $this->lcTableS;
    }

    public function getRules(){
        return $this->rules;
    }

    public function getRulesEdit(){
        return $this->rules_edit;
    }

    //>>>packGettersFunctions<<<
    public function getUcObjField()
    {
        return $this->lcLocalField;
    }
    //<<<packGettersFunctions>>>

    //>>>packLocalForeignGettersFunctions<<<
    public function getUcObjLocalFieldUcObjForeignField()
    {
        return $this->lcLocalField_lcForeignField;
    }
    //<<<packLocalForeignGettersFunctions>>>

    //>>>packSettersFunctions<<<
    public function setUcObjField($lcObjField = '')
    {
        if(objectHas($this,'lcField', false)){
            return $this->lcLocalField = $lcObjField;
        }
    }
    //<<<packSettersFunctions>>>

    //>>>packQueryFunctions<<<
    public function findOneByUcObjField($lcObjField){

        $oData = $this->model_lcTableP->get_by(['lcField' => $lcObjField])[0];

        return $this->setFromObject($oData);
    }
    //<<<packQueryFunctions>>>

    public function getNewUcObjTableS()
    {
        $post = $this->input->post();

        $this->lcTableS = $this->setFromObject($post);

        return $this->lcTableS;
    }

    public function find(){
        // Obtiene a todos los lcTableP
        $oUcObjTableP = $this->model_lcTableP->get();
        //>>>setForeignTableFields<<<
        $oUcObjTableP = $this->model_fkLcTableP->setForeignFields($this->lcFkObjFieldP, 'idFkLcTableP', $oUcObjTableP, 'idLocalLcTableP', true);
        //<<<setForeignTableFields>>>
        //>>>validateFieldsImgsIndex<<<
        $oUcObjTableP = $this->model_lcTableP->getThumbs($oUcObjTableP);
        //<<<validateFieldsImgsIndex>>>

        $oModelUcObjTableP = array();

        foreach ($oUcObjTableP as $lcTableS){

            $oModelUcObjTableP[] = $this->setFromObject($lcTableS);
        }
        return $oModelUcObjTableP;
    }

    public function findOneBy($arrayData){

        $oUcTableS = $this->model_lcTableP->get_one_by($arrayData, true);

        return $this->setFromObject($oUcTableS);
    }

    public function setFromObject($oResult, $oUcTableS = null){

        $oResult = verifyArraysInResult(std2array($oResult));

        if(isObject($oUcTableS)){

            $oModelUcObjTableP = $oUcTableS;

        } else {

            $oModelUcObjTableP = new ES_Model_UcTableP();
        }
        $aFields = $this->getArrayData();

        foreach ($aFields as $key => $value){

            if(objectHas($oResult,$key,false)){

                $oModelUcObjTableP->$key = $oResult->$key;

            } else if(objectHas($oResult,setObject($key),false)){

                $oModelUcObjTableP->$key = $oResult->{setObject($key)};
            }
        }
        return $oModelUcObjTableP;
    }

    public function getDataFromPost()
    {
        $data = $this->model_lcTableP->array_from_post(
            $aFromPost = '$validatedFieldsNames'
        );
        $oModelUcObjTableS = $this->setFromObject($data);
        return [$oModelUcObjTableS, $aFromPost];
    }

    public function getArrayData(){
        $data = array(
            //>>>packForGetData<<<
            'lcField' => $this->lcField,
            //<<<packForGetData>>>
        );
        return $data;
    }
}