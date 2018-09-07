<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_UcTableP extends ES_Model_UcTableP {

    protected $_order_by = "idTable desc";
    protected $_timestaps = true;
    public $_table_name = "lcmodType_lcTableP";
    public $_primary_key = "idTable";
    private static $instance = null;

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
}