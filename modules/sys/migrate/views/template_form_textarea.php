<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10">
        <script>
            oTinyMce.set('[name="lcInputName"]', `<?=$oUcObjTableS->lcField ?>`);
        </script>
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data, set_value("lcInputName", $oUcObjTableS->lcField), "")
        ?>
    </div>
</div>
<?php echo form_error("lcField"); ?>