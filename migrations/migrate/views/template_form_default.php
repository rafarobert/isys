<div class="form-group row">
    <label for="lcInputId" class="col-sm-4 col-form-label col-form-label-md">ucInputLabel</label>
    <div class="col-sm-6">
        <?php
        $data = '$inputData';
        echo form_input($data,set_value("lcInputName", $oucTableS->lcField),"")
        ?>
    </div>
</div>
<?php echo form_error("lcField"); ?>