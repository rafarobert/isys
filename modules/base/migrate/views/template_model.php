<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_UcTableP extends UcModS_Model {

    public $lcTableS;

    //fieldsProperties

    private static $instance = null;
    protected $_table_name = "lcmodType_lcTableP";
    protected $_order_by = "idTable desc";
    protected $_timestaps = true;

    public $_primary_key = "idTable";
    public $rules = '$tableRules';
    public $rules_edit = '$tableRulesEdit';
    //>>>validatedModelFieldsEditView<<<
    public $rulesNameEditView = '$tableRulesEditView';
    //<<<validatedModelFieldsEditView>>>

    function __construct(){
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

    public function get_new(){
        $this->lcTableS = new stdClass();

        //stdFields

        return $this->lcTableS;
    }
}