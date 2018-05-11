<?php
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @var Model_UcTableP $model_lcTableP
 * @var Model_UcTableP $lcTableP
 * @var Model_UcTableP $lcTableS
 */
?>

<h3><?= empty($oUcTableS->id_lcTableS) ? "Agregar UcTableP" : "Actualizando datos, UcTableS #" . $oUcTableS->id_lcTableS ?></h3>

<?= form_open_multipart("lcModS/lcTableP/edit/".$oUcTableS->id_lcTableS,["id" => "lcTablePEdit"]) ?>

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
<?php echo form_close();
if(validateArray($errors,'error')){?>
    <div class="row">
        <div class="col-md-12">
            <?=$errors['error']?>
        </div>
    </div>
<?php } ?>

