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
    public function setUcObjField($lcObjField = ''){
        if(objectHas($this,'lcField', false)){
            return $this->lcLocalField = $lcObjField;
        }
    }
    //<<<packSettersFunctions>>>

    //>>>packFindOneByFunctions<<<
    public function findOneByUcObjField($lcObjField){
        $aData = $this->get_by(['lcField' => $lcObjField],false,true);
        if(isArray($aData)){
            return $this->setFromData($aData[0]);
        } else if(isObject($aData)){
            return $this->setFromData($aData);
        } else {
            return null;
        }
    }
    //<<<packFindOneByFunctions>>>

    //>>>packFilterByFunctions<<<
    public function filterByUcObjField($lcObjField, $selecting = null){
        $bSelecting = true;
        $aSetttings = array();
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['lcField'] = $lcObjField;
        $aData = $this->get_by($aSetttings,$bSelecting);
        return $aData;
    }
    //<<<packFilterByFunctions>>>

    public function getNewUcObjTableS()
    {
        $post = $this->input->post();

        $this->lcTableS = $this->setFromData($post);

        return $this->lcTableS;
    }

    public function find($bCreateCtrl = false){
        if($bCreateCtrl){
            Ctrl_Tables::create($bCreateCtrl);
        }
        // Obtiene a todos los lcTableP
        $oUcObjTableP = $this->get();
       //>>>setForeignTableFields<<<
        $oUcObjTableP = $this->setForeignFields($this->lcFkObjFieldP, 'idFkLcTableP', $oUcObjTableP, 'idLocalLcTableP', true);
        //<<<setForeignTableFields>>>
        //>>>validateFieldsImgsIndex<<<
        $oUcObjTableP = $this->getThumbs($oUcObjTableP);
        //<<<validateFieldsImgsIndex>>>

        $oModelUcObjTableP = array();

        foreach ($oUcObjTableP as $lcTableS){

            $oModelUcObjTableP[] = $this->setFromData($lcTableS);
        }
        return $oModelUcObjTableP;
    }

    public function setFromData($oData, $oUcTableS = null){

        if(isArray($oData)){
            $oData = array2std($oData);
        }
        if(isObject($oData)){

            $oData = verifyArraysInResult($oData);

            if(isObject($oUcTableS)){

                $oModelUcObjTableP = $oUcTableS;

            } else {

                $oModelUcObjTableP = new ES_Model_UcTableP();
            }
            $aFields = $this->getArrayData(true);

            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelUcObjTableP->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelUcObjTableP->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : $oData->{setObject($key)};
                }
            }
            return $oModelUcObjTableP;

        } else {

            return new ES_Model_UcTableP();
        }
    }

    public function getDataFromPost($object = null)
    {
        $data = $this->array_from_post(
            $aFromPost = '$validatedFieldsNames'
        );
        $oModelUcObjTableS = $this->setFromData($data,$object);
        return [$oModelUcObjTableS, $aFromPost];
    }

    public function getArrayData($bWithForeign = false){
        $data = array(
            //>>>localPackForGetData<<<
            'lcField' => $this->lcField,
            //<<<localPackForGetData>>>
        );
        if($bWithForeign){
            //>>>foreignPackForGetData<<<
            $data['lcLocalField_lcForeignField'] = $this->lcLocalField_lcForeignField;
            //<<<foreignPackForGetData>>>
        }
        return $data;
    }
}