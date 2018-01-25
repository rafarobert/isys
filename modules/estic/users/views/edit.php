<?php // *** estic - edit_file - start ***
        /**
         * Created by estic.
         * User: Rafael Gutierrez Gaspar
         * Date: 16/01/2018
         * Time: 2:45 am
         * @var Model_Users $model_users
         * @var Model_Users $users
         * @var Model_Users $user
         */
        ?>
        
        <h3><?= empty($oUser->id_user) ? "Agregar Users" : "Actualizando datos, User #" . $oUser->id_user ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->
        
        
                            <div class="form-group row">
                                <label for="fieldName" class="col-sm-4 col-form-label col-form-label-md">Name  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array("placeholder" => "Nombre del Usuario",
                                     "name" => "name",
                                     "id" => "fieldName",
                                     "class" => "form-control ",
                                     "value" => set_value("name", $oUser->name),
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
                                $data = array("placeholder" => "Introduce tu email",
                                     "name" => "email",
                                     "id" => "fieldEmail",
                                     "class" => "form-control ",
                                     "value" => set_value("email", $oUser->email),
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
                                $data = array("placeholder" => "Apellido del usuario",
                                     "name" => "lastname",
                                     "id" => "fieldLastname",
                                     "class" => "form-control ",
                                     "value" => set_value("lastname", $oUser->lastname),
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
                                $data = array("placeholder" => "Introduce un numero de celular",
                                     "name" => "mobile_number_1",
                                     "id" => "fieldMobileNumber1",
                                     "class" => "form-control ",
                                     "value" => set_value("mobile_number_1", $oUser->mobile_number_1),
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
                                $data = array("placeholder" => "Introduce un numero de celular",
                                     "name" => "mobile_number_2",
                                     "id" => "fieldMobileNumber2",
                                     "class" => "form-control ",
                                     "value" => set_value("mobile_number_2", $oUser->mobile_number_2),
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
                                $data = array("placeholder" => "Introduce un Carnet de identidad",
                                     "name" => "ci",
                                     "id" => "fieldCi",
                                     "class" => "form-control ",
                                     "value" => set_value("ci", $oUser->ci),
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
                                <?php if(isset($oUser->imgThumb)){?>
                                    <img class="img-thumb-1" src="<?=site_url("img/users/thumbs/".$oUser->imgThumb)?>"/>
                                <?php }?>
                                <?php
                                $data = array(
                                     "name" => "img",
                                     "id" => "fieldImg",
                                     "class" => "form-control ",
                                     "value" => set_value("img", $oUser->img),
                                     "type" => "text"
                                 );
                                 echo form_upload($data,"","") ?>
                                 </div>
                                 </div>
                    </div><?php echo form_error("img"); ?>
                    
                    
                            <?php if(!isset($oUser->id_user)){ ?>
                            <div class="form-group row">
                                <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Password  </label>
                               
                               <div class="col-sm-6"><?php
                            $data = array("placeholder" => "Introduce una contraseña",
                                     "name" => "password",
                                     "id" => "fieldPassword",
                                     "class" => "form-control ",
                                     "value" => set_value("password", $oUser->password),
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