<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 08/04/2018
 * Time: 4:29 pm
 * @var Model_tables_options $model_tables_options
 * @var Model_tables_options $tables_options
 * @var Model_tables_options $tabl_option
 */
?>

<section>
    <h3>Lista de Tables_options</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("base/tables_options/edit", "Agregar Tables_options", null, $icon)?>
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
        <?php if (count($oTables_options)) { ?>
            <?php foreach ($oTables_options as $oTabl_option) { ?>
                <tr>
                    <td><?= $oTabl_option->tabla; ?></td>               
                <td><?= $oTabl_option->tipo; ?></td>               
                <td><?= $oTabl_option->nombre; ?></td>               
                <td><?= $oTabl_option->descripcion; ?></td>               
                <td><?= $oTabl_option->date_created; ?></td>
            
                    <td><?= btn_edit("base/tables_options/edit/" . $oTabl_option->id_opcion)?></td>
                    <td><?= btn_delete("base/tables_options/delete/" . $oTabl_option->id_opcion)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar tables_options registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>