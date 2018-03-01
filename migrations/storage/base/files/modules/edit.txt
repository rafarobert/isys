<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         * @var Model_Files $model_files
         * @var Model_Files $files
         * @var Model_Files $fil
         */
        ?>
        
        <h3><?= empty($oFil->id_file) ? "Agregar Files" : "Actualizando datos, Fil #" . $oFil->id_file ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->
        
        
                            <div class="form-group row">
                                <label for="fieldPath" class="col-sm-4 col-form-label col-form-label-md">Path  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "path",
                                     "id" => "fieldPath",
                                     "class" => "form-control textTinymce ",
                                     "value" => set_value("path", $oFil->path),
                                     "type" => "text"
                                 );
                                 echo form_textarea($data,"",""); ?> 
                                 </div>
                    </div><?php echo form_error("path"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldType" class="col-sm-4 col-form-label col-form-label-md">Type  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "type",
                                     "id" => "fieldType",
                                     "class" => "form-control ",
                                     "value" => set_value("type", $oFil->type),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("type"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSize" class="col-sm-4 col-form-label col-form-label-md">Size  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "size",
                                     "id" => "fieldSize",
                                     "class" => "form-control ",
                                     "value" => set_value("size", $oFil->size),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("size"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldWidth" class="col-sm-4 col-form-label col-form-label-md">Width  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "width",
                                     "id" => "fieldWidth",
                                     "class" => "form-control ",
                                     "value" => set_value("width", $oFil->width),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("width"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldHeight" class="col-sm-4 col-form-label col-form-label-md">Height  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "height",
                                     "id" => "fieldHeight",
                                     "class" => "form-control ",
                                     "value" => set_value("height", $oFil->height),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("height"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdFileParent" class="col-sm-4 col-form-label col-form-label-md">Archivo padre </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_file_parent",
                                     "id" => "fieldIdFileParent",
                                     "class" => "form-control ",
                                     "value" => set_value("id_file_parent", $oFil->id_file_parent),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_file_parent"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldNumThumbs" class="col-sm-4 col-form-label col-form-label-md">Numero de thumbs </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "num_thumbs",
                                     "id" => "fieldNumThumbs",
                                     "class" => "form-control ",
                                     "value" => set_value("num_thumbs", $oFil->num_thumbs),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("num_thumbs"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldThumbnailTag" class="col-sm-4 col-form-label col-form-label-md">Etiqueta del thumb </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "thumbnail_tag",
                                     "id" => "fieldThumbnailTag",
                                     "class" => "form-control ",
                                     "value" => set_value("thumbnail_tag", $oFil->thumbnail_tag),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("thumbnail_tag"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldEstado" class="col-sm-4 col-form-label col-form-label-md">Estado  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "estado",
                                     "id" => "fieldEstado",
                                     "class" => "form-control ",
                                     "value" => set_value("estado", $oFil->estado),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("estado"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldChangeCount" class="col-sm-4 col-form-label col-form-label-md">Change Count  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "change_count",
                                     "id" => "fieldChangeCount",
                                     "class" => "form-control ",
                                     "value" => set_value("change_count", $oFil->change_count),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("change_count"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdUserModified" class="col-sm-4 col-form-label col-form-label-md">Id User Modified  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_user_modified",
                                     "id" => "fieldIdUserModified",
                                     "class" => "form-control ",
                                     "value" => set_value("id_user_modified", $oFil->id_user_modified),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_user_modified"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdUserCreated" class="col-sm-4 col-form-label col-form-label-md">Id User Created  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_user_created",
                                     "id" => "fieldIdUserCreated",
                                     "class" => "form-control ",
                                     "value" => set_value("id_user_created", $oFil->id_user_created),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_user_created"); ?>
                    
        
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