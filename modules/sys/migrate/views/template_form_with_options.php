<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data, $objOptions, $oUcObjTableS->getUcObjField());
        //>>>printSecondItem<<<
        echo form_lcSecondInputFormType($data['lcSecondInputFormType']);
        //<<<printSecondItem>>>
        ?>
    </div>
</div>
<?php echo form_error("lcObjField"); ?>



