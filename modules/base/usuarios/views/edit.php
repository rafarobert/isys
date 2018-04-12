<?php
/**
 * Created by herbalife.
 * User: rafaelgutierrez
 * Date: 12/04/2018
 * Time: 2:32 am
 * @var Model_Usuarios $model_usuarios
 * @var Model_Usuarios $usuarios
 * @var Model_Usuarios $usuario
 */
?>

<h3><?= empty($oUsuario->id_usuario) ? "Agregar Usuarios" : "Actualizando datos, Usuario #" . $oUsuario->id_usuario ?></h3>

<?= form_open_multipart() ?>

<div class="form-group row">
    <label for="fieldNombre" class="col-sm-4 col-form-label col-form-label-md">Nombre</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'nombre',
  'id' => 'fieldNombre',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("nombre", $oUsuario->nombre),"")
        ?>
    </div>
</div>
<?php echo form_error("nombre"); ?><div class="form-group row">
    <label for="fieldApellido" class="col-sm-4 col-form-label col-form-label-md">Apellido</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'apellido',
  'id' => 'fieldApellido',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("apellido", $oUsuario->apellido),"")
        ?>
    </div>
</div>
<?php echo form_error("apellido"); ?><div class="form-group row">
    <label for="fieldUsername" class="col-sm-4 col-form-label col-form-label-md">Username</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'username',
  'id' => 'fieldUsername',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("username", $oUsuario->username),"")
        ?>
    </div>
</div>
<?php echo form_error("username"); ?><div class="form-group row">
    <label for="fieldEmail" class="col-sm-4 col-form-label col-form-label-md">Email</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'email',
  'id' => 'fieldEmail',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("email", $oUsuario->email),"")
        ?>
    </div>
</div>
<?php echo form_error("email"); ?>
<?php if (!validateVar($oUsuario->id_usuario,'numeric')) { ?>
    <div class="form-group row">
        <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Password </label>
        <div class="col-sm-6">
            <?php
            $data = array (
  'name' => 'password',
  'id' => 'fieldPassword',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
            echo form_password($data, set_value("password", $oUsuario->password));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="fieldConfirmPassword" class="col-sm-4 col-form-label col-form-label-md">Confirmar Password</label>
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
    </div>
    <?php echo form_error("password"); ?>
<?php } ?>

<div class="form-group row">
    <label for="fieldFec_nacimiento" class="col-sm-4 col-form-label col-form-label-md">Fec nacimiento</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'fec_nacimiento',
  'id' => 'fieldFec_nacimiento',
  'class' => 'form-control datepicker ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_input($data,set_value("fec_nacimiento", $oUsuario->fec_nacimiento),"")
        ?>
    </div>
</div>
<?php echo form_error("fec_nacimiento"); ?>
<div class="form-group row">
    <label for="fieldSexo" class="col-sm-4 col-form-label col-form-label-md">Sexo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'sexo',
  'id' => 'fieldSexo',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'Masculino',
    1 => 'Femenino',
  ),
);
        echo form_select($data,$data['options'],$oUsuario->sexo);
        ?>
    </div>
</div>
<?php echo form_error("sexo"); ?>


<div class="form-group row">
    <label for="fieldInvitado_por" class="col-sm-4 col-form-label col-form-label-md">Invitado por</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'invitado_por',
  'id' => 'fieldInvitado_por',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_dropdown($data,$oUsuarios,$oUsuario->invitado_por);
        ?>
    </div>
</div>
<?php echo form_error("invitado_por"); ?>

<div class="form-group row">
    <label for="fieldPhone_number_1" class="col-sm-4 col-form-label col-form-label-md">Telefono 1</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'phone_number_1',
  'id' => 'fieldPhone_number_1',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("phone_number_1", $oUsuario->phone_number_1),"")
        ?>
    </div>
</div>
<?php echo form_error("phone_number_1"); ?><div class="form-group row">
    <label for="fieldPhone_number_2" class="col-sm-4 col-form-label col-form-label-md">Phone number 2</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'phone_number_2',
  'id' => 'fieldPhone_number_2',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("phone_number_2", $oUsuario->phone_number_2),"")
        ?>
    </div>
</div>
<?php echo form_error("phone_number_2"); ?><div class="form-group row">
    <label for="fieldCellphone_number_1" class="col-sm-4 col-form-label col-form-label-md">Celular 1</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'cellphone_number_1',
  'id' => 'fieldCellphone_number_1',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("cellphone_number_1", $oUsuario->cellphone_number_1),"")
        ?>
    </div>
</div>
<?php echo form_error("cellphone_number_1"); ?><div class="form-group row">
    <label for="fieldCellphone_number_2" class="col-sm-4 col-form-label col-form-label-md">Celular 2</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'cellphone_number_2',
  'id' => 'fieldCellphone_number_2',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("cellphone_number_2", $oUsuario->cellphone_number_2),"")
        ?>
    </div>
