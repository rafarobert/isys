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
    <h3>Lista de ucTableP</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("admin/lcTableP/edit", "Agregar ucTableP", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            //tableHeadersHtmlTitles
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oucTableP)) { ?>
            <?php foreach ($oucTableP as $oucTableS) { ?>
                <tr>
                    //tableHeadersStdFormat
                    <td><?= btn_edit("admin/lcTableP/edit/" . $oucTableS->id_lcTableS)?></td>
                    <td><?= btn_delete("admin/lcTableP/delete/" . $oucTableS->id_lcTableS)?></td>
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