<div class="hr-line-dashed"></div>
<?php if (!validateVar($oUcTableS->lcTableId, 'numeric')) { ?>
    <div class="form-group">
        <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel </label>
        <div class="col-sm-10">
            <?php
            $data = '$inputData';
            echo form_password($data, set_value("lcInputName", $oUcTableS->lcField));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="lcInputPassConfId" class="col-sm-2 control-label">UcInputPassConfLabel</label>
        <div class="col-sm-10">
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