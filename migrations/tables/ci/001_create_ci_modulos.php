
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 20/02/2018
 * Time: 2:23 am
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_ci_modulos extends CI_Migration {

    public function up()
    {
        $fields = array (
  'id_modulo' => 
  array (
    'type' => 'int',
    'required' => true,
    'constraint' => 11,
    'unsigned' => true,
  ),
  'titulo' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 100,
    'required' => true,
  ),
  'url' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 600,
    'required' => true,
  ),
  'descripcion' => 
  array (
    'type' => 'TEXT',
    'required' => true,
  ),
  'icon' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 200,
    'required' => true,
  ),
  'opt_estado' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 15,
    'required' => true,
  ),
  'opt_listado' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 15,
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
  'id_user_modified' => 
  array (
    'type' => 'int',
    'constraint' => 11,
    'unsigned' => true,
  ),
  'id_user_created' => 
  array (
    'type' => 'int',
    'constraint' => 11,
    'unsigned' => true,
  ),
  'settings' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 500,
  ),
  'date_modified' => 
  array (
    'type' => 'DATETIME',
    'required' => true,
  ),
  'date_created' => 
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
        $fk_keys = array(
            "ci_modulos_ibfk_1" => array(
                "table" => "ci_usuarios",
                "idLocal" => "id_user_modified",
                "idForeign" => "id_usuario",
            ),
            "ci_modulos_ibfk_2" => array(
                "table" => "ci_usuarios",
                "idLocal" => "id_user_created",
                "idForeign" => "id_usuario",
            ),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("id_modulo", TRUE);
        
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table("ci_modulos",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        