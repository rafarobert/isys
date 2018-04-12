<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 12/04/2018
 * Time: 2:31 am
 * @var Model_Modulos $model_modulos
 * @var Model_Modulos $modulos
 * @var Model_Modulos $modulo
 */
?>

<h3><?= empty($oModulo->id_modulo) ? "Agregar Modulos" : "Actualizando datos, Modulo #" . $oModulo->id_modulo ?></h3>

<?= form_open_multipart() ?>

<div class="form-group row">
    <label for="fieldId_modulo" class="col-sm-4 col-form-label col-form-label-md">Id modulo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_modulo',
  'id' => 'fieldId_modulo',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_number($data,set_value("id_modulo", $oModulo->id_modulo),"")
        ?>
    </div>
</div>
<?php echo form_error("id_modulo"); ?><div class="form-group row">
    <label for="fieldName_modulo" class="col-sm-4 col-form-label col-form-label-md">Name modulo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'name_modulo',
  'id' => 'fieldName_modulo',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("name_modulo", $oModulo->name_modulo),"")
        ?>
    </div>
</div>
<?php echo form_error("name_modulo"); ?><div class="form-group row">
    <label for="fieldTitulo" class="col-sm-4 col-form-label col-form-label-md">Titulo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'titulo',
  'id' => 'fieldTitulo',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("titulo", $oModulo->titulo),"")
        ?>
    </div>
</div>
<?php echo form_error("titulo"); ?><div class="form-group row">
    <label for="fieldUrl" class="col-sm-4 col-form-label col-form-label-md">Url</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'url',
  'id' => 'fieldUrl',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("url", $oModulo->url),"")
        ?>
    </div>
</div>
<?php echo form_error("url"); ?><div class="form-group row">
    <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'descripcion',
  'id' => 'fieldDescripcion',
  'class' => 'form-control textTinymce ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_textarea($data,set_value("descripcion", $oModulo->descripcion),"")
        ?>
    </div>
</div>
<?php echo form_error("descripcion"); ?><div class="form-group row">
    <label for="fieldIcon" class="col-sm-4 col-form-label col-form-label-md">Icon</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'icon',
  'id' => 'fieldIcon',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("icon", $oModulo->icon),"")
        ?>
    </div>
</div>
<?php echo form_error("icon"); ?>
<div class="form-group row">
    <label for="fieldListed" class="col-sm-4 col-form-label col-form-label-md">Listed</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'listed',
  'id' => 'fieldListed',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'ENABLED',
    1 => 'DISABLED',
  ),
);
        echo form_radios($data,$data['options'],$oModulo->listed);
        ?>
    </div>
</div>
<?php echo form_error("listed"); ?>

<div class="form-group row">
    <label for="fieldStatus" class="col-sm-4 col-form-label col-form-label-md">Status</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'status',
  'id' => 'fieldStatus',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("status", $oModulo->status),"")
        ?>
    </div>
</div>
<?php echo form_error("status"); ?>

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

