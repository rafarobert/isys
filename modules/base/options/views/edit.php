<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 11/04/2018
 * Time: 12:42 am
 * @var Model_Options $model_options
 * @var Model_Options $options
 * @var Model_Options $option
 */
?>

<h3><?= empty($oOption->id_option) ? "Agregar Options" : "Actualizando datos, Option #" . $oOption->id_option ?></h3>

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
    'ci_options' => 'ci options',
    'ci_sessions' => 'ci sessions',
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
        echo form_select($data,$data['options'],$oOption->tabla);
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
        echo form_default($data,set_value("tipo", $oOption->tipo),"")
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
        echo form_default($data,set_value("nombre", $oOption->nombre),"")
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
        echo form_default($data,set_value("descripcion", $oOption->descripcion),"")
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

