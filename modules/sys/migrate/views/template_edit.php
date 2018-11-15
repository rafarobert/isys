<?php
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @var Model_UcTableP $model_lcTableP
 * @var Model_UcTableP $oUcObjTableP
 * @var Model_UcTableP $oUcObjTableS
 *
 * @var Model_Files $file
 */
?>

<div class="row wrapper border-bottom white-bg page-heading">

    <div class="col-lg-10">
        <h2><?= empty($oUcObjTableS->getUcIdObjTable()) ? "Agregar " . setLabel('tableTitle') : "Actualizando datos, " . setLabel('UcTableS #') . $oUcObjTableS->getUcIdObjTable() ?></h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor('lcModS', 'Inicio') ?>
            </li>
            <li>
                <?= anchor('lcModS/lcTableP', setLabel('lcTableP')) ?>
            </li>
            <li class="active">
                <strong>Edicion de datos</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5>All form elements
                        <small>With custom checbox and radion elements.</small>
                    </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content">
                    <?php
                    //>>>startInsertEachOne<<<
                    foreach ($oUcEachTableP as $idEachTable => $oUcEachTableS) {
                        //<<<startInsertEachOne>>>
                        ?>

                        <?= form_open_multipart("lcModS/lcTableP/edit/$editView" . $oUcObjTableS->getUcIdObjTable(), ["id" => "lcTablePEdit", "class" => "form-horizontal"]) ?>

                        #htmlFieldsEditForm

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">
                                <?php
                                echo anchor('lcModS/lcTableP', 'Cancelar', 'class="btn btn-white"');
                                $data = array(
                                    "name" => "save",
                                    "value" => "Guardar",
                                    "id" => "btnSave",
                                    "class" => "btn btn-primary",
                                    "onclick" => "oPageBack.onSubmit()"
                                );
                                echo form_submit($data) ?>
                            </div>
                        </div>
                        <?php echo form_close();
                        if (validateArray($errors, 'error')) {
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $errors['error'] ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        //>>>endInsertEachOne<<<
                    }
                    //<<<endInsertEachOne>>>
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
