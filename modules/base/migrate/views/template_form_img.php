<div class="form-group row">
    <label for="lcInputId" class="col-sm-4 col-form-label col-form-label-md">UcInputLabel</label>
    <div class="col-sm-6">
        <?php
        $data = '$inputData';
        echo img('assets/img/lcTableP/thumbs/'.$oUcTableS->imgThumb2);
        echo form_upload($data,set_value("lcInputName", $oUcTableS->lcField),"");
        ?>
    </div>
</div>
<?php echo form_error("lcField"); ?>