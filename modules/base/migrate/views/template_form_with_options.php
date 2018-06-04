
<div class="form-group row">
    <label for="lcInputId" class="col-sm-4 col-form-label col-form-label-md">UcInputLabel</label>
    <div class="col-sm-6 two-columns">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data,$objOptions,$oUcTableS->lcField);
        //>>>printSecondItem<<<
        echo form_lcSecondInputFormType($data['lcSecondInputFormType']);
        //<<<printSecondItem>>>
        ?>
    </div>
</div>
<?php echo form_error("lcField"); ?>

