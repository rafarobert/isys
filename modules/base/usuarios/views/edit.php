<?php // *** estic - edit_file - start ***
        /**
         * Created by herbalife.
         * User: Rafael Gutierrez Gaspar
         * Date: 02/03/2018
         * Time: 11:51 am
         * @var Model_Usuarios $model_usuarios
         * @var Model_Usuarios $usuarios
         * @var Model_Usuarios $usuario
         */
        ?>
        
        <h3><?= empty($oUsuario->id_usuario) ? "Agregar Usuarios" : "Actualizando datos, Usuario #" . $oUsuario->id_usuario ?></h3>
        
        <?= form_open_multipart() ?>
        <!-- *** estic - tables - inicio *** -->    
        
                            <div class="form-group row">
                                <label for="fieldNombre" class="col-sm-4 col-form-label col-form-label-md">Nombre  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "nombre",
                                     "id" => "fieldNombre",
                                     "class" => "form-control ",
                                     "value" => set_value("nombre", $oUsuario->nombre),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("nombre"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldApellido" class="col-sm-4 col-form-label col-form-label-md">Apellido  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "apellido",
                                     "id" => "fieldApellido",
                                     "class" => "form-control ",
                                     "value" => set_value("apellido", $oUsuario->apellido),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("apellido"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldUsername" class="col-sm-4 col-form-label col-form-label-md">Username  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "username",
                                     "id" => "fieldUsername",
                                     "class" => "form-control ",
                                     "value" => set_value("username", $oUsuario->username),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("username"); ?>
                    
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
                            <div class="form-group row">
                                <label for="fieldFecNacimiento" class="col-sm-4 col-form-label col-form-label-md">Fec Nacimiento  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "fec_nacimiento",
                                     "id" => "fieldFecNacimiento",
                                     "class" => "form-control datepicker ",
                                     "value" => set_value("fec_nacimiento", $oUsuario->fec_nacimiento),
                                     "type" => "text"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div><?php echo form_error("fec_nacimiento"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSexo" class="col-sm-4 col-form-label col-form-label-md">Sexo  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                    "name" => "sexo[]",
                                    "id" => "fieldSexo",
                                    "class" => ""
                                );
                                $options = array (
  0 => 'Masculino',
  1 => 'Femenino',
);
                                echo form_select($data, $options, $oUsuario->sexo, "") ?>
                                </div>
                    </div><?php echo form_error("sexo"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSexoCopy" class="col-sm-4 col-form-label col-form-label-md">SexoCopy  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                    "name" => "sexoCopy",
                                    "id" => "fieldSexoCopy",
                                    "class" => ""
                                );
                                $options = array (
  0 => 'Masculino',
  1 => 'Femenino',
);
                                echo form_dropdown($data, $options, $oUsuario->sexoCopy,"") ?> 
                                </div>
                    </div><?php echo form_error("sexoCopy"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSexoCopyCopy" class="col-sm-4 col-form-label col-form-label-md">SexoCopyCopy  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                    "name" => "sexoCopyCopy[]",
                                    "id" => "fieldSexoCopyCopy",
                                    "class" => ""
                                );
                                $options = array (
  0 => 'Masculino',
  1 => 'Femenino',
);
                                $options_selected = json_decode($oUsuario->sexoCopyCopy);
                                echo form_multiselect($data, $options, $options_selected, "") ?>
                                </div>
                    </div><?php echo form_error("sexoCopyCopy"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSexoCopyCopyCopy" class="col-sm-4 col-form-label col-form-label-md">SexoCopyCopyCopy  </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_checkbox("sexoCopyCopyCopy", "Masculino", $oUsuario->sexoCopyCopyCopy == "Masculino" ? true : false, "") . " Masculino</label><br>
                                    ";
                                echo "<label>" . form_checkbox("sexoCopyCopyCopy", "Femenino", $oUsuario->sexoCopyCopyCopy == "Femenino" ? true : false, "") . " Femenino</label><br>
                                    ";
                                 ?>
                                </div>
                    </div>
                                <?php echo form_error("sexoCopyCopyCopy"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldSexoCopyCopyCopyCopy" class="col-sm-4 col-form-label col-form-label-md">SexoCopyCopyCopyCopy  </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_radio("sexoCopyCopyCopyCopy", "Masculino", $oUsuario->sexoCopyCopyCopyCopy == "Masculino" ? true : false, "") . " Masculino</label><br>";
                                    echo "<label>" . form_radio("sexoCopyCopyCopyCopy", "Femenino", $oUsuario->sexoCopyCopyCopyCopy == "Femenino" ? true : false, "") . " Femenino</label><br>";
                                    
                                ?>
                                </div>
                    </div>
                                <?php echo form_error("sexoCopyCopyCopyCopy"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldInvitadoPor" class="col-sm-4 col-form-label col-form-label-md">Invitado por </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "invitado_por",
                                     "id" => "fieldInvitadoPor",
                                     "class" => "form-control ",
                                     "value" => set_value("invitado_por", $oUsuario->invitado_por),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("invitado_por"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldPhoneNumber1" class="col-sm-4 col-form-label col-form-label-md">Telefono 1 </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "phone_number_1",
                                     "id" => "fieldPhoneNumber1",
                                     "class" => "form-control ",
                                     "value" => set_value("phone_number_1", $oUsuario->phone_number_1),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("phone_number_1"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldPhoneNumber2" class="col-sm-4 col-form-label col-form-label-md">Phone Number 2  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "phone_number_2",
                                     "id" => "fieldPhoneNumber2",
                                     "class" => "form-control ",
                                     "value" => set_value("phone_number_2", $oUsuario->phone_number_2),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("phone_number_2"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldCellphoneNumber1" class="col-sm-4 col-form-label col-form-label-md">Celular 1 </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "cellphone_number_1",
                                     "id" => "fieldCellphoneNumber1",
                                     "class" => "form-control ",
                                     "value" => set_value("cellphone_number_1", $oUsuario->cellphone_number_1),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("cellphone_number_1"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldCellphoneNumber2" class="col-sm-4 col-form-label col-form-label-md">Celular 2 </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "cellphone_number_2",
                                     "id" => "fieldCellphoneNumber2",
                                     "class" => "form-control ",
                                     "value" => set_value("cellphone_number_2", $oUsuario->cellphone_number_2),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("cellphone_number_2"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldCodAcceso" class="col-sm-4 col-form-label col-form-label-md">Codigo de acceso </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "cod_acceso",
                                     "id" => "fieldCodAcceso",
                                     "class" => "form-control ",
                                     "value" => set_value("cod_acceso", $oUsuario->cod_acceso),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("cod_acceso"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdTipoAsociado" class="col-sm-4 col-form-label col-form-label-md">Tipo de asociado </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_tipo_asociado",
                                     "id" => "fieldIdTipoAsociado",
                                     "class" => "form-control ",
                                     "value" => set_value("id_tipo_asociado", $oUsuario->id_tipo_asociado),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_tipo_asociado"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdNivelAsociado" class="col-sm-4 col-form-label col-form-label-md">Nivel de asociado </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_nivel_asociado",
                                     "id" => "fieldIdNivelAsociado",
                                     "class" => "form-control ",
                                     "value" => set_value("id_nivel_asociado", $oUsuario->id_nivel_asociado),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_nivel_asociado"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdTurno" class="col-sm-4 col-form-label col-form-label-md">Turno de </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_turno",
                                     "id" => "fieldIdTurno",
                                     "class" => "form-control ",
                                     "value" => set_value("id_turno", $oUsuario->id_turno),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_turno"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdRole" class="col-sm-4 col-form-label col-form-label-md">Id Role  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_role",
                                     "id" => "fieldIdRole",
                                     "class" => "form-control ",
                                     "value" => set_value("id_role", $oUsuario->id_role),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_role"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldIdPicture" class="col-sm-4 col-form-label col-form-label-md">Foto de perfil </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "id_picture",
                                     "id" => "fieldIdPicture",
                                     "class" => "form-control ",
                                     "value" => set_value("id_picture", $oUsuario->id_picture),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "", "") ?>
                                 </div>
                                 </div>
                                 <?php echo form_error("id_picture"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldAppMonitor" class="col-sm-4 col-form-label col-form-label-md">Permitir app monitoreo </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_radio("app_monitor", "SI", $oUsuario->app_monitor == "SI" ? true : false, "") . " SI</label><br>";
                                    echo "<label>" . form_radio("app_monitor", "NO", $oUsuario->app_monitor == "NO" ? true : false, "") . " NO</label><br>";
                                    
                                ?>
                                </div>
                    </div>
                                <?php echo form_error("app_monitor"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldAppOrders" class="col-sm-4 col-form-label col-form-label-md">Permitir app ordenes </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_radio("app_orders", "SI", $oUsuario->app_orders == "SI" ? true : false, "") . " SI</label><br>";
                                    echo "<label>" . form_radio("app_orders", "NO", $oUsuario->app_orders == "NO" ? true : false, "") . " NO</label><br>";
                                    
                                ?>
                                </div>
                    </div>
                                <?php echo form_error("app_orders"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldAppAdmin" class="col-sm-4 col-form-label col-form-label-md">Permitir app administrador </label>
                                <div class="col-sm-6">
                                <?php
                                echo "<label>" . form_radio("app_admin", "SI", $oUsuario->app_admin == "SI" ? true : false, "") . " SI</label><br>";
                                    echo "<label>" . form_radio("app_admin", "NO", $oUsuario->app_admin == "NO" ? true : false, "") . " NO</label><br>";
                                    
                                ?>
                                </div>
                    </div>
                                <?php echo form_error("app_admin"); ?>
                    
                            <div class="form-group row">
                                <label for="fieldHerbalifeKey" class="col-sm-4 col-form-label col-form-label-md">Herbalife Key  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                     "name" => "herbalife_key",
                                     "id" => "fieldHerbalifeKey",
                                     "class" => "form-control ",
                                     "value" => set_value("herbalife_key", $oUsuario->herbalife_key),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"","") ?>
                                 </div>
                    </div>
                                 <?php echo form_error("herbalife_key"); ?>
                    
        
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