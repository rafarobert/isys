
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 20/02/2018
 * Time: 2:23 am
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
    'required' => true,
    'constraint' => 11,
    'unsigned' => true,
  ),
  'name' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'required' => true,
  ),
  'email' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'required' => true,
  ),
  'lastname' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'required' => true,
  ),
  'mobile_number_1' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 12,
    'required' => true,
  ),
  'mobile_number_2' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 12,
    'required' => true,
  ),
  'ci' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 30,
    'required' => true,
  ),
  'img' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 500,
    'required' => true,
  ),
  'password' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 128,
    'required' => true,
  ),
  'status' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 255,
  ),
  'change_count' => 
  array (
    'type' => 'INT',
  ),
  'settings' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 255,
  ),
  'date_created' => 
  array (
    'type' => 'DATETIME',
    'required' => true,
  ),
  'date_modified' => 
  array (
    'type' => 'DATETIME',
    'required' => true,
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
        