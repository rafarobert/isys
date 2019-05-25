<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10 input-append date form_date" data-date="<?=$oUcObjTableS->getUcObjField()?>">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data, set_value("lcObjField", $oUcObjTableS->getUcObjField()), "")
        ?>
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
    </div>
</div>
<?php echo form_error("lcObjField"); ?>