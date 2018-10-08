<div class="hr-line-dashed"></div>
<div class="form-group">
    <script>oDropZone.dataName = 'lcTableS'</script>
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10 dropzone" action="#">
        <div class="dropzone-previews"></div>
    </div>
    <script>
        oDropZone.inputName = 'lcObjField';
        oDropZone.inputId = 'inputUcObjField';
        <?php foreach ($oUcObjTableS->getFiles($oUcObjTableS) as $ind => $file){ ?>
        oDropZone.uploads['<?=$ind?>'] = {};
        oDropZone.uploads['<?=$ind?>'].data = JSON.parse(`<?=json_encode($file->getArrayDataWithThumbs($file))?>`);
        oDropZone.uploads['<?=$ind?>'].dir = '<?=$file->getUrl()?>';
        oDropZone.uploads['<?=$ind?>'].error = 'ok';
        oDropZone.uploads['<?=$ind?>'].fromAjax = true;
        oDropZone.uploads['<?=$ind?>'].pk= '<?=$file->getIdFile()?>';
        <?php }?>
    </script>
    <?php
    $data = '$inputData';
    echo form_hidden($data, set_value("lcObjField", $oConcepto->getUcObjField()), "")
    ?>
</div>
