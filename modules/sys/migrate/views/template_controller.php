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

    public static function create()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function index($view = NULL, $id = NULL)
    {
        list($id, $view) = $this->filterIdOrView($id, $view);

        $oUcObjTableP = $this->model_lcTableP->find();

        $this->data["oUcObjTableP"] = $oUcObjTableP;

        return $this->loadView('lcModS/lcTableP/index', $view);
    }

    public function edit($id = NULL)
    {
        if (isNumeric($id) || isString($id)) {

            $rules = $this->model_lcTableP->rules_edit;

            $oUcObjTableS = $this->model_lcTableP->findOneByIdUcObjTableS($id);

            if (!count((array)$oUcObjTableS)) {

                $this->data["errors"][] = "El lcTableS no pudo ser encontrado";
            }
        } else {

            $rules = $this->model_lcTableP->rules;

            $oUcObjTableS = $this->model_lcTableP->getNewUcObjTableS();
        }
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

            $error = 'ok';

            list($oUcObjTableS, $aFromPost) = $this->model_lcTableP->getDataFromPost();
            //>>>validateFieldImgUpload<<<
            if (!$this->model_lcTableP->do_upload("file", $id) && $id == null) {
                $error = array('error' => $this->upload->display_errors());
                $this->data['errors'] = $error;
                show_error($error);
            } else {
                $this->data["file"] = $data = $this->upload->data();
                $this->fromAjax = true;
            }
            //<<<validateFieldImgUpload>>>
            //>>>validateFieldPassword<<<
            if ($id == NULL) {
                $data["lcField"] = $this->input->post('lcField');
                $data["lcField"] = $this->session->hash($data['lcField']);
            }
            //<<<validateFieldPassword>>>
            if ($error == 'ok') {
                $data = $this->model_lcTableP->save($oUcObjTableS->getArrayData(), $id);
                if ($this->fromAjax) {
                    $aReturn['message'] = setMessage($data, $aFromPost, 'tableTitle agregado exitosamente');
                    $aReturn['error'] = $error;
                    $this->data['oUcTableS'] = $data = $this->model_lcTableP->findOneBy($data, true);
                    $data->primary = $primary = $this->model_lcTableP->getPrimaryKey;
                    $data->pk = $data->$primary;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit", $this->data, true);
                    $aReturn['redirect'] = 'lcModS/lcTableP';
                    $aReturn = array_merge($aReturn, std2array($data));
                    echo json_encode($aReturn);
                    exit;
                } else {
                    redirect("lcModS/lcTableP");
                }
            } else {
                if ($this->fromAjax) {
                    $aReturn['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
                    $aReturn['view'] = $this->load->view("lcModS/lcTableP/edit", $this->data, true);
                    echo json_encode($aReturn);
                    exit;
                } else {
                    $this->data["subview"] = "lcModS/lcTableP/edit";
                }
            }
        } else {
            $this->data['error'] = $error = "tableTitle con datos incompletos, porfavor revisa los datos";;
        }
        // Se carga la vista
        return $this->loadView('lcModS/lcTableP/edit', $error);
    }
    //extraFunctions
}