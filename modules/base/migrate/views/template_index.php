<?php
/**
 * Created by herbalife.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @var Model_lcTableP $model_lcTableP
 * @var Model_lcTableP $lcTableP
 * @var Model_lcTableP $lcTableS
 */
?>

<section>
    <h3>Lista de UcTableP</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("lcModS/lcTableP/edit", "Agregar UcTableP", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            //tableHeaderHtmlTitles
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oUcTableP)) { ?>
            <?php foreach ($oUcTableP as $oUcTableS) { ?>
                <tr>
                    //tableBodyHtmlFields
                    <td><?= btn_edit("lcModS/lcTableP/edit/" . $oUcTableS->idTable)?></td>
                    <td><?= btn_delete("lcModS/lcTableP/delete/" . $oUcTableS->idTable)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar lcTableP registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>