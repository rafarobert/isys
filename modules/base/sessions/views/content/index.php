<?php // *** estic - index_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
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
                    
                    <!-- *** estic - tables - inicio - 1 *** -->

            <th>Ip Address</th>
                <th>Timestamp</th>
                <th>Data</th>
                

            <!-- *** estic - tables - fin - 1 *** -->
            
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($oSessions)) { ?>
                    <?php foreach ($oSessions as $oSession) { ?>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 2 *** -->
            
            <td><?= $oSession->ip_address; ?></td>
                <td><?= $oSession->timestamp; ?></td>
                <td><?= $oSession->data; ?></td>
                

            <!-- *** estic - tables - fin - 2 *** -->
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

        <!-- *** estic - index_file - end *** -->