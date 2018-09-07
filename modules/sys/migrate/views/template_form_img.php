<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10">
        <?php
        $data = '$inputData';
        echo isset($oUcTableS->lcField_thumb2) ? img('assets/img/lcTableP/thumbs/'.$oUcTableS->lcField_thumb2) : '';
        echo form_upload($data,set_value("lcInputName", $oUcTableS->lcField),"");
        ?>
    </div>
</div>
<?php echo form_error("lcField"); ?>