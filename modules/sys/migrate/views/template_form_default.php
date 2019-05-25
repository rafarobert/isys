<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data, set_value("lcObjField", $oUcObjTableS->getUcObjField()), "")
        ?>
    </div>
</div>
<?php echo form_error("lcObjField"); ?>