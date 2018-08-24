<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Model_UcTableP extends UcModS_Model {

    public $lcTableS;

    //fieldsProperties

    public $rules = '$tableRules';
    public $rules_edit = '$tableRulesEdit';
    //>>>validatedModelFieldsEditView<<<
    public $rulesNameEditView = '$tableRulesEditView';
    //<<<validatedModelFieldsEditView>>>

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $this->lcTableS = new stdClass();

        //stdFields

        return $this->lcTableS;
    }
}