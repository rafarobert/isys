<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 04/02/2018
         * Time: 4:30 am
         * @var Model_Modulos $model_modulos
         * @var Model_Modulos $modulos
         * @var Model_Modulos $modulo
         */
        ?>
        
        <h3><?= empty($oModulo->id_modulo) ? "Agregar Modulos" : "Actualizando datos, Modulo #" . $oModulo->id_modulo ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->
        
        
                            <div class="form-group row">
                                <label for="fieldTitulo" class="col-sm-4 col-form-label col-form-label-md">Titulo  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "titulo",
                                     "id" => "fieldTitulo",
                                     "class" => "form-control ",
                                     "value" => set_value("titulo", $oModulo->titulo),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("titulo"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldUrl" class="col-sm-4 col-form-label col-form-label-md">Url  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "url",
                                     "id" => "fieldUrl",
                                     "class" => "form-control ",
                                     "value" => set_value("url", $oModulo->url),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("url"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldDescripcion" class="col-sm-4 col-form-label col-form-label-md">Descripcion  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "descripcion",
                                     "id" => "fieldDescripcion",
                                     "class" => "form-control textTinymce ",
                                     "value" => set_value("descripcion", $oModulo->descripcion),
                                     "type" => "text"
                                 );
                                 echo form_textarea($data,"",""); ?> 
                                 </div>
                    </div><?php echo form_error("descripcion"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldIcon" class="col-sm-4 col-form-label col-form-label-md">Icon  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "icon",
                                     "id" => "fieldIcon",
                                     "class" => "form-control ",
                                     "value" => set_value("icon", $oModulo->icon),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("icon"); ?>
                    
                    <?php echo form_error("opt_estado"); ?>
                    
                    <?php echo form_error("opt_listado"); ?>
                    
                    
        
            <!-- *** estic - tables - fin *** -->
        
        <div class="form-group row">
            <!-- Button -->
            <div class="col-sm-12 controls">
                <?php
                 $data = array(
                    "name" => "save",
                    "value" => "Guardar",
                    "id" => "btnSave",
                    "class" => "btn btn-success"
                 );
                 echo form_submit($data) ?>
            </div>
        </div>
        <?= form_close() ?>

        <!-- *** estic - edit_file - end *** -->