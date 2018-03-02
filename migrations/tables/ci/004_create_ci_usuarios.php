<?php
/**
 * Created by PhpStorm.
 * User: $rafaelgutierrez
 * Date: $02/03/2018
 * Time: $11:48 am
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ci_usuarios extends CI_Migration
{
    public function up()
    {
        $fields = array (
  'id_usuario' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'auto_increment' => true,
    'extra' => 'auto_increment',
    'validate' => 'required',
  ),
  'nombre' => 
  array (
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'apellido' => 
  array (
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'username' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'email' => 
  array (
    'type' => 'varchar',
    'constraint' => '100',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'validate' => 'email',
  ),
  'password' => 
  array (
    'type' => 'varchar',
    'constraint' => '128',
    'unsigned' => false,
    'null' => true,
    'default' => '',
    'extra' => '',
    'password' => '1',
    'validate' => 'required',
  ),
  'fec_nacimiento' => 
  array (
    'type' => 'date',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'sexo' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'select',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
  ),
  'sexoCopy' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'dropdown',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
  ),
  'sexoCopyCopy' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'multiselect',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
  ),
  'sexoCopyCopyCopy' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'checkbox',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
  ),
  'sexoCopyCopyCopyCopy' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'Masculino',
      1 => 'Femenino',
    ),
    'validate' => 'required',
  ),
  'invitado_por' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Invitado por',
    'input' => 'default',
    'validate' => 'required',
    'idForeign' => 'id_usuario',
    'table' => 'ci_usuarios',
  ),
  'phone_number_1' => 
  array (
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Telefono 1',
    'validate' => 'required',
  ),
  'phone_number_2' => 
  array (
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'labe' => 'Telefono 2',
    'validate' => 'required',
  ),
  'cellphone_number_1' => 
  array (
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 1',
    'validate' => 'required',
  ),
  'cellphone_number_2' => 
  array (
    'type' => 'varchar',
    'constraint' => '20',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Celular 2',
    'validate' => 'required',
  ),
  'cod_acceso' => 
  array (
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Codigo de acceso',
    'validate' => 'required',
  ),
  'id_tipo_asociado' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Tipo de asociado',
    'input' => 'dropdown',
    'fieldRef' => 'nombre',
    'validate' => 'required',
  ),
  'id_nivel_asociado' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Nivel de asociado',
    'input' => 'dropdown',
    'fieldRef' => 'nombre',
    'validate' => 'required',
  ),
  'id_turno' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Turno de',
    'input' => 'dropdown',
    'fieldRef' => 'id_asociado',
    'validate' => 'required',
    'idForeign' => 'id_turno',
    'table' => 'hbf_turnos',
  ),
  'id_role' => 
  array (
    'type' => 'int',
    'constraint' => '10',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
    'idForeign' => 'id_role',
    'table' => 'hbf_roles',
  ),
  'id_picture' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => true,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Foto de perfil',
    'input' => 'image',
    'fieldRef' => 'nombre',
    'validate' => 'required',
    'idForeign' => 'id_file',
    'table' => 'ci_files',
  ),
  'app_monitor' => 
  array (
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app monitoreo',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
  ),
  'app_orders' => 
  array (
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app ordenes',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
  ),
  'app_admin' => 
  array (
    'type' => 'varchar',
    'constraint' => '50',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'label' => 'Permitir app administrador',
    'input' => 'radio',
    'options' => 
    array (
      0 => 'SI',
      1 => 'NO',
    ),
    'validate' => 'required',
  ),
  'herbalife_key' => 
  array (
    'type' => 'varchar',
    'constraint' => '256',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
    'validate' => 'required',
  ),
  'estado' => 
  array (
    'type' => 'varchar',
    'constraint' => '15',
    'unsigned' => false,
    'null' => true,
    'default' => 'ENABLED',
    'extra' => '',
  ),
  'change_count' => 
  array (
    'type' => 'int',
    'constraint' => '11',
    'unsigned' => false,
    'null' => true,
    'default' => '0',
    'extra' => '',
  ),
  'date_created' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'constraint' => '',
    'unsigned' => false,
    'null' => true,
    'default' => NULL,
    'extra' => '',
  ),
);
        $fk_keys = array (
  'ci_usuarios_ibfk_1' => 
  array (
    'table' => 'ci_files',
    'idLocal' => 'id_picture',
    'idForeign' => 'id_file',
  ),
  'ci_usuarios_ibfk_2' => 
  array (
    'table' => 'hbf_roles',
    'idLocal' => 'id_role',
    'idForeign' => 'id_role',
  ),
  'ci_usuarios_ibfk_3' => 
  array (
    'table' => 'ci_usuarios',
    'idLocal' => 'invitado_por',
    'idForeign' => 'id_usuario',
  ),
  'ci_usuarios_ibfk_5' => 
  array (
    'table' => 'hbf_turnos',
    'idLocal' => 'id_turno',
    'idForeign' => 'id_turno',
  ),
);
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id_usuario', TRUE);
        $this->dbforge->add_key($fk_keys);
        $this->create_or_alter_table('ci_usuarios');
        $settings = array (
  'ctrl' => true,
  'model' => true,
  'views' => true,
);
        $this->set_settings($settings,'ci_usuarios');
    }

    public function down()
    {
        //$this->dbforge->drop_table('ci_usuarios');
    }
}