<?php
/**
 * Created by PhpStorm.
 * User: $userCreated
 * Date: $dateCreated
 * Time: $timeCreated
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_#tableName extends CI_Migration
{
    const tableId = '#tablePrimaryKey';
    const tableName = '#tableName';
    const tableFields = '$tableFields';
    const tableForeignKeys = '$tableRelations';
    const tableSettings = '$tableSettings';

    public function up()
    {
        $this->dbforge->add_field(self::tableFields);
        $this->dbforge->add_key(self::tableId, TRUE);
        $this->dbforge->add_key(self::tableForeignKeys);
        $this->create_or_alter_table(self::tableName);
        $settings = self::tableSettings;
        $this->set_settings($settings,self::tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('#tableName');
    }
}