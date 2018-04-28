<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 28/04/2018
 * Time: 1:05 am
 * @var Model_modulos $model_modulos
 * @var Model_modulos $modulos
 * @var Model_modulos $modulo
 */
?>

<section>
    <h3>Lista de Modulos</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("base/modulos/edit", "Agregar Modulos", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id_modulo</th>
                <th>Modulo</th>
                <th>Titulo</th>
                <th>Url</th>
                <th>Descripcion</th>
                <th>Icon</th>
                <th>Fecha de creación</th>
            
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oModulos)) { ?>
            <?php foreach ($oModulos as $oModulo) { ?>
                <tr>
                    <td><?= $oModulo->id_modulo; ?></td>               
                <td><?= $oModulo->name_modulo; ?></td>               
                <td><?= $oModulo->titulo; ?></td>               
                <td><?= $oModulo->url; ?></td>               
                <td><?= $oModulo->descripcion; ?></td>               
                <td><?= $oModulo->icon; ?></td>               
                <td><?= $oModulo->date_created; ?></td>
            
                    <td><?= btn_edit("base/modulos/edit/" . $oModulo->id_table)?></td>
                    <td><?= btn_delete("base/modulos/delete/" . $oModulo->id_table)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar modulos registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>