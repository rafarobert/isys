<div class="hr-line-dashed"></div>
<div class="form-group">
    <label for="lcInputId" class="col-sm-2 control-label">UcInputLabel</label>
    <div class="col-sm-10 input-append date form_date">
        <?php
        $data = '$inputData';
        echo form_lcInputFormType($data, set_value("lcObjField", $oUcObjTableS->getUcObjField()), "")
        ?>
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
    </div>
</div>
<?php echo form_error("lcObjField"); ?>


<div class="form-group">
    <label for="inputFechaInicio" class="col-sm-2 control-label">FechaInicio</label>
    <div class="col-sm-10 input-append date form_date" data-date="2012-12-21T15:25:00Z">
        <?php
        $data = array (
            'name' => 'fechaInicio',
            'id' => 'inputFechaInicio',
            'class' => 'form-control ',
            'size' => 16,
            'placeholder' => '',
            'readonly' => true
        );
        echo form_input($data, set_value("fechaInicio", $oCurso->getFechaInicio()), "")
        ?>
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-th"></i></span>
    </div>
</div>
<?php echo form_error("fechaInicio"); ?><div class="hr-line-dashed"></div>
