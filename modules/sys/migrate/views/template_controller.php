<?php
/**
 * Created by Estic.
 * User: #userCreated
 * Date: #dateCreated
 * Time: #timeCreated
 * @property Model_UcTableP $oUcObjTableS
 */
use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

defined("BASEPATH") OR exit("No direct script access allowed");

class Ctrl_UcTableP extends ES_Ctrl_UcTableP
{

    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public function getInstance(){
        return self::$instance;
    }

    public function toBePrinted(){
        $this->printView = true;
        return self::$instance;
    }

    public static function create($bWithInit = false)
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        if($bWithInit){
            self::$instance->init();
        } else if(!self::$initialized){
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index($view = NULL, $id = NULL)
    {
        $this->init();

        list($id, $view) = $this->filterIdOrView($id, $view);

        $oUcObjTableP = $this->model_lcTableP->find();

        $this->data["oUcObjTableP"] = $oUcObjTableP;

        return $this->loadView('lcModS/lcTableP/index', $view);
    }

    public function edit($id = NULL)
    {
        $this->init();

        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_lcTableP->rules_edit;

            $oUcObjTableS = $this->model_lcTableP->findOneByUcIdObjTable($id);

            if (!count((array)$oUcObjTableS)) {

                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_lcTableP->rules;

            $oUcObjTableS = $this->model_lcTableP->getNewUcObjTableS();
        }
        //>>>validateFieldImgUpload3<<<
        // revisa esta seccion despues de cada migracion
        $oUcObjTableS = $this->model_lcTableP->setThumbs($oUcObjTableS,$oUcObjTableS->getIdsfiles());
        //<<<validateFieldImgUpload3>>>
        if(is_object($oUcObjTableS)){

            $this->form_validation->set_rules($rules);
            //>>>setADBTablesRefFields<<<
            $aDBTables = std2array($this->model_tables->get_by(['table_name']));
            $this->data['aDBTables'] = array_combine(array_column($aDBTables, 'table_name'), array_column($aDBTables, 'table_name'));
            $this->data['aDBTableRef'] = isset($oUcObjTableS->idDBTableRef) && $oUcObjTableS->idDBTableRef != null ? [$oUcObjTableS->idDBTableRef => $oUcObjTableS->idDBTableRef] : [];
            $this->data['aDBTableFields'] = isset($oUcObjTableS->fieldDBTableRef) && $oUcObjTableS->fieldDBTableRef != null ? std2array($oUcObjTableS->fieldDBTableRef) : [];
            //<<<setADBTablesRefFields>>>

            $this->data['oUcObjTableS'] = $oUcObjTableS;

            $aReturn = array();

            if ($this->form_validation->run() == true) {

                $oUcObjTableS = $this->model_lcTableP->getDataFromPost($oUcObjTableS);
                //>>>validateFieldImgUpload1<<<
                $oUcObjTableS = $this->doUpload($oUcObjTableS);
                //<<<validateFieldImgUpload1>>>
                //>>>validateFieldPassword<<<
                if ($id == NULL) {
                    $data["lcField"] = $this->input->post('lcField');
                }
                //<<<validateFieldPassword>>>
                if ($this->error == 'ok') {
                    $data = $oUcObjTableS->saveOrUpdate($id);
                    //>>>validateUserSavedForRolling1<<<
                    $oUserRole = $this->model_users_roles->findOneByIdUser($oUcObjTableS->getIdUser());
                    if(isObject($oUserRole)){
                        $oUserRole->saveOrUpdate($data);
                    } else {
                        $this->model_users_roles->save($data);
                    }
                    //<<<validateUserSavedForRolling1>>>
                    //>>>validateUsersSavedForPersonTable1<<<
                    $oPersona = $this->model_personas->findOneByIdUser($oUcObjTableS->getIdUser());
                    if(isObject($oPersona)){
                        $oPersona->saveOrUpdate($data);
                    } else {
                        $this->model_personas->save($data);
                    }
                    //<<<validateUsersSavedForPersonTable1>>>
                    //>>>validateUsersSavedForEstudentTable1<<<
                    if($this->input->post('idCurso') || $this->input->post('id_curso')){
                        $oEstudiante = $this->model_estudiantes->findOneByIdUser($oUcObjTableS->getIdUser());
                        if(isObject($oUcObjTableS)){
                            $oUcObjTableS->saveOrUpdate($data);
                        } else {
                            $this->model_estudiantes->save($data);
                        }
                    }
                    //<<<validateUsersSavedForEstudentTable1>>>
                    //>>>validateFieldImgUpload2<<<
                    $oUcObjTableS = $this->saveThumbs($oUcObjTableS);
                    //<<<validateFieldImgUpload2>>>
                    $this->data['oUcObjTableS'] = $oUcObjTableS;
                    return $this->returnResponse($oUcObjTableS);
                } else {
                    return $this->returnResponse($oUcObjTableS);
                }
            } else {
                $this->data['error'][] = $this->error = $this->errors[] = "tableTitle con datos incompletos, porfavor revisa los datos";;
            }
            // Se carga la vista
            return $this->loadView('lcModS/lcTableP/edit', $this->error);
        } else {
            redirect('lcModS/lcTableP/index');
        }
    }
    //extraFunctions
}