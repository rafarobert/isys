
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
<<<<<<< HEAD
 * Date: 14/02/2018
 * Time: 2:52 am
=======
 * Date: 08/02/2018
 * Time: 6:35 pm
>>>>>>> f1a20610e60de057362972c7cc2783cf0fef50fe
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
);

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("", TRUE);
        
        $this->create_or_alter_table("ci_sessions",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        