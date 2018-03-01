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
    public function up()
    {
        $fields = '$tableFields';
        $fk_keys = '$tableRelations';
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('#tablePrimaryKey', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('#tableName');
        $settings = '$tableSettings';
        $this->set_settings($settings,'#tableName');
    }

    public function down()
    {
        //$this->dbforge->drop_table('#tableName');
    }
}