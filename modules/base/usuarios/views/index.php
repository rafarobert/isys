<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 24/04/2018
 * Time: 1:01 am
 * @var Model_usuarios $model_usuarios
 * @var Model_usuarios $usuarios
 * @var Model_usuarios $usuario
 */
?>

<section>
    <h3>Lista de Usuarios</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("base/usuarios/edit", "Agregar Usuarios", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Celular 1</th>
                <th>Username</th>
                <th>Email</th>
                <th>Fecha de creación</th>
            
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oUsuarios)) { ?>
            <?php foreach ($oUsuarios as $oUsuario) { ?>
                <tr>
                    <td><?= $oUsuario->nombre; ?></td>               
                <td><?= $oUsuario->apellido; ?></td>               
                <td><?= $oUsuario->sexo; ?></td>               
                <td><?= $oUsuario->cellphone_number_1; ?></td>               
                <td><?= $oUsuario->username; ?></td>               
                <td><?= $oUsuario->email; ?></td>               
                <td><?= $oUsuario->date_created; ?></td>
            
                    <td><?= btn_edit("base/usuarios/edit/" . $oUsuario->id_usuario)?></td>
                    <td><?= btn_delete("base/usuarios/delete/" . $oUsuario->id_usuario)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar usuarios registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>