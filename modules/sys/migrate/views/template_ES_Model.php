<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_UcTableP extends ES_UcModS_Model
{

    public $lcTableS;

    //>>>globalLocalFieldsVars<<<
    /**
     * Value for lcLocalField field.
     *
     * @var        dataType
     */
    public $lcObjLocalField = '';
    //<<<globalLocalFieldsVars>>>

    //>>>globalLocalWithForeignFieldsVars<<<
    /**
     * Value for lcLocalField field related with UcFkField.
     *
     * @var        dataType
     */
    public $lcObjLocalFieldUcObjFkField = '';
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
        return $this->lcField;
    }
    //<<<packGettersFunctions>>>

    //>>>packSettersFunctions<<<
    public function setUcObjField($lcObjField = '')
    {
        if(objectHas($this,'lcField', false)){
            return $this->lcField = $lcObjField;
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

        $oUcTableP = $this->model_lcTableP->get();

        $oModelUcTableP = array();

        foreach ($oUcTableP as $lcTableS){

            $oModelUcTableP[] = $this->setFromObject($lcTableS);
        }
        return $oModelUcTableP;
    }

    public function findOneBy($arrayData){

        $oUcTableS = $this->model_lcTableP->get_one_by($arrayData, true);

        return $this->setFromObject($oUcTableS);
    }

    public function getDataFromPost()
    {
        $data = $this->model_lcTableP->array_from_post(
            $aFromPost = '$validatedFieldsNames'
        );
        return [$data, $aFromPost];
    }

    public function setFromObject($oResult, $oUcTableS = null){

        $oResult = verifyArraysInResult(std2array($oResult));

        if(isObject($oUcTableS)){

            $oModelUcObjTableP = $oUcTableS;

        } else {

            $oModelUcObjTableP = new ES_Model_UcTableP();
        }

        foreach ($oResult as $key => $result){

            if(objectHas($this,$key,false)){

                $oModelUcObjTableP->$key = $result;
            }
        }
        return $oModelUcObjTableP;
    }

    public function dataFromPost()
    {
        $data = $this->model_lcTableP->array_from_post(
            $aFromPost = '$validatedFieldsNames'
        );
        return [$data, $aFromPost];
    }
}