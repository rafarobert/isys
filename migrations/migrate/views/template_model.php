<?php // *** estic - model_file - start ***
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_ucTableP extends Admin_Model {

    //fieldsProperties

    protected $_table_name = "hbf_lcTableP";
    protected $_order_by = "id_lcTableS desc";
    protected $_timestaps = true;
    protected $_primary_key = "id_lcTableS";

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