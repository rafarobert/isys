
        <?php
/**
 * Created by herbalife.
 * User: Rafael Gutierrez Gaspar
 * Date: 27/01/2018
 * Time: 12:36 pm
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_tic_modulos extends CI_Migration {

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
  ),
  'url' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 600,
  ),
  'descripcion' => 
  array (
    'type' => 'TEXT',
  ),
  'icon' => 
  array (
    'type' => 'VARCHAR',
    'constraint' => 200,
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
  ),
  'date_modified' => 
  array (
    'type' => 'DATETIME',
  ),
);

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );
        $fk_keys = array(
            "fk_hbf_sesiones_hbf_club" => array(
                "table" => "hbf_clubs",
                "id" => "id_club",
            ),
            "fk_hbf_sesiones_hbf_turnos1" => array(
                "table" => "hbf_turnos",
                "id" => "id_turno",
            ),
        );
        
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("id_modulo", TRUE);
        $this->create_or_alter_table("tic_modulos",$settings);

        $this->create_ctrl();
        $this->create_model();
        $this->create_view_files();

    }
}
        