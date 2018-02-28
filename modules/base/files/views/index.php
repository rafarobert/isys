<?php // *** estic - index_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 28/02/2018
         * Time: 6:45 pm
         * @var Model_files $model_files
         * @var Model_files $files
         * @var Model_files $fil
         */
        ?>
        
        <section>
            <h3>Lista de Files</h3>

            <?php
            $data_icon = array(
                "class" => "fa fa-plus",
                "aria-hidden" => "true",
                "tag" => "i",
                "title" => ""
            );
            $icon = icon($data_icon);
            echo anchor("base/files/edit", "Agregar Files", null, $icon)?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 1 *** -->

            <th>Path</th>
                <th>Type</th>
                <th>Size</th>
                

            <!-- *** estic - tables - fin - 1 *** -->
            <th>Fecha de Creacion</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($oFiles)) { ?>
                    <?php foreach ($oFiles as $oFil) { ?>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 2 *** -->
            
            <td><?= $oFil->path; ?></td>
                <td><?= $oFil->type; ?></td>
                <td><?= $oFil->size; ?></td>
                

            <!-- *** estic - tables - fin - 2 *** -->
            <td><?= $oFil->date_created; ?></td>
            <td><?= btn_edit("base/files/edit/" . $oFil->id_file)?></td>
                        <td><?= btn_delete("base/files/delete/" . $oFil->id_file)?></td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">No se pudo encontrar files registrados</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>

        <!-- *** estic - index_file - end *** -->
            
            