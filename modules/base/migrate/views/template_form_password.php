
<?php if (!validateVar($oUcTableS->lcTableId,'numeric')) { ?>
    <div class="form-group row">
        <label for="lcInputId" class="col-sm-4 col-form-label col-form-label-md">UcInputLabel </label>
        <div class="col-sm-6">
            <?php
            $data = '$inputData';
            echo form_password($data, set_value("lcInputName", $oUcTableS->lcField));
            ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="lcInputPassConfId" class="col-sm-4 col-form-label col-form-label-md">UcInputPassConfLabel</label>
        <div class="col-sm-6">
            <?php
            $data = array(
                "placeholder" => "UcInputPassConfPlaceholder",
                "name" => "password_confirm",
                "id" => "lcInputPassConfId",
                "class" => "form-control "
            );
            echo form_password($data, "", "") ?>
        </div>
    </div>
    <?php echo form_error("lcField"); ?>
<?php } ?>

