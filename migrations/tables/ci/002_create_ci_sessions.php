
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 20/02/2018
 * Time: 6:47 pm
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
    'required' => true,
  ),
  'ip_address' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 45,
    'required' => true,
  ),
  'timestamp' => 
  array (
    'type' => 'int',
    'constraint' => 10,
    'required' => true,
    'default' => '0',
    'unsigned' => true,
  ),
  'data' => 
  array (
    'type' => 'BLOB',
    'required' => true,
  ),
  'last_activity' => 
  array (
    'type' => 'DATETIME',
  ),
  'id_user' => 
  array (
    'type' => 'int',
    'constraint' => 11,
    'unsigned' => true,
      'default' => null
  ),
  'id_hbf_sesion' => 
  array (
    'type' => 'int',
    'constraint' => 10,
    'unsigned' => true,
      'default' => null
  ),
  'settings' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 500,
      'default' => null
  ),
);

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );
        $fk_keys = array(
            "ci_sessions_ibfk_1" => array(
                "table" => "ci_usuarios",
                "idLocal" => "id_user",
                "idForeign" => "id_usuario",
            ),
            "ci_sessions_ibfk_3" => array(
                "table" => "hbf_sesiones",
                "idLocal" => "id_hbf_sesion",
                "idForeign" => "id_sesion",
            ),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("id", TRUE);
        
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table("ci_sessions",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        