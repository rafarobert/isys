<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10 two-columns">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data,$objOptions,$oUcTableS->lcField);
        //>>>printSecondItem<<<
        echo form_lcSecondInputFormType($data['lcSecondInputFormType']);
        //<<<printSecondItem>>>
        ?>
    </div>
</div>
<?php echo form_error("lcErrorForField"); ?>



