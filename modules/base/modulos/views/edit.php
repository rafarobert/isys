<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
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
                    
                            <div class="form-group row">
                                <label for="fieldListed" class="col-sm-4 col-form-label col-form-label-md">Listed  </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_radio("listed", "ENABLED", $oModulo->listed == "ENABLED" ? true : false, "") . " ENABLED</label><br>";
                                echo "<label>" . form_radio("listed", "DISABLED", $oModulo->listed == "DISABLED" ? true : false, "") . " DISABLED</label><br>";
                                
                                ?>
                                </div>
                    </div>
                                <?php echo form_error("listed"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldChangeCount" class="col-sm-4 col-form-label col-form-label-md">Change Count  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "change_count",
                                     "id" => "fieldChangeCount",
                                     "class" => "form-control ",
                                     "value" => set_value("change_count", $oModulo->change_count),
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
                                     "value" => set_value("id_user_modified", $oModulo->id_user_modified),
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
                                     "value" => set_value("id_user_created", $oModulo->id_user_created),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_user_created"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldStatus" class="col-sm-4 col-form-label col-form-label-md">Status  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "status",
                                     "id" => "fieldStatus",
                                     "class" => "form-control ",
                                     "value" => set_value("status", $oModulo->status),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("status"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdFile" class="col-sm-4 col-form-label col-form-label-md">Id File  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_file",
                                     "id" => "fieldIdFile",
                                     "class" => "form-control ",
                                     "value" => set_value("id_file", $oModulo->id_file),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_file"); ?>
                    
        
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