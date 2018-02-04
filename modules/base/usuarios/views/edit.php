<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 04/02/2018
         * Time: 4:30 am
         * @var Model_Usuarios $model_usuarios
         * @var Model_Usuarios $usuarios
         * @var Model_Usuarios $usuario
         */
        ?>
        
        <h3><?= empty($oUsuario->id_usuario) ? "Agregar Usuarios" : "Actualizando datos, Usuario #" . $oUsuario->id_usuario ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->
        
        
                            <div class="form-group row">
                                <label for="fieldName" class="col-sm-4 col-form-label col-form-label-md">Name  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "name",
                                     "id" => "fieldName",
                                     "class" => "form-control ",
                                     "value" => set_value("name", $oUsuario->name),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("name"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldEmail" class="col-sm-4 col-form-label col-form-label-md">Email  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "email",
                                     "id" => "fieldEmail",
                                     "class" => "form-control ",
                                     "value" => set_value("email", $oUsuario->email),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("email"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldLastname" class="col-sm-4 col-form-label col-form-label-md">Lastname  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "lastname",
                                     "id" => "fieldLastname",
                                     "class" => "form-control ",
                                     "value" => set_value("lastname", $oUsuario->lastname),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("lastname"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldMobileNumber1" class="col-sm-4 col-form-label col-form-label-md">Mobile Number 1  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "mobile_number_1",
                                     "id" => "fieldMobileNumber1",
                                     "class" => "form-control ",
                                     "value" => set_value("mobile_number_1", $oUsuario->mobile_number_1),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("mobile_number_1"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldMobileNumber2" class="col-sm-4 col-form-label col-form-label-md">Mobile Number 2  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "mobile_number_2",
                                     "id" => "fieldMobileNumber2",
                                     "class" => "form-control ",
                                     "value" => set_value("mobile_number_2", $oUsuario->mobile_number_2),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("mobile_number_2"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldCi" class="col-sm-4 col-form-label col-form-label-md">Ci  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "ci",
                                     "id" => "fieldCi",
                                     "class" => "form-control ",
                                     "value" => set_value("ci", $oUsuario->ci),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("ci"); ?>
                    
                    
                            <div class="form-group row">
                                <label for="fieldImg" class="col-sm-4 col-form-label col-form-label-md">Img  </label>
                                <div class="col-sm-6">
                                <div class="two-columns">
                                <?php if(isset($oUsuario->imgThumb)){?>
                                    <img class="img-thumb-1" src="<?=site_url("img/usuarios/thumbs/".$oUsuario->imgThumb)?>"/>
                                <?php }?>
                                <?php
                                $data = array(
                                     "name" => "img",
                                     "id" => "fieldImg",
                                     "class" => "form-control ",
                                     "value" => set_value("img", $oUsuario->img),
                                     "type" => "text"
                                 );
                                 echo form_upload($data,"","") ?>
                                 </div>
                                 </div>
                    </div><?php echo form_error("img"); ?>
                    
                    
                            <?php if(!isset($oUsuario->id_usuario)){ ?>
                            <div class="form-group row">
                                <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Password  </label>
                               
                               <div class="col-sm-6"><?php
                            $data = array(
                                     "name" => "password",
                                     "id" => "fieldPassword",
                                     "class" => "form-control ",
                                     "value" => set_value("password", $oUsuario->password),
                                 );
                                 echo form_password($data, "", ""); ?>
                                 </div>
                                 </div>
                                 
                                 <div class="form-group row">
                                <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Confirmar Password  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                    "placeholder" => "Confirmar contraseña",
                                     "name" => "password_confirm",
                                     "id" => "fieldConfirmPassword",
                                     "class" => "form-control "
                                 );
                                 echo form_password($data, "", "") ?>
                                </div>
                    </div><?php echo form_error("password"); ?>
                    
                    
                            <?php } ?>
        
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