<?php 
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class Crud_UcTableP extends UcModS_Controller {

    //>>>initVarsForeignTable<<<
    public $lcFkObjFieldP;
    //<<<initVarsForeignTable>>>

    public function __construct()
    {
        parent::__construct();
        $this->load->model("lcModS/model_lcTableP");
        //>>>loadModelsForeignTable<<<
        $this->load->model("lcFkModS/model_lcFkTableP");
        //<<<loadModelsForeignTable>>>
        $this->initLoaded();
        //>>>initFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->get_by('$fFieldsRef', true);
        //<<<initFieldsForeignTable>>>
        //>>>compareFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->setForeignValues($this->t1Contents,'t1FieldRef',$this->t2Contents,'t2FieldRef');
        //<<<compareFieldsForeignTable>>>
        $this->data['table_name'] = $this->model_lcTableP->_table_name;
        //>>>setFieldsForeignTable<<<
        $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($this->lcFkObjFieldP,'divider');
        //<<<setFieldsForeignTable>>>
    }

    public function dataFromPost($view){
        if(!validateVar($view)){
            $data = $this->model_lcTableP->array_from_post(
                $aFromPost = '$validatedFieldsNames'
            );
        }
        //>>>validatedControllerFieldsEditView<<<
        else if(compareStrStr($view, 'editNameView')){
            $data = $this->model_lcTableP->array_from_post(
                $aFromPost = '$fieldsEditView'
            );
        }
        //<<<validatedControllerFieldsEditView>>>
        return [$data,$aFromPost];
    }
    //extraFunctions
}