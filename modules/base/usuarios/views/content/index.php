<?php // *** estic - index_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 31/01/2018
         * Time: 2:58 am
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
                <?php if (count($oUsuarios)) { ?>
                    <?php foreach ($oUsuarios as $oUsuario) { ?>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 2 *** -->
            
            <td><?= $oUsuario->name; ?></td>
                <td><?= $oUsuario->email; ?></td>
                <td><?= $oUsuario->lastname; ?></td>
                

            <!-- *** estic - tables - fin - 2 *** -->
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

        <!-- *** estic - index_file - end *** -->