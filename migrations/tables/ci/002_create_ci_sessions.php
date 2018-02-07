
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 07/02/2018
 * Time: 2:33 am
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_ci_sessions extends CI_Migration {

    public function up()
    {
        $fields = array (
  'id' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 128,
    'unsigned' => true,
  ),
  'ip_address' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 45,
    'unsigned' => true,
  ),
  'timestamp' => 
  array (
    'type' => 'int',
    'constraint' => 10,
    'unsigned' => true,
    'default' => '0',
  ),
  'data' => 
  array (
    'type' => 'BLOB',
    'unsigned' => true,
  ),
  'ci_usuarios_id_usuario' => 
  array (
    'type' => 'int',
    'unsigned' => true,
    'constraint' => 11,
  ),
  'hbf_usuarios_id_usuario' => 
  array (
    'type' => 'int',
    'unsigned' => true,
    'constraint' => 11,
  ),
);

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );
        $fk_keys = array(
            "fk_ci_sessions_ci_usuarios1" => array(
                "table" => "ci_usuarios",
                "id" => "ci_usuarios_id_usuario",
            ),
            "fk_ci_sessions_hbf_usuarios1" => array(
                "table" => "hbf_usuarios",
                "id" => "hbf_usuarios_id_usuario",
            ),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("", TRUE);
        
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table("ci_sessions",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        