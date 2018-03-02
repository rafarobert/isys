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
</div>
<?php echo form_error("sexo"); ?>