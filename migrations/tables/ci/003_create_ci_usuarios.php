
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 07/02/2018
 * Time: 2:33 am
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_ci_usuarios extends CI_Migration {

    public function up()
    {
        $fields = array (
  'id_usuario' => 
  array (
    'type' => 'int',
    'auto_increment' => true,
    'unsigned' => true,
    'constraint' => 11,
  ),
  'name' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'unsigned' => true,
  ),
  'email' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'unsigned' => true,
  ),
  'lastname' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'unsigned' => true,
  ),
  'mobile_number_1' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 12,
    'unsigned' => true,
  ),
  'mobile_number_2' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 12,
    'unsigned' => true,
  ),
  'ci' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 30,
    'unsigned' => true,
  ),
  'img' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 500,
    'unsigned' => true,
  ),
  'password' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 128,
    'unsigned' => true,
  ),
  'date_created' => 
  array (
    'type' => 'DATETIME',
    'unsigned' => true,
  ),
  'date_modified' => 
  array (
    'type' => 'DATETIME',
    'unsigned' => true,
  ),
);

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("id_usuario", TRUE);
        
        $this->create_or_alter_table("ci_usuarios",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        