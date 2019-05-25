<div class="hr-line-dashed"></div>
<div class="form-group">
    <script>oDropZone.dataName = 'lcTableS'</script>
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10 dropzone" action="#">
        <div class="dropzone-previews"></div>
    </div>
        <?php $files = $oUcObjTableS->getFiles(); ?>
    <script>
        oDropZone.inputName = 'lcObjField';
        oDropZone.inputId = 'inputUcObjField';
        oDropZone.inputIdMainFile = 'inputIdCoverPicture';
        oDropZone.inputNameMainFile = 'idCoverPicture';
        oDropZone.idFotoPrincipal = '<?=$oUcObjTableS->getIdCoverPicture()?>';
    </script>
        <?php if(isArray($files)){ ?>
    <script>
        <?php foreach ($files as $ind => $file){ ?>
        oDropZone.uploads['<?=$ind?>'] = {};
        oDropZone.uploads['<?=$ind?>'].data = JSON.parse(`<?=json_encode($file->getArrayDataWithThumbs())?>`);
        oDropZone.uploads['<?=$ind?>'].dir = '<?=$file->getUrl()?>';
        oDropZone.uploads['<?=$ind?>'].error = 'ok';
        oDropZone.uploads['<?=$ind?>'].fromAjax = true;
        oDropZone.uploads['<?=$ind?>'].pk= '<?=$file->getIdFile()?>';
        oDropZone.uploads['<?=$ind?>'].tableRef= '<?=$oUcObjTableS->getTableName()?>';
        oDropZone.uploads['<?=$ind?>'].pkTableRef= '<?=setObject($oUcObjTableS->getPrimaryKey())?>';
        oDropZone.uploads['<?=$ind?>'].idObjTableRef= '<?=$oUcObjTableS->getUcIdObjTable()?>';
        oDropZone.uploads['<?=$ind?>'].fieldTableRef= 'UcObjField';
        <?php } ?>
    </script>
        <?php } ?>
    <?php
    $data = '$inputData';
    echo form_hidden($data, set_value("lcObjField", $oUcObjTableS->getUcObjField()), "")
    ?>
</div>
