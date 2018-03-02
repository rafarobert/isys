<?php
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @var Model_ucTableP $model_lcTableP
 * @var Model_ucTableP $lcTableP
 * @var Model_ucTableP $lcTableS
 */
?>

<h3><?= empty($oucTableS->id_lcTableS) ? "Agregar ucTableP" : "Actualizando datos, ucTableS #" . $oucTableS->id_lcTableS ?></h3>

<?= form_open_multipart() ?>

#htmlFieldsEditForm

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