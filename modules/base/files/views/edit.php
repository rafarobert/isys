<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 02/03/2018
 * Time: 5:31 pm
 * @var Model_Files $model_files
 * @var Model_Files $files
 * @var Model_Files $fil
 */
?>

<h3><?= empty($oFil->id_fil) ? "Agregar Files" : "Actualizando datos, Fil #" . $oFil->id_fil ?></h3>

<?= form_open_multipart() ?>

<div class="form-group row">
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
        echo form_input($data,set_value("nombre", $oFil->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldPath" class="col-sm-4 col-form-label col-form-label-md">Path</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'path',
  'id' => 'fieldPath',
  'class' => 'form-control textTinymce ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("path", $oFil->path),"")
        ?>
    </div>
</div>
<?php echo form_error("path"); ?><div class="form-group row">
    <label for="fieldType" class="col-sm-4 col-form-label col-form-label-md">Type</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'type',
  'id' => 'fieldType',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("type", $oFil->type),"")
        ?>
    </div>
</div>
<?php echo form_error("type"); ?><div class="form-group row">
    <label for="fieldSize" class="col-sm-4 col-form-label col-form-label-md">Size</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'size',
  'id' => 'fieldSize',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("size", $oFil->size),"")
        ?>
    </div>
</div>
<?php echo form_error("size"); ?><div class="form-group row">
    <label for="fieldWidth" class="col-sm-4 col-form-label col-form-label-md">Width</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'width',
  'id' => 'fieldWidth',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("width", $oFil->width),"")
        ?>
    </div>
</div>
<?php echo form_error("width"); ?><div class="form-group row">
    <label for="fieldHeight" class="col-sm-4 col-form-label col-form-label-md">Height</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'height',
  'id' => 'fieldHeight',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("height", $oFil->height),"")
        ?>
    </div>
</div>
<?php echo form_error("height"); ?><div class="form-group row">
    <label for="fieldId_file_parent" class="col-sm-4 col-form-label col-form-label-md">Id file parent</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_file_parent',
  'id' => 'fieldId_file_parent',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("id_file_parent", $oFil->id_file_parent),"")
        ?>
    </div>
</div>
<?php echo form_error("id_file_parent"); ?><div class="form-group row">
    <label for="fieldNum_thumbs" class="col-sm-4 col-form-label col-form-label-md">Num thumbs</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'num_thumbs',
  'id' => 'fieldNum_thumbs',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("num_thumbs", $oFil->num_thumbs),"")
        ?>
    </div>
</div>
<?php echo form_error("num_thumbs"); ?><div class="form-group row">
    <label for="fieldThumbnail_tag" class="col-sm-4 col-form-label col-form-label-md">Thumbnail tag</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'thumbnail_tag',
  'id' => 'fieldThumbnail_tag',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("thumbnail_tag", $oFil->thumbnail_tag),"")
        ?>
    </div>
</div>
<?php echo form_error("thumbnail_tag"); ?>

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

<?= form_close() ?>