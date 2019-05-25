<?php
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @var Model_lcTableP $model_lcTableP
 * @var Model_lcTableP $lcTableP
 * @var Model_lcTableP $lcObjTableS
 * @var Model_UcTableP $oUcObjTableP
 * @var ES_Model_UcTableP $oUcObjTableS
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Lista de tableTitle</h2>
        <ol class="breadcrumb">
            <li>
                <?= anchor(WEBSERVER . 'lcModS', 'Inicio') ?>
            </li>
            <li class="active">
                <strong>Lista de tableTitle</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">tableTitle</label>
                    <input type="text" id="product_name" name="product_name" value=""
                           placeholder="Product Name" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5></h5>
                    <?= anchor(WEBSERVER . "lcModS/lcTableP/edit", "<i class='fa fa-plus'></i> Agregar tableTitle", "class='btn btn-primary btn-xs m-l-sm'"); ?>
                    <?php
                    //>>>anchorToEditView<<<
                    echo anchor(WEBSERVER . "lcModS/lcTableP/edit/editNameView", "<i class='fa fa-plus'></i> Agregar indexEditViewTitle", "class='btn btn-primary btn-xs m-l-sm'");
                    //<<<anchorToEditView>>>
                    ?>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                //tableHeaderHtmlTitles
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (countStd($oUcObjTableP)) { ?>
                                <?php foreach ($oUcObjTableP as $oUcObjTableS) {?>
                                    <tr>
                                        //tableBodyHtmlFields
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <?= btn_edit("lcModS/lcTableP/edit/".$oUcObjTableS->getUcIdObjTable(), "class='btn-white btn btn-xs'") ?>
                                                <?= btn_delete("lcModS/lcTableP/delete/" . $oUcObjTableS->getUcIdObjTable(), "class='btn-white btn btn-xs'") ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="3">No se pudo encontrar lcTableP registrados</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                //tableHeaderHtmlTitles
                                <th class="text-right" data-sort-ignore="true">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Estic Framework &copy; 2018-2019
    </div>
</div>