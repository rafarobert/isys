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
</div>
<?php echo form_error("lcField"); ?>