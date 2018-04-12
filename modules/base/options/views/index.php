<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 11/04/2018
 * Time: 12:42 am
 * @var Model_options $model_options
 * @var Model_options $options
 * @var Model_options $option
 */
?>

<section>
    <h3>Lista de Options</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("base/options/edit", "Agregar Options", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Tabla</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Fecha de creación</th>
            
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oOptions)) { ?>
            <?php foreach ($oOptions as $oOption) { ?>
                <tr>
                    <td><?= $oOption->tabla; ?></td>               
                <td><?= $oOption->tipo; ?></td>               
                <td><?= $oOption->nombre; ?></td>               
                <td><?= $oOption->descripcion; ?></td>               
                <td><?= $oOption->date_created; ?></td>
            
                    <td><?= btn_edit("base/options/edit/" . $oOption->id_option)?></td>
                    <td><?= btn_delete("base/options/delete/" . $oOption->id_option)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar options registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>