<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 27/04/2018
 * Time: 8:12 pm
 * @var Model_sessions $model_sessions
 * @var Model_sessions $sessions
 * @var Model_sessions $session
 */
?>

<section>
    <h3>Lista de Sessions</h3>

    <?php
    $data_icon = array(
        "class" => "fa fa-plus",
        "aria-hidden" => "true",
        "tag" => "i",
        "title" => ""
    );
    $icon = icon($data_icon);
    echo anchor("base/sessions/edit", "Agregar Sessions", null, $icon)?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Ip_address</th>
                <th>Timestamp</th>
                <th>Data</th>
                <th>Last_activity</th>
                <th>Nombre del Usuario</th>
                <th>Sesion de</th>
                
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php if (count($oSessions)) { ?>
            <?php foreach ($oSessions as $oSession) { ?>
                <tr>
                    <td><?= $oSession->ip_address; ?></td>               
                <td><?= $oSession->timestamp; ?></td>               
                <td><?= $oSession->data; ?></td>               
                <td><?= $oSession->last_activity; ?></td>               
                <td><?= $oSession->id_user; ?></td>               
                <td><?= $oSession->id_hbf_sesion; ?></td>               
                
                    <td><?= btn_edit("base/sessions/edit/" . $oSession->id)?></td>
                    <td><?= btn_delete("base/sessions/delete/" . $oSession->id)?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="3">No se pudo encontrar sessions registrados</td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>