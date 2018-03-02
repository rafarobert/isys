<div class="form-group row">
    <label for="lcInputIdS" class="col-sm-4 col-form-label col-form-label-md">ucInputLabel</label>
    <div class="col-sm-6">
        <?php
        $data = '$inputData';
        $checked = '';
        echo form_radios($data,$data['options'],[$oucFieldObj->lcInput]) ?>
        ?>
    </div>
</div>
<?php echo form_error($data["name"]); ?>
