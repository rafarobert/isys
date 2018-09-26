<?php
/**
 * Created by PhpStorm.
 * User: $userCreated
 * Date: $dateCreated
 * Time: $timeCreated
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_#tableName extends CI_Migration
{
    static $tableId = '#tablePrimaryKey';
    static $tableName = '#tableName';
    static $tableFields = '$tableFields';
    static $tableForeignKeys = '$tableRelations';
    static $tableSettings = '$tableSettings';

    public function up()
    {
        $this->dbforge->add_field(self::$tableFields);
        $this->dbforge->add_key(self::$tableId, TRUE);
        $this->dbforge->add_key(self::$tableForeignKeys);
        $this->create_or_alter_table(self::$tableName);
        $settings = self::$tableSettings;
        $this->set_settings($settings, self::$tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('#tableName');
    }
}