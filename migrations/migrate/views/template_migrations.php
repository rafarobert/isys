<?php
/**
 * Created by PhpStorm.
 * User: $userCreated
 * Date: $dateCreated
 * Time: $timeCreated
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_cms_personas extends CI_Migration {

    public function up()
    {
        $fields = '$tableFields';
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('$tablePrimaryKey', TRUE);
        $this->create_or_alter_table('$tableName', '$settings');
        $settings = '$tableSettings';
        $this->set_settings($settings);
    }
}