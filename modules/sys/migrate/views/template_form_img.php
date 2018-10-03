<div class="hr-line-dashed"></div>
<div class="form-group">
    <script>oDropZone.dataName = 'lcTableS'</script>
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div id="lcInputId" class="col-sm-10 dropzone" action="#">
        <div class="dropzone-previews"></div>
    </div>
    <script>
        oDropZone.inputName = 'lcObjField';
        oDropZone.inputId = 'inputUcObjField';
    </script>
    <?php
    $data = '$inputData';
    echo form_hidden($data, set_value("lcObjField", $oConcepto->getUcObjField()), "")
    ?>
</div>
