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

    //>>>initVarsForeignTable<<<
    public $lcFkObjFieldP;
    //<<<initVarsForeignTable>>>

    public function __construct()
    {
        parent::__construct();
    }

    public function init(){
        $this->load->model("lcModS/model_lcTableP");
        //>>>loadModelsForeignTable<<<
        $this->load->model("lcFkModS/model_lcFkTableP");
        //<<<loadModelsForeignTable>>>
        $this->initLoaded();
        //>>>initFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->get_by('$fFieldsRef', true);
        //<<<initFieldsForeignTable>>>
        //>>>compareFieldsForeignTable<<<
        $this->lcFkObjFieldP = $this->model_lcFkTableP->setForeignValues($this->t1Contents, 't1FieldRef', $this->t2Contents, 't2FieldRef');
        //<<<compareFieldsForeignTable>>>
        $this->data['tabName'] = $this->model_lcTableP->_table_name;
        //>>>setFieldsForeignTable<<<
        $this->data['oUcFkObjFieldP'] = $this->model_lcFkTableP->setOptions($this->lcFkObjFieldP);
        //<<<setFieldsForeignTable>>>
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

                        $oModelUcObjTableP[$key] = new ES_Model_UcTableP();
                    }
                    $oModelUcObjTableP[$key] = $oModelUcObjTableP[$key]->setFromData($data);
                }
            } else {

                if (isObject($oUcObjTableP)) {

                    $oModelUcObjTableP[0] = $oUcObjTableP;

                } else {

                    $oModelUcObjTableP[0] = new ES_Model_UcTableP();
                }
                $oModelUcObjTableP[0] = $oModelUcObjTableP[0]->setFromData($oData);
            }

            return $oModelUcObjTableP;

        } else if (isArray($oUcObjTableP) || isObject($oUcObjTableP)) {

            return $this->setUcObjTableP($oUcObjTableP);

        } else {

            $oModelUcObjTableP[] = new ES_Model_UcTableP();

            return $oModelUcObjTableP;
        }
    }

    //extraFunctions
}