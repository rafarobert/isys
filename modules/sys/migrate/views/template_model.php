<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_UcTableP extends ES_Model_UcTableP
{

    protected $_timestaps = true;
    private static $instance = null;
    protected $_order_by = "idTable desc";
    public $_primary_key = "idTable";
    public $_table_name = "lcmodType_lcTableP";
    public $_es_class = "ES_Model_UcTableP";

    function __construct()
    {
        parent::__construct();
    }

    public static function create()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTimeStamps()
    {
        return $this->_timestaps;
    }

    public function getOrderBy()
    {
        return $this->_order_by;
    }

    public function getPrimaryKey()
    {
        return $this->_primary_key;
    }

    public function getEsClass()
    {
        return $this->_es_class;
    }

    public function setOrderBy($field, $bDescAsc = false)
    {
        $order = $bDescAsc ? 'asc' : 'desc';
        return $this->_order_by = "$field $order";
    }

    public function setTimeStamps($bSw = true)
    {
        return $this->_timestaps = $bSw;
    }

}