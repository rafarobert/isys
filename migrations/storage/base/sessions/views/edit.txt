<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 07/02/2018
         * Time: 2:42 am
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
                                <label for="fieldCiUsuariosIdUsuario" class="col-sm-4 col-form-label col-form-label-md">Ci Usuarios Id Usuario  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "ci_usuarios_id_usuario",
                                     "id" => "fieldCiUsuariosIdUsuario",
                                     "class" => "form-control ",
                                     "value" => set_value("ci_usuarios_id_usuario", $oSession->ci_usuarios_id_usuario),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("ci_usuarios_id_usuario"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldHbfUsuariosIdUsuario" class="col-sm-4 col-form-label col-form-label-md">Hbf Usuarios Id Usuario  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "hbf_usuarios_id_usuario",
                                     "id" => "fieldHbfUsuariosIdUsuario",
                                     "class" => "form-control ",
                                     "value" => set_value("hbf_usuarios_id_usuario", $oSession->hbf_usuarios_id_usuario),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("hbf_usuarios_id_usuario"); ?>
                    
                    
        
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