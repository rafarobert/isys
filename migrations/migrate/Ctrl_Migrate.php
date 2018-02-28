<?php

/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/9/2017
 * Time: 2:31 AM
 * @property CI_Migration $migration
 * @property Model_Modulos $model_modulos
 */
class Ctrl_Migrate extends Base_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->library('migration');
    }

    public function run($frame = 0, $funct = 0, $modulo = 0, $submod = 0)
    {
        $migrations_errors = array();
        $migration_error = '';
        $it_worked = false;
        $sys = array_keys(config_item('sys'));

        //*************************************************************
        //******* si se hace la reescritura por defecto ***************
        //*************************************************************
        if ($funct == 'set') {
            $_POST['bReset'] = false;
        } else if ($funct == 'reset') {
            $_POST['bReset'] = true;
        }

        $migrations = $this->migration->_migration_files;

        //*******************************************************************************************
        //******* si se hace el migration a un elemento de algun modulo especifico ******************
        //*******************************************************************************************
        if (validateVar($modulo, self::STRING && validateVar($submod, self::NUMERIC))) {
            foreach ($migrations as $mod => $migration_keys) {
                if ($mod == $modulo && !$it_worked) {
                    $this->dbforge->fields = array();
                    $this->dbforge->keys = array();
                    $this->migration->start($submod);
                    if ($this->migration->version(intval($submod), $mod) === FALSE) {
                        $migration_error = $this->migration->error_string();
                        $it_worked = false;
                        break;
                    } else {
                        $it_worked = true;
                    }
                }
            }
        }

        //****************************************************************************************
        //******* si se hace el migration de todos los submodulos de un modulo especifico *******
        //****************************************************************************************
        else if (validateVar($modulo, self::STRING) && !validateVar($submod, self::NUMERIC)) {
            foreach ($migrations as $mod => $migration_keys) {
                if ($mod == $modulo && !$it_worked) {
                    foreach ($migration_keys as $submod => $dir) {
                        $this->dbforge->fields = array();
                        $this->dbforge->keys = array();
                        $this->migration->start($submod);
                        if ($this->migration->version(intval($submod), $mod) === FALSE) {
                            $migrations_errors[$submod] = $this->migration->error_string();
                            $it_worked = false;
                            break;
                        } else {
                            $it_worked = true;
                        }
                    }
                }

            }
        }
        //**************************************************************************************
        //******* si se hace el migration de un modulo especifico, ojo: no tiene submodulos *******
        //**************************************************************************************
        else if (validateVar($modulo, self::NUMERIC) && validateVar($submod, self::NUMERIC)) {
            $this->dbforge->fields = array();
            $this->dbforge->keys = array();
            $this->migration->start($submod);
            if ($this->migration->version(intval($submod)) === FALSE) {
                $migration_error = $this->migration->error_string();
                $it_worked = false;
            } else {
                $it_worked = true;
            }
        }
        //***************************************************************************************
        //******* si se hace el migration de todos los modulos, ojo: no tienen submodulos *******
        //***************************************************************************************
        else if (!validateVar($modulo) && !validateVar($submod)) {
            foreach ($this->migration->find_migrations(false) as $submod => $dir) {
                $this->dbforge->fields = array();
                $this->dbforge->keys = array();
                $this->migration->start($submod);
                if ($this->migration->version(intval($submod)) === FALSE) {
                    $migrations_errors[$submod] = $this->migration->error_string();
                    $it_worked = false;
                    break;
                } else {
                    $it_worked = true;
                }
            }
        }

        if ($it_worked) {
            echo "All migration has been worked";
        } else {
            if ($migration_error != '') {
                show_error('Error en Migration - ' . $this->migration->_table_name . '<br>' . $this->migration->error_string());
            } else {
                foreach ($migrations_errors as $key_migr_error => $value) {
                    show_error('Error en Migration - ' . $key_migr_error . '<br>' . $value);
                }
            }
            echo "Migration doesn't worked";
        }
    }

    public function frompropelxml()
    {
//        $this->migration->_dir_migrations_files = 'schemas/';
        $xmlfile = file_get_contents(site_url('orm/schema/schema.xml'));
        $ob= simplexml_load_string($xmlfile);
        $json  = json_encode($ob);
        $configData = json_decode($json, true);
        $dataBaseAttributes = $configData['@attributes'];
        $tables = $configData['table'];
        $fields = array();
        $migIndex = 0;
        list($modInit,$submodInit) = getModSubMod($tables[0]['@attributes']['name']);

        foreach ($tables as $i => $data) {
            $id_table = '';
            $fields = array();
            $tableAttributes = $data['@attributes'];
            if(isset($data['column']) && count($data['column'])){
                foreach ($data['column'] as $j => $params) {
                    if(isset($params['@attributes']) && $params['@attributes'] != []){
                        $fieldAttributes = $params['@attributes'];
                        if(isset($fieldAttributes['name']) && $fieldAttributes['name'] != "") {
                            if(isset($fieldAttributes['type']) && $fieldAttributes['type'] != null){
                                $fields[$fieldAttributes['name']]['type'] = $fieldAttributes['type'];
                            }
                            if(isset($fieldAttributes['size']) && $fieldAttributes['size'] != null){
                                $fields[$fieldAttributes['name']]['constraint'] = intval($fieldAttributes['size']);
                            }
                            if(isset($fieldAttributes['autoIncrement']) && $fieldAttributes['autoIncrement'] != null){
                                $fields[$fieldAttributes['name']]['auto_increment'] = TRUE;
                            }
                            if(isset($fieldAttributes['required']) && $fieldAttributes['required']){
                                $fields[$fieldAttributes['name']]['required'] = TRUE;
                            }
                            if(isset($fieldAttributes['defaultValue']) && $fieldAttributes['defaultValue'] != null){
                                $fields[$fieldAttributes['name']]['default'] = $fieldAttributes['defaultValue'];
                            }
                            if(isset($fieldAttributes['sqlType']) && $fieldAttributes['sqlType'] != null)
                            {
                                list($typeConstr, $bUnsigned) = explode(' ', $fieldAttributes['sqlType']);
                                preg_match("/[0-9]{1,11}/", $typeConstr,$aConstraint);
                                preg_match("/[A-Za-z-]+/", $typeConstr,$aType);
                                $constraint = null;
                                $type = null;
                                if(count($aConstraint)) {
                                    $constraint = $aConstraint[0];
                                }
                                if(count($aType)) {
                                    $type = $aType[0];
                                }
                                $fields[$fieldAttributes['name']]['constraint'] = intval($constraint);
                                $fields[$fieldAttributes['name']]['type'] = $type;
                                $fields[$fieldAttributes['name']]['unsigned'] = isset($bUnsigned) ? true : null;
                            }
                            if(isset($fieldAttributes['primaryKey']) && $fieldAttributes['primaryKey']) {
                                if(isset($fieldAttributes['name'])) {
                                    $this->dbforge->keys = $fieldAttributes['name'];
                                    $id_table = $fieldAttributes['name'];
                                }
                            }
                        }
                    }
                }
            }

            if(isset($data['foreign-key'])){
                if(isset($data['foreign-key'][0])){
                    $fk_keys = array();
                    foreach ($data['foreign-key'] as $k => $fk_params) {
                        if(is_numeric($k)) {
                            if(isset($fk_params['@attributes']) && isset($fk_params['reference']['@attributes'])) {
                                $fk_attributes = $fk_params['@attributes'];
                                $fk_reference = $fk_params['reference']['@attributes'];
                                $fk_keys[] = array(
                                    $fk_attributes['name'] => array(
                                        'table' => $fk_attributes['foreignTable'],
                                        'idLocal' => $fk_reference['local'],
                                        'idForeign' => $fk_reference['foreign']
                                    )
                                );
                            }
                        }
                    }
                } else {
                    $fk_attributes = $data['foreign-key']['@attributes'];
                    $fk_reference = $data['foreign-key']['reference']['@attributes'];
                    $fk_keys[] = array(
                        $fk_attributes['name'] => array(
                            'table' => $fk_attributes['foreignTable'],
                            'idLocal' => $fk_reference['local'],
                            'idForeign' => $fk_reference['foreign']
                        )
                    );
                }
                $this->migration->_keys = $fk_keys;
            } else {
                $this->migration->_keys = [];
            }

            $_POST['bReset'] = true;
            $this->dbforge->fields = $fields;
            $this->migration->_id_table = $id_table;

            list($mod,$submod) = getModSubMod($tableAttributes['name']);
            if($modInit != $mod){
                $migIndex = 0;
                $modInit = $mod;
            }

            $migIndex++;
            $strMigIndex = str_pad("$migIndex", 3, "0", STR_PAD_LEFT);
            $this->migration->add_migration_index($strMigIndex);
            if($this->migration->set_params($tableAttributes['name'])){
                $this->migration->create_migration();
            }
        }
    }

    public function fromdatabase()
    {
        $tables = $this->dbforge->getArrayFieldsFromTables();
        $migIndex = 1;
        $modInit = '';
        $submodInit = '';
        foreach ($tables as $name => $fields){
            $tableSettings = $this->dbforge->getArrayTablesSettingsFromDB($name);
            $tablePrimaryKey = $this->dbforge->getPrimaryKeyFromTable($name);
            $tableName = $name;
            $tableFields = $fields;
            list($mod,$submod) = getModSubMod($tableName);
            if($modInit != $mod){
                $migIndex = 1;
                $modInit = $mod;
            }
            $strMigIndex = str_pad("$migIndex", 3, "0", STR_PAD_LEFT);
            $fileName = $strMigIndex."_create_$tableName.php";
            $tableRelations = $this->dbforge->getTableRelations($name);
            $tableSettings['ctrl'] = isset($tableSettings['ctrl']) ? $tableSettings['ctrl'] : TRUE;
            $tableSettings['model'] = isset($tableSettings['model']) ? $tableSettings['model'] : TRUE;
            $tableSettings['views'] = isset($tableSettings['views']) ? $tableSettings['views'] : TRUE;
            $this->data["userCreated"] = config_item('soft_user');
            $this->data["dateCreated"] = date('d/m/Y');
            $this->data["timeCreated"] = date("g:i a");
            $this->data["tablePrimaryKey"] = $tablePrimaryKey;
            $this->data["tableName"] = $tableName;
            $this->data["tableFields"] = var_export($tableFields,true);
            $this->data["tableRelations"] = var_export($tableRelations,true);
            $this->data["tableSettings"] = var_export($tableSettings,true);
            $phpContent = $this->load->view("template_migrations",$this->data, true, true);
            $framePath = ($mod == "ci" ? BASEPATH : APPPATH)."migrations/";
            if ($this->migration->create_folder($framePath)) {
                if ($this->migration->create_folder($framePath."tables/")) {
                    if ($this->migration->create_folder($framePath."tables/$mod")) {
                        $this->migration->write_file($framePath."tables/$mod/$fileName",$phpContent);
                    }
                }
            }
            $migIndex++;
        }
    }
}