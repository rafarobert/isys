<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Model_UcTableP extends ES_Model_UcTableP
{

    private static $instance = null;

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
}
