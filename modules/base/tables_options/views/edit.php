<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 08/04/2018
 * Time: 4:29 pm
 * @var Model_Tables_options $model_tables_options
 * @var Model_Tables_options $tables_options
 * @var Model_Tables_options $tabl_option
 */
?>

<h3><?= empty($oTabl_option->id_tabl_option) ? "Agregar Tables_options" : "Actualizando datos, Tabl_option #" . $oTabl_option->id_tabl_option ?></h3>

<?= form_open_multipart() ?>


<div class="form-group row">
    <label for="fieldTabla" class="col-sm-4 col-form-label col-form-label-md">Tabla</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'tabla',
  'id' => 'fieldTabla',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    'ci_modulos' => 'ci modulos',
    'ci_sessions' => 'ci sessions',
    'ci_tables_options' => 'ci tables options',
    'ci_usuarios' => 'ci usuarios',
    'hbf_clubs' => 'hbf clubs',
    'hbf_comandas' => 'hbf comandas',
    'hbf_porciones' => 'hbf porciones',
    'hbf_productos' => 'hbf productos',
    'hbf_roles' => 'hbf roles',
    'hbf_sesiones' => 'hbf sesiones',
    'hbf_turnos' => 'hbf turnos',
    'hbf_vasos' => 'hbf vasos',
    'migrations' => 'Migrations',
  ),
);
        echo form_select($data,$data['options'],$oTabl_option->tabla);
        ?>
    </div>
</div>
<?php echo form_error("tabla"); ?>

<div class="form-group row">
    <label for="fieldTipo" class="col-sm-4 col-form-label col-form-label-md">Tipo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'tipo',
  'id' => 'fieldTipo',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("tipo", $oTabl_option->tipo),"")
        ?>
    </div>
</div>
<?php echo form_error("tipo"); ?><div class="form-group row">
    <label for="fieldNombre" class="col-sm-4 col-form-label col-form-label-md">Nombre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'nombre',
  'id' => 'fieldNombre',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("nombre", $oTabl_option->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("descripcion", $oTabl_option->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?>

<div class="form-group row">
    <div class="col-sm-12 controls">
        <?php
        $data = array(
            "name" => "save",
            "value" => "Guardar",
            "id" => "btnSave",
            "class" => "btn btn-success"
        );
        echo form_submit($data) ?>
    </div>
</div>
<?php echo form_close();
if(validateArray($errors,'error')){?>
    <div class="row">
        <div class="col-md-12">
            <?=$errors['error']?>
        </div>
    </div>
<?php } ?>

