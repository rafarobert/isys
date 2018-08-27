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
    public $tab_excepts;
    public $sys;

    function __construct(){
        parent::__construct();
        $this->data['subLayout'] = '';
        $this->load->library('migration');
        $this->tab_excepts = config_item('tab_excepts');
        $this->sys = config_item('sys');

        set_time_limit(300);

    }

    public function run($frame = 0, $funct = 0, $modulo = 0, $submod = 0)
    {
        $migrations_errors = array();
        $migration_error = '';
        $it_worked = false;
//        $sys = array_keys(config_item('sys'));

        //*************************************************************
        //******* si se hace la reescritura por defecto ***************
        //*************************************************************
//        if ($funct == 'set') {
//            $_POST['bReset'] = false;
//        } else if ($funct == 'reset') {
//            $_POST['bReset'] = true;
//        }

        $migrations = $this->migration->_migration_files;

        if($modulo == 'fromdatabase'){
            $this->fromdatabase();
            $it_worked = true;
        }

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

        // Update database map for loading of classes
        $this->setTableTrait();

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

    public function setTableTrait(){
        $aDBTables = $this->dbforge->getArrayDBTables();
        $this->data = $this->setDefaultData($this->data);
        $fileName = "ES_Table_Trait.php";
        $framePath = "orm/map/";
        $this->data['setInitFunctions'] = '';
        foreach ($aDBTables as $key => $dbTable) {
            if(!in_array($dbTable, $this->tab_excepts)){
                list($mod, $table) = getModSubMod($dbTable);
                list($tableS, $tableP) = setSubModSingularPlural($table);
                $this->data['lcMod'] = $lcMod = lcfirst($this->sys[$mod]['name']);
                $this->data['UcMod'] = $ucMod = ucfirst($this->sys[$mod]['name']);
                $this->data['lcTableP'] = lcfirst($tableP);
                $this->data['UcTableP'] = ucfirst($tableP);
                $this->data['setInitFunctions'] .= $this->load->view(["template_ES_Trait" => "setInitFunctions"], $this->data, true, true);
            }
        }
        if (createFolder($framePath)) {
            $phpContent = $this->load->view("template_ES_Trait", $this->data, true, true, true);
            if(file_exists($framePath . $fileName)){
                deleteFile($framePath . $fileName);
            }
            write_file($framePath . $fileName, $phpContent);
        }
    }

    public function setTableVars()
    {
        $aDBTables = $this->dbforge->getArrayDBTables();
        $this->data = $this->setDefaultData($this->data);
        $fileName = "ES_Table_Vars.php";
        $framePath = "orm/map/";
        $this->data['setInitStaticTableVars'] = '';
        unset($this->data['tableFields']);
        foreach ($aDBTables as $key => $dbTable) {
            if(!in_array($dbTable, $this->tab_excepts)){
                list($mod, $table) = getModSubMod($dbTable);
                list($tableS, $tableP) = setSubModSingularPlural($table);
                $this->data['lcAcMod'] = $lcAcMod = lcfirst($mod);
                $this->data['UcAcMod'] = $lcAcMod = ucfirst($mod);
                $this->data['lcTableP'] = lcfirst($tableP);
                $this->data['UcTableP'] = ucfirst($tableP);
                $this->data['setInitStaticTableVars'] .= $this->load->view(["template_ES_Table_Vars" => "setInitStaticTableVars"], $this->data, true, true);
            }
        }

        if (createFolder($framePath)) {
            $phpContent = $this->load->view("template_ES_Table_Vars", $this->data, true, true, true);
            if(file_exists($framePath . $fileName)){
                deleteFile($framePath . $fileName);
            }
            write_file($framePath . $fileName, $phpContent);
        }
    }

    public function setDefaultData($data){
        $database = ucfirst($this->db->database);
        $data['dbName'] = $database;
        $data["userCreated"] = config_item('soft_user');
        $data["dateCreated"] = date('d/m/Y');
        $data["timeCreated"] = date("g:i a");
        return $data;
    }

    public function fromdatabase()
    {
        $tables = $this->dbforge->getArrayFieldsFromTable();
        $migIndex = 1;
        $modInit = '';
        $submodInit = '';
        $framePath = "orm/migrations/";
        unset($tables['migrations']);
        // ***************** refresh *********************
//        rrmdir('orm/migrations');
        // ***************** creating migrations ********************
        if (createFolder($framePath."tables/")) {
            rrmdir($framePath."tables/");
            createFolder($framePath."tables/");
        }
        foreach ($tables as $name => $fields){
            foreach ($fields as $fieldName => $fieldValues){
                $aJsonFields = $this->dbforge->getFieldCommentsFromDB($fieldName,$name);
                if(validateVar($aJsonFields, 'array')){
                    foreach ($aJsonFields as $jsonKey => $dataJson){
                        if($jsonKey == 'options' && validateVar($dataJson, 'array')){
                            foreach ($dataJson as $key => $value){
                                unset($aJsonFields[$jsonKey][$key]);
                                $aJsonFields[$jsonKey][strtolower($value)] = $value;
                            }
                        }
                    }
                }
                if($aJsonFields != null){
                    $fields[$fieldName] = array_merge($fields[$fieldName], $aJsonFields);
                }
            }
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
            if (createFolder($framePath)) {
                if (createFolder($framePath."tables/")) {
                    if (createFolder($framePath."tables/$mod")) {
                        write_file($framePath."tables/$mod/$fileName",$phpContent);
                    }
                }
            }
            $migIndex++;
        }
        $this->setTableVars();
//        dump(shell_exec('composer update'));
        echo "All migration has been worked";
    }
}