</div>
<?php echo form_error("cellphone_number_2"); ?><div class="form-group row">
    <label for="fieldCod_acceso" class="col-sm-4 col-form-label col-form-label-md">Codigo de acceso</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'cod_acceso',
  'id' => 'fieldCod_acceso',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("cod_acceso", $oUsuario->cod_acceso),"")
        ?>
    </div>
</div>
<?php echo form_error("cod_acceso"); ?>
<div class="form-group row">
    <label for="fieldId_option_tipo_asociado" class="col-sm-4 col-form-label col-form-label-md">Tipo de asociado</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_option_tipo_asociado',
  'id' => 'fieldId_option_tipo_asociado',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_dropdown($data,$oTipoAsociado,$oUsuario->id_option_tipo_asociado);
        ?>
    </div>
</div>
<?php echo form_error("id_option_tipo_asociado"); ?>


<div class="form-group row">
    <label for="fieldId_option_nivel_asociado" class="col-sm-4 col-form-label col-form-label-md">Nivel de asociado</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_option_nivel_asociado',
  'id' => 'fieldId_option_nivel_asociado',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_dropdown($data,$oNivelAsociado,$oUsuario->id_option_nivel_asociado);
        ?>
    </div>
</div>
<?php echo form_error("id_option_nivel_asociado"); ?>


<div class="form-group row">
    <label for="fieldId_turno" class="col-sm-4 col-form-label col-form-label-md">Turno de</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_turno',
  'id' => 'fieldId_turno',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_dropdown($data,$oTurnos,$oUsuario->id_turno);
        ?>
    </div>
</div>
<?php echo form_error("id_turno"); ?>


<div class="form-group row">
    <label for="fieldId_role" class="col-sm-4 col-form-label col-form-label-md">Role del usuario</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'id_role',
  'id' => 'fieldId_role',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_radios($data,$oRoles,$oUsuario->id_role);
        ?>
    </div>
</div>
<?php echo form_error("id_role"); ?>

<div class="form-group row">
    <label for="fieldFoto_perfil" class="col-sm-4 col-form-label col-form-label-md">Foto de perfil</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'foto_perfil',
  'id' => 'fieldFoto_perfil',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo img('img/usuarios/thumbs/'.$oUsuario->imgThumb);
        echo form_upload($data,set_value("foto_perfil", $oUsuario->foto_perfil),"");
        ?>
    </div>
</div>
<?php echo form_error("foto_perfil"); ?>
<div class="form-group row">
    <label for="fieldApp_monitor" class="col-sm-4 col-form-label col-form-label-md">Permitir app monitoreo</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'app_monitor',
  'id' => 'fieldApp_monitor',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'SI',
    1 => 'NO',
  ),
);
        echo form_radios($data,$data['options'],$oUsuario->app_monitor);
        ?>
    </div>
</div>
<?php echo form_error("app_monitor"); ?>


<div class="form-group row">
    <label for="fieldApp_orders" class="col-sm-4 col-form-label col-form-label-md">Permitir app ordenes</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'app_orders',
  'id' => 'fieldApp_orders',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'SI',
    1 => 'NO',
  ),
);
        echo form_radios($data,$data['options'],$oUsuario->app_orders);
        ?>
    </div>
</div>
<?php echo form_error("app_orders"); ?>


<div class="form-group row">
    <label for="fieldApp_admin" class="col-sm-4 col-form-label col-form-label-md">Permitir app administrador</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'app_admin',
  'id' => 'fieldApp_admin',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
  'options' => 
  array (
    0 => 'SI',
    1 => 'NO',
  ),
);
        echo form_radios($data,$data['options'],$oUsuario->app_admin);
        ?>
    </div>
</div>
<?php echo form_error("app_admin"); ?>

<div class="form-group row">
    <label for="fieldHerbalife_key" class="col-sm-4 col-form-label col-form-label-md">Herbalife key</label>
    <div class="col-sm-6">
        <?php
        $data = array (
  'name' => 'herbalife_key',
  'id' => 'fieldHerbalife_key',
  'class' => 'form-control ',
  'onclick' => '',
  'onchange' => '',
  'placeholder' => '',
);
        echo form_default($data,set_value("herbalife_key", $oUsuario->herbalife_key),"")
        ?>
    </div>
</div>
<?php echo form_error("herbalife_key"); ?>

<div class="form-group row">
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
<?php echo form_close();
if(validateArray($errors,'error')){?>
    <div class="row">
        <div class="col-md-12">
            <?=$errors['error']?>
        </div>
    </div>
<?php } ?>

