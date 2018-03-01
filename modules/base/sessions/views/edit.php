<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 01/03/2018
         * Time: 12:23 am
         * @var Model_Sessions $model_sessions
         * @var Model_Sessions $sessions
         * @var Model_Sessions $session
         */
        ?>
        
        <h3><?= empty($oSession->id) ? "Agregar Sessions" : "Actualizando datos, Session #" . $oSession->id ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->
        
        
                            <div class="form-group row">
                                <label for="fieldIpAddress" class="col-sm-4 col-form-label col-form-label-md">Ip Address  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "ip_address",
                                     "id" => "fieldIpAddress",
                                     "class" => "form-control ",
                                     "value" => set_value("ip_address", $oSession->ip_address),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("ip_address"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldTimestamp" class="col-sm-4 col-form-label col-form-label-md">Timestamp  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "timestamp",
                                     "id" => "fieldTimestamp",
                                     "class" => "form-control ",
                                     "value" => set_value("timestamp", $oSession->timestamp),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("timestamp"); ?>
                    <?php echo form_error("data"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldLastActivity" class="col-sm-4 col-form-label col-form-label-md">Last Activity  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "last_activity",
                                     "id" => "fieldLastActivity",
                                     "class" => "form-control datepicker ",
                                     "value" => set_value("last_activity", $oSession->last_activity),
                                     "type" => "text"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("last_activity"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdUser" class="col-sm-4 col-form-label col-form-label-md">Nombre del Usuario </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_user",
                                     "id" => "fieldIdUser",
                                     "class" => "form-control ",
                                     "value" => set_value("id_user", $oSession->id_user),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_user"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdHbfSesion" class="col-sm-4 col-form-label col-form-label-md">Sesion de </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_hbf_sesion",
                                     "id" => "fieldIdHbfSesion",
                                     "class" => "form-control ",
                                     "value" => set_value("id_hbf_sesion", $oSession->id_hbf_sesion),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_hbf_sesion"); ?>
                    
        
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