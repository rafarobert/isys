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
    public $lcLocalField = '';
    //<<<globalLocalFieldsVars>>>

    //>>>globalLocalWithForeignFieldsVars<<<
    /**
     * Value for lcLocalField field related with lcFkField.
     *
     * @var        dataType
     */
    public $lcLocalField_lcFkField = '';
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
    public function setUcObjField($lcField = '')
    {
        return $this->lcField = $lcField;
    }
    //<<<packSettersFunctions>>>

    public function getNewUcTableS()
    {
        $this->lcTableS = new ES_Model_UcTableP();
        return $this->lcTableS;
    }

    public function find(){

        $oUcTableP = $this->model_lcTableP->get();

        $oModelConceptos = array();

        foreach ($oUcTableP as $lcTableS){

            $oModelUcTableP[] = $this->setFromObject($lcTableS);
        }
        return $oModelUcTableP;
    }

    public function findOneBy($data){

        $oUcTableS = $data = $this->model_lcTableP->get_one_by($data, true);

        return $this->setFromObject($oUcTableS);
    }

    public function findOneByIdUcTableS($idUcTableS){

        $oUcTableS = $this->model_lcTableS->get_by(['id_lcTableS' => $idUcTableS])[0];

        return $this->setFromObject($oUcTableS);

    }

    public function getDataFromPost()
    {
        $data = $this->model_lcTableP->array_from_post(
            $aFromPost = '$validatedFieldsNames'
        );
        return [$data, $aFromPost];
    }

    public function setFromObject($oResult){

        $oResult = verifyArraysInResult(std2array($oResult));

        foreach ($oResult as $key => $result){

            if(objectHas($this,$key,false)){

                $this->$key = $result;
            }
        }
        return $this;
    }
}