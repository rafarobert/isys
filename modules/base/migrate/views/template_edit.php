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

<h3><?= empty($oUcTableS->idTable) ? "Agregar UcTableP" : "Actualizando datos, UcTableS #" . $oUcTableS->idTable ?></h3>

<?php
    //>>>startInsertEachOne<<<
    foreach ($oUcEachTableP as $idEachTable => $oUcEachTableS){
    //<<<startInsertEachOne>>>
    ?>

<?= form_open_multipart("lcModS/lcTableP/edit/".$oUcTableS->idTable.$editIni,["id" => "lcTablePEdit"]) ?>

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
<?php
//>>>endInsertEachOne<<<
    }
//<<<endInsertEachOne>>>
?>

