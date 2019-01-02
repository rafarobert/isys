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

    //>>>globalStaticLocalVars<<<
    /**
     * Value for lcVarStaticOption static option.
     *
     * @var        dataType
     */
    public static $lcObjStaticOption = 'lcVarStaticOption';
    //<<<globalStaticLocalVars>>>
    ////>>>globalStaticFieldName<<<
    /**
     * Value for lcVarStaticFieldName static option.
     *
     * @var        dataType
     */
    public static $lcObjStaticFieldName = 'lcVarStaticFieldName';
    //<<<globalStaticFieldName>>>
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

    public function getNew()
    {
        $this->lcTableS = new Model_UcTableP();
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
    public function findOneByUcObjField($lcObjField,$orderBy = '', $direction = 'ASC'){
        $aData = $this->get_by(['lcField' => $lcObjField],false,true,$orderBy,$direction);
        $aData = $this->setForeigns($aData,$orderBy,$direction);
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
    public function filterByUcObjField($lcObjField, $selecting = null, $orderByOrAsModel = true, $direction = 'ASC'){
        $bSelecting = true;
        $aSetttings = array();
        $bAsModel = true;
        if(isArray($selecting)){
            $aSetttings = $selecting;
        } else if(isString($selecting)){
            $aSetttings[] = $selecting;
        } else if(isBoolean($selecting) || $selecting == null){
            $bSelecting = false;
        }
        $aSetttings['lcField'] = $lcObjField;

        if(isString($orderByOrAsModel)){
            $orderBy = $orderByOrAsModel;
        } else if(is_bool($orderByOrAsModel)){
            $bAsModel = $orderByOrAsModel;
        }
        $aData = $this->get_by($aSetttings, $bSelecting, null, $orderByOrAsModel, $direction);
        if($bAsModel){
            $oDatas = array();
            foreach ($aData as $data){
                $oDatas[] = $this->setForeigns($data,$orderByOrAsModel,$direction);
            }
            return $oDatas;
        }
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

        //>>>validateFieldsImgsIndex<<<
        $oUcObjTableP = $this->getThumbs($oUcObjTableP);
        //<<<validateFieldsImgsIndex>>>

        $oModelUcObjTableP = array();

        foreach ($oUcObjTableP as $lcTableS){

            $oModelUcObjTableP[] = $this->setForeigns($lcTableS);
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

                $oModelUcObjTableP = new Model_UcTableP();
            }
            $aFields = $this->getArrayData(true);
            $aData = std2array($oData);
            foreach ($aFields as $key => $value){

                if(objectHas($oData,$key,false)){

                    $oModelUcObjTableP->$key = isNumeric($oData->$key) ? valNumeric($oData->$key) : $oData->$key;

                } else if(objectHas($oData,setObject($key),false)){

                    $oModelUcObjTableP->$key = isNumeric($oData->{setObject($key)}) ? valNumeric($oData->{setObject($key)}) : ($oData->{setObject($key)} == "" ? $value : $oData->{setObject($key)});

                } else if(objectHas($oData,ucfirst(setObject($key)),false)){

                    $oModelUcObjTableP->$key = isNumeric($oData->{ucfirst(setObject($key))}) ? valNumeric($oData->{ucfirst(setObject($key))}) : ($oData->{ucfirst(setObject($key))} == "" ? $value : $oData->{ucfirst(setObject($key))});
                }
                if(in_array($key,$this->uriStrings) && isset($oData->$key) && validateVar($oData->$key)){

                    $oModelUcObjTableP->uriString = clean($oData->$key);

                } else if(in_array($key,$this->uriStrings) && isset($oData->{setObject($key)}) && validateVar($oData->{setObject($key)})){

                    $oModelUcObjTableP->uriString = clean($oData->{setObject($key)});

                } else if(in_array($key,$this->uriStrings) && isset($oData->{ucfirst(setObject($key))}) && validateVar($oData->{ucfirst(setObject($key))})){

                    $oModelUcObjTableP->uriString = clean($oData->{ucfirst(setObject($key))});
                }
                if(isset($aData[$key])) {
                    unset($aData[$key]);
                }
            }
            foreach ($aData as $dataKey => $dataValue){
                $oModelUcObjTableP->$dataKey = $dataValue;
            }
            return $oModelUcObjTableP;

        } else {

            return new Model_UcTableP();
        }
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
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : $val;
        };
        $data = array_map($funct,$data);
        return $data;
    }

    public function toArray($bWithForeign = false){
        $data = array(
            //>>>localPackForToArray<<<
            'UcObjField' => $this->lcField,
            //<<<localPackForToArray>>>
        );
        if($bWithForeign){
            //>>>foreignPackForToArray<<<
            $data['UcObjLocalFieldUcObjForeignField'] = $this->lcLocalField_lcForeignField;
            //<<<foreignPackForToArray>>>
        }
        if(isset($this->thumbs) && validateVar($this->thumbs, 'array')){
            $data['thumbs'] = $this->thumbs;
        }
        if(isset($this->uriString) && validateVar($this->uriString)){
            $data['uriString'] = $this->uriString;
        }
        $funct = function($val){
            return isNumeric($val,false) ? valNumeric($val) : ($val == null ? '' : $val);
        };
        $data = array_map($funct,$data);
        if(isset($this->foreigns)){
            foreach ($this->foreigns as $fKey => $fValue){
                $data[$fKey] = $fValue;
            }
        }
        return $data;
    }
}