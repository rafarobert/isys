<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 */

defined("BASEPATH") OR exit("No direct script access allowed");

class ES_Ctrl_UcTableP extends ES_UcModS_Controller
{
    public static $initialized;
    //>>>initVarsForeignTable<<<
    public $lcFkObjFieldP;
    //<<<initVarsForeignTable>>>

    public function __construct()
    {
        parent::__construct();
        $this->load->model("lcModS/model_lcTableP");

        if(isset($this->model_lcTableP)){

            $this->model_initialized = $this->model_lcTableP;

        } else if(isset($this->CI_global->model_lcTableP)){

            $this->model_initialized = $this->CI_global->model_lcTableP;
        }
        //>>>validateFieldImgUpload4<<<
        if(validate_modulo('admin','archivos')) {
            $this->initArchivos();
        }
        //<<<validateFieldImgUpload4>>>
        //>>>validateUserSavedForRolling2<<<
        if(validate_modulo('base','users_roles')){
            $this->initUsersRoles();
        }
        //<<<validateUserSavedForRolling2>>>
        //>>>validateUsersSavedForPersonTable2<<<
        if(validate_modulo('admin','personas')) {
            $this->initPersonas();
        }
        //<<<validateUsersSavedForPersonTable2>>>
        //>>>validateUsersSavedForEstudentTable2<<<
        if(validate_modulo('admin','estudiantes')) {
            $this->initEstudiantes();
        }
        //<<<validateUsersSavedForEstudentTable2>>>
        $this->subjectP = 'lcTableP';
        $this->subjectS = 'lcTableS';
    }

    public function init(){
        //>>>loadModelsForeignTable<<<
        if(!validate_modulo('lcFkModS','lcFkTableP')){
            return $this->getInstance();
        }
        $this->load->model("lcFkModS/model_lcFkTableP");
        //<<<loadModelsForeignTable>>>
        $this->initLoaded();
        //>>>initFieldsFilterBy<<<
        $this->lcObjFilterByP = $this->model_lcFkTableP->filterByUcObjField('indexFilterBy','$fFieldsRef',false);
        //<<<initFieldsFilterBy>>>
        //>>>initFieldsSelectBy<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->selectBy('$fFieldsRef');
        //<<<initFieldsSelectBy>>>
        //>>>compareFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->setForeignValues($this->t1Contents, 't1FieldRef', $this->t2Contents, 't2FieldRef');
        //<<<compareFieldsForeignTable>>>
        $this->data['tabName'] = $this->model_lcTableP->_table_name;
        //>>>setFieldsForeignTable<<<
        $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($this->lcFkObjFieldP);
        //<<<setFieldsForeignTable>>>
        //>>>setObjFieldsFilterBy<<<
        $this->data['oUcObjFilterByP'] =  $this->model_lcFkTableP->setOptions($this->lcObjFilterByP);
        //<<<setObjFieldsFilterBy>>>
        self::$initialized = true;
        return $this->getInstance();
    }

    public function setUcObjTableP($oData, $oUcObjTableP = null)
    {
        $oModelUcObjTableP = array();
        if (isArray($oData) || isObject($oData))
        {
            if(isCollection($oData)){

                foreach ($oData as $key => $data){

                    if (isObject($oUcObjTableP)) {

                        $oModelUcObjTableP[$key] = $oUcObjTableP;

                    } else {

                        $oModelUcObjTableP[$key] = new Model_UcTableP();
                    }
                    $oModelUcObjTableP[$key] = $oModelUcObjTableP[$key]->setFromData($data);
                }
            } else {

                if (isObject($oUcObjTableP)) {

                    $oModelUcObjTableP[0] = $oUcObjTableP;

                } else {

                    $oModelUcObjTableP[0] = new Model_UcTableP();
                }
                $oModelUcObjTableP[0] = $oModelUcObjTableP[0]->setFromData($oData);
            }

            return $oModelUcObjTableP;

        } else if (isArray($oUcObjTableP) || isObject($oUcObjTableP)) {

            return $this->setUcObjTableP($oUcObjTableP);

        } else {

            $oModelUcObjTableP[] = new Model_UcTableP();

            return $oModelUcObjTableP;
        }
    }

    //extraFunctions
}