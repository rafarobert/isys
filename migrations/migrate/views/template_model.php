<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_UcTableP extends UcModS_Model {

    //fieldsProperties

    protected $_table_name = "lcmodType_lcTableP";
    protected $_order_by = "idTable desc";
    protected $_timestaps = true;
    protected $_primary_key = "idTable";

    public $rules = '$tableRules';
    public $rules_edit = '$tableRulesEdit';

    function __construct(){
        parent::__construct();
    }

    public function get_new(){
        $lcTableS = new stdClass();

        //stdFields

        return $lcTableS;
    }
}