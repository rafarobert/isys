<?php
/**
 * Created by PhpStorm.
 * User: rafaelgutierrez
 * Date: 12/02/2019
 * Time: 6:35 pm
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

class Migration_Create_dfa_denuncias extends CI_Migration
{
    static $tableId = 'id_denuncia';
    static $tableName = 'dfa_denuncias';
    static $tableFields = array (
  'id_denuncia' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_denuncia',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
    'idForeign' => NULL,
    'table' => NULL,
    'pk' => 'id_denuncia',
  ),
  'id_victima' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_victima',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'label' => 'Nombre de la victima',
    'input' => 'select',
    'selectBy' => 'id_user',
    'idForeign' => 'id_persona',
    'table' => 'dfa_personas',
    'pk' => 'id_denuncia',
  ),
  'descripcion' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'descripcion',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_denuncia',
  ),
  'lugar_riesgo' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'lugar_riesgo',
    'type' => 'varchar',
    'constraint' => '500',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_denuncia',
  ),
  'id_tipo_relacion' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_tipo_relacion',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'label' => 'Relacion victima/denunciado',
    'input' => 'select',
    'selectBy' => 'nombre',
    'idForeign' => 'id_tipo_relacion',
    'table' => 'dfa_tipos_relaciones',
    'pk' => 'id_denuncia',
  ),
  'desc_lugar' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'desc_lugar',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_denuncia',
  ),
  'desc_denunciado' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'desc_denunciado',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_denuncia',
  ),
  'desc_mal_servicio' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'desc_mal_servicio',
    'type' => 'text',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'pk' => 'id_denuncia',
  ),
  'id_oficina' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_oficina',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'selectBy' => 'direccion',
    'idForeign' => 'id_oficina',
    'table' => 'dfa_oficinas',
    'pk' => 'id_denuncia',
  ),
  'id_rango_edad' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_rango_edad',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'idForeign' => 'id_rango_edad',
    'table' => 'dfa_rangos_edades',
    'pk' => 'id_denuncia',
  ),
  'ids_files' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'ids_files',
    'type' => 'varchar',
    'constraint' => '490',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'file',
    'pk' => 'id_denuncia',
  ),
  'id_cover_picture' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_cover_picture',
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 0,
    'input' => 'hidden',
    'pk' => 'id_denuncia',
  ),
  'estado' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'estado',
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
    'label' => 'Estado',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'ENABLED',
      1 => 'DISABLED',
    ),
    'pk' => 'id_denuncia',
  ),
  'change_count' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'change_count',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
    'label' => 'Numero de Cambios de este registro',
    'input' => 'disabled',
    'pk' => 'id_denuncia',
  ),
  'id_user_modified' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_user_modified',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'label' => 'Nombre del usuario que modifico el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_denuncia',
  ),
  'id_user_created' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'id_user_created',
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'idForeign' => 'id_user',
    'table' => 'ci_users',
    'label' => 'Nombre del usuario que creo el registro',
    'selectBy' => 
    array (
      0 => 'name',
      1 => 'lastname',
    ),
    'input' => 'disabled',
    'pk' => 'id_denuncia',
  ),
  'date_modified' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'date_modified',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de modificación',
    'input' => 'disabled',
    'pk' => 'id_denuncia',
  ),
  'date_created' => 
  array (
    'tabName' => 'dfa_denuncias',
    'field' => 'date_created',
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Fecha de creación',
    'input' => 'disabled',
    'pk' => 'id_denuncia',
  ),
);
    static $tableForeignKeys = array (
  'dfa_denuncias_id_denuncia_uindex' => 
  array (
    'table' => NULL,
    'idLocal' => 'id_denuncia',
    'idForeign' => NULL,
  ),
  'dfa_denuncias_ibfk_1' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_created',
    'idForeign' => 'id_user',
  ),
  'dfa_denuncias_ibfk_2' => 
  array (
    'table' => 'ci_users',
    'idLocal' => 'id_user_modified',
    'idForeign' => 'id_user',
  ),
  'dfa_denuncias_ibfk_3' => 
  array (
    'table' => 'dfa_oficinas',
    'idLocal' => 'id_oficina',
    'idForeign' => 'id_oficina',
  ),
  'dfa_denuncias_ibfk_4' => 
  array (
    'table' => 'dfa_personas',
    'idLocal' => 'id_victima',
    'idForeign' => 'id_persona',
  ),
  'dfa_denuncias_ibfk_5' => 
  array (
    'table' => 'dfa_tipos_relaciones',
    'idLocal' => 'id_tipo_relacion',
    'idForeign' => 'id_tipo_relacion',
  ),
  'dfa_denuncias_ibfk_6' => 
  array (
    'table' => 'dfa_rangos_edades',
    'idLocal' => 'id_rango_edad',
    'idForeign' => 'id_rango_edad',
  ),
);
    static $tableSettings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);

    public function up()
    {
        $this->dbforge->add_field(self::$tableFields);
        $this->dbforge->add_key(self::$tableId, TRUE);
        $this->dbforge->add_key(self::$tableForeignKeys);
        $this->create_or_alter_table(self::$tableName);
        $settings = self::$tableSettings;
        $this->set_settings($settings, self::$tableName);
    }

    public function down()
    {
        //$this->dbforge->drop_table('dfa_denuncias');
    }
}