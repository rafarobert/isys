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
    public $lcLocalField;
    //<<<globalLocalFieldsVars>>>

    //>>>globalLocalWithForeignFieldsVars<<<
    /**
     * The value for the lcLocalField field related with lcFkField.
     *
     * @var        dataType
     */
    public $lcLocalField_lcFkField;
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
        return $this->$lcField = $lcField;
    }
    //<<<packSettersFunctions>>>

    public function setFromResult($oResult){

        $oResult = verifyArraysInResult(std2array($oResult));

        foreach ($oResult as $key => $result){

            $this->$key = $result;
        }

        return $this;
    }
}