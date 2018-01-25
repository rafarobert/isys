<?php // *** estic - index_file - start ***
        /**
         * Created by estic.
         * User: Rafael Gutierrez Gaspar
         * Date: 16/01/2018
         * Time: 2:45 am
         * @var Model_users $model_users
         * @var Model_users $users
         * @var Model_users $user
         */
        ?>
        
        <section>
            <h3>Lista de Users</h3>

            <?php
            $data_icon = array(
                "class" => "fa fa-plus",
                "aria-hidden" => "true",
                "tag" => "i",
                "title" => ""
            );
            $icon = icon($data_icon);
            echo anchor("estic/users/edit", "Agregar Users", null, $icon)?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 1 *** -->

            <th>Name</th>
                <th>Email</th>
                <th>Lastname</th>
                

            <!-- *** estic - tables - fin - 1 *** -->
            <th>Fecha de Creacion</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($oUsers)) { ?>
                    <?php foreach ($oUsers as $oUser) { ?>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 2 *** -->
            
            <td><?= $oUser->name; ?></td>
                <td><?= $oUser->email; ?></td>
                <td><?= $oUser->lastname; ?></td>
                

            <!-- *** estic - tables - fin - 2 *** -->
            <td><?= $oUser->date_created; ?></td>
            <td><?= btn_edit("estic/users/edit/" . $oUser->id_user)?></td>
                        <td><?= btn_delete("estic/users/delete/" . $oUser->id_user)?></td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">No se pudo encontrar users registrados</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>

        <!-- *** estic - index_file - end *** -->