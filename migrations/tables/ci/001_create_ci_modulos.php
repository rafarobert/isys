
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 03/02/2018
 * Time: 12:36 am
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_ci_modulos extends CI_Migration {

    public function up()
    {
        $fields = array (
  'id_modulo' => 
  array (
    'type' => 'int',
    'auto_increment' => true,
    'unsigned' => true,
    'constraint' => 11,
  ),
  'titulo' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'unsigned' => true,
  ),
  'url' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 600,
    'unsigned' => true,
  ),
  'descripcion' => 
  array (
    'type' => 'TEXT',
    'unsigned' => true,
  ),
  'icon' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 200,
    'unsigned' => true,
  ),
  'opt_estado' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 15,
    'unsigned' => true,
  ),
  'opt_listado' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 15,
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
        $this->dbforge->add_key("id_modulo", TRUE);
        
        $this->create_or_alter_table("ci_modulos",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        