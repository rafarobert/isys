<?php // *** estic - index_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 02/03/2018
         * Time: 3:42 am
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
                    
                    <!-- *** estic - tables - inicio - 1 *** -->

            <th>Titulo</th>
                <th>Url</th>
                <th>Descripcion</th>
                

            <!-- *** estic - tables - fin - 1 *** -->
            <th>Fecha de Creacion</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($oModulos)) { ?>
                    <?php foreach ($oModulos as $oModulo) { ?>
                    <tr>
                    
                    <!-- *** estic - tables - inicio - 2 *** -->
            
            <td><?= $oModulo->titulo; ?></td>
                <td><?= $oModulo->url; ?></td>
                <td><?= $oModulo->descripcion; ?></td>
                

            <!-- *** estic - tables - fin - 2 *** -->
            <td><?= $oModulo->date_created; ?></td>
            <td><?= btn_edit("base/modulos/edit/" . $oModulo->id_modulo)?></td>
                        <td><?= btn_delete("base/modulos/delete/" . $oModulo->id_modulo)?></td>
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

        <!-- *** estic - index_file - end *** -->
            
            