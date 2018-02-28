<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author    EllisLab Dev Team
 * @copyright    Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright    Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license    http://opensource.org/licenses/MIT	MIT License
 * @link    https://codeigniter.com
 * @since    Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Migration Class
 *
 * All migrations should implement this, forces up() and down() and gives
 * access to the CI super-global.
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Libraries
 * @author        Reactor Engineers
 * @link
 *
 * @property CI_DB_query_builder $db              This is the platform-independent base Active Record implementation class.
 * @property CI_DB_forge $dbforge                 Database Utility Class
 * @property CI_Benchmark $benchmark              This class enables you to mark points and calculate the time difference between them.<br />  Memory consumption can also be displayed.
 * @property CI_Calendar $calendar                This class enables the creation of calendars
 * @property CI_Cart $cart                        Shopping Cart Class
 * @property CI_Config $config                    This class contains functions that enable config files to be managed
 * @property CI_Controller $controller            This class object is the super class that every library in.<br />CodeIgniter will be assigned to.
 * @property CI_Email $email                      Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encrypt $encrypt                  Provides two-way keyed encoding using XOR Hashing and Mcrypt
 * @property CI_Exceptions $exceptions            Exceptions Class
 * @property CI_Form_validation $form_validation  Form Validation Class
 * @property CI_Ftp $ftp                          FTP Class
 * @property CI_Hooks $hooks                      Provides a mechanism to extend the base system without hacking.
 * @property CI_Image_lib $image_lib              Image Manipulation class
 * @property CI_Input $input                      Pre-processes global input data for security
 * @property CI_Lang $lang                        Language Class
 * @property CI_Loader $load                      Loads views and files
 * @property CI_Log $log                          Logging Class
 * @property CI_Model $model                      CodeIgniter Model Class
 * @property CI_Output $output                    Responsible for sending final output to browser
 * @property CI_Pagination $pagination            Pagination Class
 * @property CI_Parser $parser                    Parses pseudo-variables contained in the specified template view,<br />replacing them with the data in the second param
 * @property CI_Profiler $profiler                This class enables you to display benchmark, query, and other data<br />in order to help with debugging and optimization.
 * @property CI_Router $router                    Parses URIs and determines routing
 * @property CI_Session $session                  Session Class
 * @property CI_Sha1 $sha1                        Provides 160 bit hashing using The Secure Hash Algorithm
 * @property CI_Table $table                      HTML table generation<br />Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback              Trackback Sending/Receiving Class
 * @property CI_Typography $typography            Typography Class
 * @property CI_Unit_test $unit_test              Simple testing class
 * @property CI_Upload $upload                    File Uploading Class
 * @property CI_URI $uri                          Parses URIs and determines routing
 * @property CI_User_agent $user_agent            Identifies the platform, browser, robot, or mobile devise of the browsing agent
 * @property CI_Validation $validation            //dead
 * @property CI_Xmlrpc $xmlrpc                    XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                  XML-RPC server class
 * @property CI_Zip $zip                          Zip Compression Class
 * @property CI_Javascript $javascript            Javascript Class
 * @property CI_Jquery $jquery                    Jquery Class
 * @property CI_Utf8 $utf8                        Provides support for UTF-8 environments
 * @property CI_Security $security                Security Class, xss, csrf, etc...
 */
class CI_Migration
{
    protected $CI;

    public $settings;
    public $_ext_php = '.php';
    public $_ext_txt = '.txt';
    public $_ext_js = '.js';
    public $_mod;
    public $_mvc = 'ctrl';
    public $_sub_mod;
    public $_sub_mod_p;
    public $_sub_mod_s;
    public $_mod_type;
    public $_fields;
    public $_keys;
    public $_table_name;
    public $_id_table;
    public $_sub_mod_ctrl;
    public $_sub_mod_model;

    public $_dir_root_mod;
    public $_dir_root_store;
    public $_dir_migrations_files = APPPATH . "migrations/tables/";
    public $_base_path = APPPATH;
    public $_dir_migrations = '';

    public $_dir_sub_mod;
    public $_dir_sub_mod_views;
    public $_dir_sub_mod_views_content;
    public $_dir_migration;
    public $_dir_mod_migration;
    public $_dir_mod;
    public $_dir_mod_mac;

    public $_file_migration_index = 0;

    public $_file_sub_mod_ctrl;
    public $_file_sub_mod_model;
    public $_file_sub_mod_view_index;
    public $_file_sub_mod_view_edit;
    public $_file_sub_mod_view_cnt;
    public $_file_sub_mod_view_lib;
    public $_file_migration;

    public $_dir_sub_mod_migrate_views;

    public $_dir_sto_sub_mod;
    public $_dir_sto_sub_mod_views;
    public $_dir_sto_sub_mod_views_content;
    public $_dir_sto_migration;
    public $_dir_sto_mod_migration;
    public $_dir_sto_mod;
    public $_dir_sto_mod_mac;

    public $_file_sto_sub_mod_ctrl;
    public $_file_sto_sub_mod_model;
    public $_file_sto_sub_mod_view_index;
    public $_file_sto_sub_mod_view_edit;
    public $_file_sto_sub_mod_view_cnt;
    public $_file_sto_sub_mod_view_lib;
    public $_file_sto_migration;

    public $_migration_files = [];
    public $bReset;

    /**
     * Whether the library is enabled
     *
     * @var bool
     */
    protected $_migration_enabled = FALSE;

    /**
     * Migration numbering type
     *
     * @var    bool
     */
    protected $_migration_type = 'sequential';

    /**
     * Path to migration classes
     *
     * @var string
     */
    protected $_migration_path = NULL;

    /**
     * Path to migration classes
     *
     * @var string
     */
    protected $_dir_migration_tables = NULL;

    /**
     * Current migration version
     *
     * @var mixed
     */
    public $_migration_version = 0;

    /**
     * Database table with migration info
     *
     * @var string
     */
    protected $_migration_table = 'migrations';

    /**
     * Whether to automatically run migrations
     *
     * @var    bool
     */
    protected $_migration_auto_latest = FALSE;

    /**
     * Migration basename regex
     *
     * @var string
     */
    protected $_migration_regex;

    /**
     * Error message
     *
     * @var string
     */
    protected $_error_string = '';

    /**
     * Initialize Migration Class
     *
     * @param    array $config
     * @return    void
     */
    public function __construct($config = array())
    {
        $this->CI = CI_Controller::get_instance();

        // Only run this constructor on main library load
        if (!in_array(get_class($this), array('CI_Migration', config_item('subclass_prefix') . 'Migration'), TRUE)) {
            return;
        }

        foreach ($config as $key => $val) {
            $this->{'_' . $key} = $val;
        }

        $this->verifyAppOrBase();

        log_message('info', 'Migrations Class Initialized');

        // Are they trying to use migrations while it is disabled?
        if ($this->_migration_enabled !== TRUE) {
            show_error('Migrations has been loaded but is disabled or set up incorrectly.');
        }

        // If not set, set it
        $this->_migration_path !== '' OR $this->_migration_path = $this->_base_path . 'migrations/';
        // Add trailing slash if not set
        $this->_migration_path = rtrim($this->_migration_path, '/') . '/';

        // If not set, set it - TIC

        $this->_dir_migration_tables = config_item('dirMigrationFiles');

        // Load migration language
        $this->lang->load('migration');

        // They'll probably be using dbforge
        $this->load->dbforge();

        // Make sure the migration table name was set.
        if (empty($this->_migration_table)) {
            show_error('Migrations configuration file (migration.php) must have "migration_table" set.');
        }

        // Migration basename regex
        $this->_migration_regex = ($this->_migration_type === 'timestamp')
            ? '/^\d{14}_(\w+)$/'
            : '/^\d{3}_(\w+)$/';

        // Make sure a valid migration numbering type was set.
        if (!in_array($this->_migration_type, array('sequential', 'timestamp'))) {
            show_error('An invalid migration numbering type was specified: ' . $this->_migration_type);
        }

        if($this->_migration_files == null){
            $this->_migration_files = $this->find_migrations();
            $this->CI->migrationFiles = $this->_migration_files;
        }


        // If the migrations table is missing, make it
        if (!$this->db->table_exists($this->_migration_table)) {
            $this->dbforge->add_field(array(
                'version' => array('type' => 'BIGINT', 'constraint' => 20),
            ));

            $this->dbforge->create_table($this->_migration_table, TRUE);

            $this->db->insert($this->_migration_table, array('version' => 0));
        }

        // Do we auto migrate to the latest migration?
        if ($this->_migration_auto_latest === TRUE && !$this->latest()) {
            show_error($this->error_string());
        }
    }

    // --------------------------------------------------------------------

    /**
     * Migrate to a schema version
     *
     * Calls each migration step required to get to the schema version of
     * choice
     *
     * @param    string $target_version Target schema version
     * @return    mixed    TRUE if no migrations are found, current version string on success, FALSE on failure
     */
    public function version($target_version, $mod = '')
    {
        // Note: We use strings, so that timestamp versions work on 32-bit systems
        $current_version = $this->_get_version();

        if ($this->_migration_type === 'sequential') {
            $target_version = sprintf('%03d', $target_version);
        } else {
            $target_version = (string)$target_version;
        }

        if($mod != ''){
            $mod = (string)$mod;
        }

        $migrations = $this->_migration_files;

        if($mod != ''){
            if(isset($migrations[$mod][$target_version])){
                if ($target_version > 0 && ! isset($migrations[$mod][$target_version])) {
                    $this->_error_string = sprintf($this->lang->line('migration_not_found'), $target_version);
                    return FALSE;
                }
            }
        } else {
            if ($target_version > 0 && ! isset($migrations[$target_version]))
            {
                $this->_error_string = sprintf($this->lang->line('migration_not_found'), $target_version);
                return FALSE;
            }

        }

        if ($target_version > $current_version) {
            $method = 'up';
        } elseif ($target_version < $current_version) {
            $method = 'down';
            // We need this so that migrations are applied in reverse order
            if($mod != ''){
                krsort($migrations[$mod]);
            } else {
                krsort($migrations);
            }

        } else {
            // Well, there's nothing to migrate then ...
            return TRUE;
        }

        // Validate all available migrations within our target range.
        //
        // Unfortunately, we'll have to use another loop to run them
        // in order to avoid leaving the procedure in a broken state.
        //
        // See https://github.com/bcit-ci/CodeIgniter/issues/4539
        $pending = array();
        foreach ($migrations[$mod] as $number => $file) {
            // Ignore versions out of our range.
            //
            // Because we've previously sorted the $migrations array depending on the direction,
            // we can safely break the loop once we reach $target_version ...
            if ($method === 'up') {
                if ($number <= $current_version) {
                    continue;
                } elseif ($number > $target_version) {
                    break;
                }
            } else {
                if ($number > $current_version) {
                    continue;
                } elseif ($number <= $target_version) {
                    break;
                }
            }

            // Check for sequence gaps
            if ($this->_migration_type === 'sequential') {
                if (isset($previous) && abs($number - $previous) > 1) {
                    $this->_error_string = sprintf($this->lang->line('migration_sequence_gap'), $number);
                    return FALSE;
                }

                $previous = $number;
            }

            include_once($file);
            $class = 'Migration_' . ucfirst(strtolower($this->_get_migration_name(basename($file, '.php'))));

            // Validate the migration file structure
            if (!class_exists($class, FALSE)) {
                $this->_error_string = sprintf($this->lang->line('migration_class_doesnt_exist'), $class);
                return FALSE;
            }
            // method_exists() returns true for non-public methods,
            // while is_callable() can't be used without instantiating.
            // Only get_class_methods() satisfies both conditions.
            elseif (!in_array($method, array_map('strtolower', get_class_methods($class)))) {
                $this->_error_string = sprintf($this->lang->line('migration_missing_' . $method . '_method'), $class);
                return FALSE;
            }

            $pending[$number] = array($class, $method);
        }

        // Now just run the necessary migrations
        foreach ($pending as $number => $migration) {
            log_message('debug', 'Migrating ' . $method . ' from version ' . $current_version . ' to version ' . $number);

            $migration[0] = new $migration[0];
            call_user_func($migration);
            $current_version = $number;
            $this->_update_version($current_version);
        }

        // This is necessary when moving down, since the the last migration applied
        // will be the down() method for the next migration up from the target
        if ($current_version <> $target_version) {
            $current_version = $target_version;
            $this->_update_version($current_version);
        }

        log_message('debug', 'Finished migrating to ' . $current_version);
        return $current_version;
    }

//    /**
//     * Migrate to a schema version
//     *
//     * Calls each migration step required to get to the schema version of
//     * choice
//     *
//     * @param    string $target_version Target schema version
//     * @return    mixed    TRUE if no migrations are found, current version string on success, FALSE on failure
//     */
//    public function version($target_version)
//    {
//        // Note: We use strings, so that timestamp versions work on 32-bit systems
//        $current_version = $this->_get_version();
//
//        if ($this->_migration_type === 'sequential') {
//            $target_version = sprintf('%03d', $target_version);
//        } else {
//            $target_version = (string)$target_version;
//        }
//
//        $migrations = $this->find_migrations();
//
//        if ($target_version > 0 && !isset($migrations[$target_version])) {
//            $this->_error_string = sprintf($this->lang->line('migration_not_found'), $target_version);
//            return FALSE;
//        }
//
//        if ($target_version > $current_version) {
//            $method = 'up';
//        } elseif ($target_version < $current_version) {
//            $method = 'down';
//            // We need this so that migrations are applied in reverse order
//            krsort($migrations);
//        } else {
//            // Well, there's nothing to migrate then ...
//            return TRUE;
//        }
//
//        // Validate all available migrations within our target range.
//        //
//        // Unfortunately, we'll have to use another loop to run them
//        // in order to avoid leaving the procedure in a broken state.
//        //
//        // See https://github.com/bcit-ci/CodeIgniter/issues/4539
//        $pending = array();
//        foreach ($migrations as $number => $file) {
//            // Ignore versions out of our range.
//            //
//            // Because we've previously sorted the $migrations array depending on the direction,
//            // we can safely break the loop once we reach $target_version ...
//            if ($method === 'up') {
//                if ($number <= $current_version) {
//                    continue;
//                } elseif ($number > $target_version) {
//                    break;
//                }
//            } else {
//                if ($number > $current_version) {
//                    continue;
//                } elseif ($number <= $target_version) {
//                    break;
//                }
//            }
//
//            // Check for sequence gaps
//            if ($this->_migration_type === 'sequential') {
//                if (isset($previous) && abs($number - $previous) > 1) {
//                    $this->_error_string = sprintf($this->lang->line('migration_sequence_gap'), $number);
//                    return FALSE;
//                }
//
//                $previous = $number;
//            }
//
//            include_once($file);
//            $class = 'Migration_' . ucfirst(strtolower($this->_get_migration_name(basename($file, '.php'))));
//
//            // Validate the migration file structure
//            if (!class_exists($class, FALSE)) {
//                $this->_error_string = sprintf($this->lang->line('migration_class_doesnt_exist'), $class);
//                return FALSE;
//            }
//            // method_exists() returns true for non-public methods,
//            // while is_callable() can't be used without instantiating.
//            // Only get_class_methods() satisfies both conditions.
//            elseif (!in_array($method, array_map('strtolower', get_class_methods($class)))) {
//                $this->_error_string = sprintf($this->lang->line('migration_missing_' . $method . '_method'), $class);
//                return FALSE;
//            }
//
//            $pending[$number] = array($class, $method);
//        }
//
//        // Now just run the necessary migrations
//        foreach ($pending as $number => $migration) {
//            log_message('debug', 'Migrating ' . $method . ' from version ' . $current_version . ' to version ' . $number);
//
//            $migration[0] = new $migration[0];
//            call_user_func($migration);
//            $current_version = $number;
//            $this->_update_version($current_version);
//        }
//
//        // This is necessary when moving down, since the the last migration applied
//        // will be the down() method for the next migration up from the target
//        if ($current_version <> $target_version) {
//            $current_version = $target_version;
//            $this->_update_version($current_version);
//        }
//
//        log_message('debug', 'Finished migrating to ' . $current_version);
//        return $current_version;
//    }

    // --------------------------------------------------------------------

    /**
     * Sets the schema to the latest migration
     *
     * @return    mixed    Current version string on success, FALSE on failure
     */
    public function latest()
    {
        $migrations = $this->find_migrations();

        if (empty($migrations)) {
            $this->_error_string = $this->lang->line('migration_none_found');
            return FALSE;
        }

        $last_migration = basename(end($migrations));

        // Calculate the last migration step from existing migration
        // filenames and proceed to the standard version migration
        return $this->version($this->_get_migration_number($last_migration));
    }

    // --------------------------------------------------------------------

    /**
     * Sets the schema to the migration version set in config
     *
     * @return    mixed    TRUE if no migrations are found, current version string on success, FALSE on failure
     */
    public function current()
    {
        return $this->version($this->_migration_version);
    }

    // --------------------------------------------------------------------

    /**
     * Error string
     *
     * @return    string    Error message returned as a string
     */
    public function error_string()
    {
        return $this->_error_string;
    }

    // --------------------------------------------------------------------

    /**
     * Retrieves list of available migration scripts
     *
     * @return    array    list of migration file paths sorted by version
     */
    public function find_migrations($bWithSubModules = true)
    {
        $migrations = array();
        if($this->_dir_migration_tables == null){
            $this->_dir_migration_tables = config_item('dirMigrationTables');
        }

        if($bWithSubModules){
            $sys_config = config_item('sys');
            foreach ($sys_config as $mod => $setting){
                foreach ($this->_dir_migration_tables as $dir){
                    foreach (glob($dir . $mod . '/' . '*_*.php') as $file) {
                        $name = basename($file, '.php');

                        // Filter out non-migration files
                        if (preg_match($this->_migration_regex, $name)) {
                            $number = $this->_get_migration_number($name);

                            // There cannot be duplicate migration numbers
                            if (isset($migrations[$mod][$number])) {
                                $this->_error_string = sprintf($this->lang->line('migration_multiple_version'), $number);
                                show_error($this->_error_string);
                            }

                            $migrations[$mod][$number] = $file;
                        }
                    }
                }
            }
        } else {
            foreach (glob($this->_migration_path . '*_*.php') as $file) {
                $name = basename($file, '.php');

                // Filter out non-migration files
                if (preg_match($this->_migration_regex, $name)) {
                    $number = $this->_get_migration_number($name);

                    // There cannot be duplicate migration numbers
                    if (isset($migrations[$number])) {
                        $this->_error_string = sprintf($this->lang->line('migration_multiple_version'), $number);
                        show_error($this->_error_string);
                    }

                    $migrations[$number] = $file;
                }
            }
        }
        ksort($migrations);
        return $migrations;
    }

    // --------------------------------------------------------------------

    /**
     * Extracts the migration number from a filename
     *
     * @param    string $migration
     * @return    string    Numeric portion of a migration filename
     */
    protected function _get_migration_number($migration)
    {
        return sscanf($migration, '%[0-9]+', $number)
            ? $number : '0';
    }

    // --------------------------------------------------------------------

    /**
     * Extracts the migration class name from a filename
     *
     * @param    string $migration
     * @return    string    text portion of a migration filename
     */
    protected function _get_migration_name($migration)
    {
        $parts = explode('_', $migration);
        array_shift($parts);
        return implode('_', $parts);
    }

    // --------------------------------------------------------------------

    /**
     * Retrieves current schema version
     *
     * @return    string    Current migration version
     */
    protected function _get_version()
    {
        $row = $this->db->select('version')->get($this->_migration_table)->row();
        return $row ? $row->version : '0';
    }

    // --------------------------------------------------------------------

    /**
     * Stores the current schema version
     *
     * @param    string $migration Migration reached
     * @return    void
     */
    protected function _update_version($migration)
    {
        $this->db->update($this->_migration_table, array(
            'version' => $migration
        ));
    }

    // --------------------------------------------------------------------

    /**
     * Enable the use of CI super-global
     *
     * @param    string $var
     * @return    mixed
     */
    public function __get($var)
    {
        return get_instance()->$var;
    }

    // ************************************************************************************************
    // ********************* Se agrego para la crecion dinamica de los modulos ************************
    // ************************************************************************************************

    public function create_or_alter_table($tableLocal)
    {
        $exists = false;

        if(count($this->dbforge->fields) < 1){
            header("Refresh:0");
        }
        // =========================== La Construccion de keys y fields debe estar al inicio ======================
        $this->_keys = $this->dbforge->keys;
        $this->_fields = $this->dbforge->fields;
        // ================================================= o =================================================
        if ($this->db->table_exists($tableLocal)) {
            $actual_table = $this->save_or_update_table($tableLocal);
        } else {
            $this->dbforge->create_table($tableLocal);
            if(isset($this->_keys)){
                $this->_update_indexes_foreignKeys($this->_keys, $this->_fields, $tableLocal);
            }
        }

        $this->set_params($tableLocal);
    }

    public function start($id_migration, $bForce_update = false)
    {
        // *************************************************************
        // Crea la tabla migration si no existe en la base de datos
        // *************************************************************
        $this->CI->dbforge->primary_keys = [];
        $_REQUEST['id_migration'] = $id_migration;
        if ($this->db->table_exists('migrations')) {
            if($this->db->table_exists('migrations')){
                $oMigrations = $this->db->get('migrations')->result();
            } else {
                header("Refresh:0");
            }

            if (count($oMigrations) > 1) {
                $this->dbforge->drop_table('migrations');
                header("Refresh:0");
            } else if (isset($oMigrations[0])) {

                $this->db->query('DELETE FROM `migrations` WHERE `version`=' . $oMigrations[0]->version);
                $this->db->query('INSERT INTO `migrations`(`version`) VALUES (' . intval($id_migration - 1) . ')');
            } else {
                $this->db->query('INSERT INTO `migrations`(`version`) VALUES (' . intval($id_migration - 1) . ')');
            }
        } else {

            $fields = array(
                'version' => array(
                    'type' => 'bigint',
                    'constraint' => '20',
                ),
            );
            if (method_exists($this, 'add_field')) {
                $this->dbforge->add_field($fields);
                $this->dbforge->create_table('migrations');
            }
        }
    }

    public function save_or_update_table($tableLocal)
    {
        $actual_table = json_decode(json_encode($this->db->field_data($tableLocal)), true);

        $new_table = $this->dbforge->fields;

        $actual_table = $this->verify_columns_deleted($actual_table, $new_table, $tableLocal);

        list($new_table, $actual_table) = $this->verify_migration_table($actual_table, $new_table, $tableLocal);

        list($new_table, $actual_table) = $this->order_migration_table($actual_table, $new_table, $tableLocal);

        $this->dbforge->fields = $new_table;

        return $actual_table;
    }

    public function verify_columns_deleted($actual_table, $new_table, $tableLocal)
    {
        $keys = $this->dbforge->keys;
        $existe = false;
        foreach ($actual_table as $keyA => $valueA)
        {
            foreach ($new_table as $keyN => $valueN)
            {
                if ($valueA['name'] == $keyN) {
                    $existe = true;
                    break;
                } else {
                    $existe = false;
                }
            }
            if (!$existe)
            {
                $this->_update_indexes_foreignKeys($keys, $new_table, $tableLocal);
                $this->dbforge->drop_column($tableLocal, $valueA['name']);
                array_splice($actual_table, $keyA, 1);
            }
        }
        return $actual_table;
    }

    public function verify_migration_table($actual_table, $new_table, $tableLocal)
    {
        $keys = $this->dbforge->keys;
        $new_table_b = $new_table;
        // ***********************************************************
        // Se convierte la nueva tabla en base a la tabla ya existente
        // ************************************************************

        $table_converted = array();
        $i = 0;
        foreach ($new_table as $keyN => $valueN) {
            $table_converted[$i] = $valueN;
            $table_converted[$i]['name'] = $keyN;
            $i++;
        }
        $new_table = $table_converted;

        // **************************************************************************
        // Se obtiene los nombres de la nueva y actual tabla para ver las diferencias
        // **************************************************************************

        $fields_new_table = array_column($new_table, 'name');
        $fields_actual_table = array_column($actual_table, 'name');

        $diffs = array_diff($fields_new_table, $fields_actual_table);

        if (count($diffs)) {
            foreach ($diffs as $key => $field) {
                $auto_increment = false;
                array_push($actual_table, $new_table[$key]);
                $aField = array($field => $new_table[$key]);
                if (explode('_', $field)[0] == 'id') {
                    if (isset($aField[$field]['auto_increment'])) {
                        unset($aField[$field]['auto_increment']);
                        $auto_increment = true;
                    }
                }

                unset($aField[$field]['name']);
                $this->dbforge->fields = $aField;
                if (!$this->db->field_exists($field, $tableLocal)) {
                    $this->dbforge->add_column($tableLocal, $aField);
                }
                $this->_update_primary_key($field, $actual_table, $tableLocal, $auto_increment);

                if(isset($keys)){
                    $this->_update_indexes_foreignKeys($keys, $new_table_b, $tableLocal);
                }
            }
        }

        // **********************************************************************
        // Entra si se cambio algun parametro en las propiedades de cada columna
        // **********************************************************************

        foreach ($new_table as $key => $value) {
            $params_nuevos = array_keys($value);
            $params_actual = array_keys($actual_table[$key]);
            $diffs = array_diff($params_nuevos, $params_actual);
            if (count($diffs)) {
                $aField = array($value['name'] => $new_table[$key]);
                unset($aField[$value['name']]['name']);
                $this->dbforge->fields = $aField;
                if ($this->db->field_exists($aField, $tableLocal)) {
                    $this->dbforge->modify_column($tableLocal, $aField);
                }
            }
        }
        return [$new_table, $actual_table];
    }

    public function order_migration_table($actual_table, $new_table, $tableLocal)
    {
        $columnsT1 = array_column($new_table, 'name');
        $columnsT2 = array_column($actual_table, 'name');
        $namesT1 = array_flip($columnsT1);
        $namesT2 = array_flip($columnsT2);

        $namesT2 = array_replace($namesT1, $namesT2);
        $nuevo_orden = array();

        foreach ($namesT2 as $key => $value) {
            $nuevo_orden[] = $actual_table[$value];
        }
        $actual_table = $nuevo_orden;

        $nuevo_orden = array();
        foreach ($new_table as $key => $value) {
            $nuevo_orden[$value['name']] = $value;
            unset($nuevo_orden[$value['name']]['name']);
        }
        $new_table = $nuevo_orden;

        return [$new_table, $actual_table];
    }

    public function set_SubMod_Plural_Singular($sub_mod)
    {
        $names = explode('_', $sub_mod);
        $namesPlural = [];
        $namesSingular = [];
        foreach ($names as $name) {
            if (substr($name, strlen($name) - 2, strlen($name)) == 'es') {
                $namesSingular[] = substr($name, 0, strlen($name) - 2);
                $namesPlural[] = $name;
            } else if (substr($name, strlen($name) - 1, strlen($name)) == 's' && substr($name, strlen($name) - 1, strlen($name)) != 'es') {
                $namesSingular[] = substr($name, 0, strlen($name) - 1);
                $namesPlural[] = $name;
            } else {
                $namesSingular[] = $name;
                $namesPlural[] = $name . 's';
            }
        }
        $this->_sub_mod_s = count($namesSingular) > 1 ? implode('_',$namesSingular) : $namesSingular[0];
        $this->_sub_mod_p = count($namesPlural) > 1 ? implode('_',$namesPlural) : $namesPlural[0];

        return true;
    }

    public function set_settings($settings){

        if(count($settings)) {
            $nameModelModules = '';
            $indexMigrationModules = config_item('sys')['ci']['migIndexModules'];

            if(isset($_REQUEST['id_migration'])){
                $id_migration = $_REQUEST['id_migration'];
            } else {
                $oMigrations = $this->db->get('migrations')->result();
                $id_migration = $oMigrations[0]->version + 1 ;
            }

            // *****************************************************************************************
            // ************************* Se crea el Modelo, Vista Controlador **************************
            // *****************************************************************************************
            if(validateArrayVar($settings,'ctrl','array') || validateArrayVar($settings,'ctrl','bool')){
                $this->createCtrl($settings['ctrl']);
            }
            if(validateArrayVar($settings,'model','array') || validateArrayVar($settings,'model','bool')){
                $this->createModel($settings['model']);
            }
            if(validateArrayVar($settings,'views','array') || validateArrayVar($settings,'views','bool')){
                $this->createViewFiles($settings['views']);
            }

            // ******************************************************************************************
            // *********************** Si la tabla modulos existe se agrega el modulo actual*************
            // *********** de lo contrario se redirecciona a la creacion de latabla modulos *************
            // ******************************************************************************************

            if (validate_modulo('base', 'modulos')) {
                $this->load->model("base/model_modulos");
                $oModulos = $this->db->get('ci_modulos')->result_object();
                foreach ($oModulos as $modulo) {
                    if ($modulo->id_modulo == $id_migration) {
                        $exists = true;
                        break;
                    }
                    $exists = false;
                }
                $nameModelModules = "model_modulos";
                list($mod,$submod) = getModSubMod($this->_table_name);
                $data = array(
                    'titulo' => isset($settings['title']) ? $settings['title'] : ucfirst($submod),
                    'icon' => isset($settings['icon']) ? $settings['icon'] : '',
                    'url' => config_item('sys')[$mod]['dir']."$submod",
                    'descripcion' => isset($settings['description']) ? $settings['descripcion'] : '',
                    'status' => isset($settings['status']) ? $settings['status'] : '',
                    'listed' => isset($settings['listed']) ? $settings['listed'] : '',
                    'id_user_created' => $this->getIdUserDefault(),
                    'id_user_modified' => $this->getIdUserDefault()
                );
                if($nameModelModules != '' && $this->_table_name != "ci_modulos"){
                    if(!$exists){
                        $this->{$nameModelModules}->save($data,null,$id_migration);
                    } else {
                        $this->{$nameModelModules}->save($data,$id_migration);
                    }
                }

            } else if ($this->_table_name != "ci_modulos") {
                $redirect = "migrate/set/ci/$indexMigrationModules";
            }
        }
    }

    public function set_params($tableLocal)
    {
        if(!in_array($tableLocal,config_item('tables_mvc_excepted'))){

            list($modulo, $sub_modulo) = getModSubMod($tableLocal);

            if (isset(config_item('sys')[$modulo])) {
                $mod_dir = config_item('sys')[$modulo]['dir'];
                $mod_name = config_item('sys')[$modulo]['name'];
            } else {
                // TODO: verificar cuado existan nuevos modulos...
            }

            $this->set_SubMod_Plural_Singular($sub_modulo);
            $this->verifyAppOrBase();

            $this->_id_table = $this->_id_table == null ? $this->dbforge->getPrimaryKeyFromTable($tableLocal) : $this->_id_table;

            $this->_mod = $mod_name;
            $this->_sub_mod = $sub_modulo;
            $this->_mod_type = $modulo;
            $this->_table_name = $tableLocal;
            $this->_fields = $this->dbforge->fields != [] ? $this->dbforge->fields : ($this->_fields == [] ? header("Refresh:0") : $this->_fields);
            $this->_sub_mod_ctrl = 'Ctrl_' . ucfirst($sub_modulo) . $this->_ext_php;
            $this->_sub_mod_model = 'Model_' . ucfirst($sub_modulo) . $this->_ext_php;

            $this->_dir_root_mod = $this->_base_path. 'modules/';
            $this->_dir_sub_mod_migrate_views = $this->_base_path. 'migrations/migrate/views/';

            // ************************************************************************
            // ************* Directorios para la carpeta modules dentro de APP ********
            // ************************************************************************

            $this->_dir_sub_mod = $this->_dir_root_mod . $mod_name . '/' . $sub_modulo . '/';
            $this->_dir_sub_mod_views = $this->_dir_root_mod . $mod_name . '/' . $sub_modulo . '/views/';
            $this->_dir_sub_mod_views_content = $this->_dir_sub_mod_views . 'content/';
            $this->_dir_mod = $this->_dir_root_mod . $mod_dir;
            $this->_dir_mod_mac = $this->_dir_root_mod . $mod_name . '/';

            if($this->_mod == 'base' || $this->_mod == 'estic'){
                $this->_dir_migration = BASEPATH . 'migrations/tables/';
                $this->_dir_mod_migration = BASEPATH. 'migrations/tables/'.$this->_mod_type.'/';
            } else {
                $this->_dir_migration = APPPATH. 'migrations/tables/';
                $this->_dir_mod_migration = APPPATH. 'migrations/tables/'.$this->_mod_type.'/';
            }

            $this->_file_sub_mod_ctrl = $this->_dir_sub_mod . 'Ctrl_' . ucfirst($sub_modulo) . $this->_ext_php;
            $this->_file_sub_mod_model = $this->_dir_sub_mod . 'Model_' . ucfirst($sub_modulo) . $this->_ext_php;
            $this->_file_sub_mod_view_index = $this->_dir_sub_mod_views . 'index' . $this->_ext_php;
            $this->_file_sub_mod_view_edit = $this->_dir_sub_mod_views . 'edit' . $this->_ext_php;
            $this->_file_sub_mod_view_lib = $this->_dir_sub_mod_views . 'lib' . $this->_ext_js;
            $this->_file_sub_mod_view_cnt = $this->_dir_sub_mod_views_content . 'index' . $this->_ext_php;
            $this->_file_migration = $this->_dir_mod_migration . $this->_file_migration_index.'_create_'.$this->_mod_type.'_'.$this->_sub_mod_p.$this->_ext_php;

            // ************************************************************************
            // ************* Directorios para la carpeta store de migrations **********
            // ************************************************************************

            $this->_dir_sto_sub_mod = $this->_dir_root_store . $mod_name . '/' . $sub_modulo . '/';
            $this->_dir_sto_sub_mod_views = $this->_dir_root_store . $mod_name . '/' . $sub_modulo . '/modules/';
            $this->_dir_sto_sub_mod_views_content = $this->_dir_sto_sub_mod_views . 'content/';
            $this->_dir_sto_mod = $this->_dir_root_store . $mod_dir;
            $this->_dir_sto_mod_mac = $this->_dir_root_store . $mod_name . '/';
            $this->_dir_sto_migration = $this->_base_path . 'migrations/storage/tables/';
            $this->_dir_sto_mod_migration = $this->_base_path . 'migrations/storage/tables/'.$this->_mod_type.'/';

            $this->_file_sto_sub_mod_ctrl = $this->_dir_sto_sub_mod . 'Ctrl_' . ucfirst($sub_modulo) . $this->_ext_txt;
            $this->_file_sto_sub_mod_model = $this->_dir_sto_sub_mod . 'Model_' . ucfirst($sub_modulo) . $this->_ext_txt;
            $this->_file_sto_sub_mod_view_index = $this->_dir_sto_sub_mod_views . 'index' . $this->_ext_txt;
            $this->_file_sto_sub_mod_view_edit = $this->_dir_sto_sub_mod_views . 'edit' . $this->_ext_txt;
            $this->_file_sto_sub_mod_view_lib = $this->_dir_sto_sub_mod_views . 'lib' . $this->_ext_txt;
            $this->_file_sto_sub_mod_view_cnt = $this->_dir_sto_sub_mod_views_content . 'index' . $this->_ext_txt;
            $this->_file_sto_migration = $this->_dir_sto_mod_migration . $this->_file_migration_index.'_create_'.$this->_mod_type.'_'.$this->_sub_mod_p.$this->_ext_txt;

            // ********************************************************************
            // ************* Se verifica que los campos **********
            // ********************************************************************

            $this->bReset = isset($_POST['bReset']) ? $_POST['bReset'] : false;

            return true;
        } else {
            return false;
        }
    }

    public function update_views_storage()
    {
        $sto_files = $this->get_files_from($this->_dir_sto_sub_mod_views);

        foreach ($sto_files as $key => $value) {

            if ($value != 'index' && $value != 'edit' && $value != 'lib') {

                $this->delete_file($this->_dir_sto_sub_mod_views . $value . '.txt');
            }
        }
    }

    public function set_storage($mvc = null)
    {

        if ($mvc != null) {
            $this->_mvc = $mvc;
        }
        switch ($this->_mvc) {
            case 'ctrl':
                $sto_file = $this->_file_sto_sub_mod_ctrl;
                $mod_file = $this->_file_sub_mod_ctrl;
                $mod_sto_dir = $this->_dir_sto_mod;
                $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                break;
            case 'model':
                $sto_file = $this->_file_sto_sub_mod_model;
                $mod_file = $this->_file_sub_mod_model;
                $mod_sto_dir = $this->_dir_sto_mod;
                $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                break;
            case 'index':
                if ($this->create_folder($this->_dir_sto_sub_mod_views)) {
                    $sto_file = $this->_file_sto_sub_mod_view_index;
                    $mod_file = $this->_file_sub_mod_view_index;
                    $mod_sto_dir = $this->_dir_sto_mod;
                    $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                }
                break;
            case 'edit':
                if ($this->create_folder($this->_dir_sto_sub_mod_views)) {
                    $sto_file = $this->_file_sto_sub_mod_view_edit;
                    $mod_file = $this->_file_sub_mod_view_edit;
                    $mod_sto_dir = $this->_dir_sto_mod;
                    $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                }
                break;
            case 'mig':
                if ($this->create_folder($this->_dir_sto_migration)) {
                    $sto_file = $this->_file_sto_migration;
                    $mod_file = $this->_file_migration;
                    $mod_sto_dir = $this->_dir_sto_migration;
                    $sub_mod_sto_file = $this->_dir_sto_mod_migration;
                }
                break;
            case 'lib':
                if ($this->create_folder($this->_dir_sto_sub_mod_views)) {
                    $sto_file = $this->_file_sto_sub_mod_view_lib;
                    $mod_file = $this->_file_sub_mod_view_lib;
                    $mod_sto_dir = $this->_dir_sto_mod;
                    $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                }
                break;
            case 'cnt':
                if ($this->create_folder($this->_dir_sto_sub_mod_views)) {
                    if($this->create_folder($this->_dir_sto_sub_mod_views_content)){
                        $sto_file = $this->_file_sto_sub_mod_view_cnt;
                        $mod_file = $this->_file_sub_mod_view_cnt;
                        $mod_sto_dir = $this->_dir_sto_mod;
                        $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                    }
                }
                break;
            default:
                if ($this->create_folder($this->_dir_sto_sub_mod_views)) {
                    $sto_file = $this->_dir_sto_sub_mod_views . $this->_mvc . $this->_ext_txt;
                    $mod_file = $this->_dir_sub_mod_views . $this->_mvc . $this->_ext_php;
                    $mod_sto_dir = $this->_dir_sto_mod;
                    $sub_mod_sto_file = $this->_dir_sto_sub_mod;
                }
                break;
        }

        // *************************************************************************************************
        // ********** Se eliminan archivos dentro del folder views/ que no estan en storage ****************
        // *************************************************************************************************

        $files = $this->get_files_from($this->_dir_sub_mod_views);

        $files_sto = $this->get_files_from($this->_dir_sto_sub_mod_views);

        $files_to_delete = array_diff($files_sto, $files);

        foreach ($files_to_delete as $key => $file) {

            $file = $this->_dir_sto_sub_mod_views . $file . $this->_ext_txt;

            $this->delete_file($file);
        }

        // **********************************************************************************************************
        // ********** Se eliminan archivos dentro del folder views/content/ que no estan en storage ****************
        // **********************************************************************************************************

        $files_cnt = $this->get_files_from($this->_dir_sub_mod_views_content);

        $files_sto_cnt = $this->get_files_from($this->_dir_sto_sub_mod_views_content);

        $files_to_delete_cnt = array_diff($files_sto_cnt, $files_cnt);

        foreach ($files_to_delete_cnt as $key => $file) {

            $file = $this->_dir_sto_sub_mod_views . $file . $this->_ext_txt;

            $this->delete_file($file);
        }

        // **************************************************************************************
        // ********** Se crean archivos Modelo Vistas y Controladores en storage ****************
        // **************************************************************************************

        if ($this->create_folder($mod_sto_dir )) {

            if (file_exists($mod_file)) {

                $content = $this->read_file($mod_file);

                if ($this->create_folder($sub_mod_sto_file)) {

                    if ($this->_mvc != 'ctrl' && $this->_mvc != 'model' && $this->_mvc != 'mig') {

                        if (in_array($this->_mvc, $files)) {

                            $this->write_file($sto_file, $content);

                        } else if($this->_mvc == 'cnt') {

                            if (in_array('index', $files_cnt)) {

                                $this->write_file($sto_file, $content);
                            }

                        } else {

                            $this->delete_file($sto_file);
                        }
                    } else {

                        $this->write_file($sto_file, $content);
                    }
                }
            } else {

                if ($this->create_folder($this->_dir_sto_sub_mod)) {

                    if ($this->_mvc != 'ctrl' && $this->_mvc != 'model') {

                        if (in_array($this->_mvc, $files)) {

                            $this->write_file($sto_file, config_item('file_empty'));
                        } else {

                            $this->delete_file($sto_file);
                        }
                    } else {

                        $this->write_file($sto_file, config_item('file_empty'));
                    }
                }
            }
        }
        if (is_file($sto_file)) {

            return true;
        }
    }

    public function createCtrl($options = [])
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    $file = $this->_file_sub_mod_ctrl;

                    if (file_exists($file) && !$this->bReset) {

                        $mensaje = "El Archivo " . $file . " ya fue creado";

                        $content = $this->read_file($file);

                        if ($content == "" || !$content) {

                            $content = $this->getCtrlContent('o'.ucfirst($this->_sub_mod_s));

                            $this->write_file($file, $content);

                        } else {

                            $pos_inicio = strpos($content, config_item('replace_key_start'));

                            $pos_fin = strpos($content, config_item('replace_key_end'));

                            if ($pos_inicio && $pos_fin) {

                                $search_start = substr($content, $pos_inicio);

                                $search_end = substr($content, $pos_fin);

                                $content_added = $this->content_variable_ctrl();

                                $content = str_replace($search_start, $content_added, $content);

                                $content = str_replace(config_item('replace_key_end'), $search_end, $content);

                                $this->write_file($file, $content);
                            }
                        }

                    } else {

                        if (file_exists($this->_file_sto_sub_mod_ctrl) && !$this->bReset) {

                            $storage_content = $this->read_file($this->_file_sto_sub_mod_ctrl);

                            if ($this->verify_backup($storage_content)) {

                                $content = $storage_content;

                            } else {

                                $content = $this->getCtrlContent('o'.ucfirst($this->_sub_mod_s));
                            }

                        } else {

                            $content = $this->getCtrlContent('o'.ucfirst($this->_sub_mod_s));
                        }

                        $this->write_file($file, $content);

                        $mensaje = "El Archivo " . $file . " se ha creado Exitosamente";
                    }
                    $this->set_storage('ctrl');

                    return $content;
                }
            }
        }
        return false;
    }

    public function createModel($options = [])
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    $file = $this->_file_sub_mod_model;

                    if (file_exists($file) && !$this->bReset) {

                        $mensaje = "El Archivo " . $file . " ya fue creado";

                        $content = $this->read_file($file);

                        if ($content == "" || !$content) {

                            $content = $this->getModelContent('o'.ucfirst($this->_sub_mod_s), $options);

                            $this->write_file($file, $content);

                        } else {

                            $pos_inicio_1 = strpos($content, config_item('replace_key_start_1'));
                            $pos_fin_1 = strpos($content, config_item('replace_key_end_1'));
                            if ($pos_inicio_1 && $pos_fin_1) {
                                $search_start_1 = substr($content, $pos_inicio_1);
                                $search_end_1 = substr($content, $pos_fin_1);
                                $content_added_1 = $this->content_variable_model(1);
                                $content = str_replace($search_start_1, $content_added_1, $content);
                                $content = str_replace(config_item('replace_key_end_1'), $search_end_1, $content);
                            }

                            $str_count_pos_start_2 = substr_count($content, config_item('replace_key_start_2'));
                            if ($str_count_pos_start_2 > 1){
                                $contentB = explode(config_item('replace_key_start_2'), $content);
                                $content = $contentB[0];
                                $n = sizeof($contentB);
                                for ($i = 1; $i < sizeof($contentB); $i++) {
                                    $contentB[$i] = config_item('replace_key_start_2') . $contentB[$i];
                                    $pos_inicio_2 = strpos($contentB[$i], config_item('replace_key_start_2'));
                                    $pos_fin_2 = strpos($contentB[$i], config_item('replace_key_end_2'));
                                    if ($pos_inicio_2 >= 0 && $pos_fin_2 >= 0) {
                                        $search_start_2 = substr($contentB[$i], $pos_inicio_2);
                                        $search_end_2 = substr($contentB[$i], $pos_fin_2);
                                        $content_added_2 = $this->content_variable_model(2,[],explode(config_item('replace_key_end_2'),$contentB[$i])[0]);
                                        $contentB[$i] = str_replace($search_start_2, $content_added_2, $contentB[$i]);
                                        $contentB[$i] = str_replace(config_item('replace_key_end_2'), $search_end_2, $contentB[$i]);
                                    }
                                    $content .= $contentB[$i];
                                }
                            } else {
                                $pos_inicio_2 = strpos($content, config_item('replace_key_start_2'));
                                $pos_fin_2 = strpos($content, config_item('replace_key_end_2'));
                                if ($pos_inicio_2 && $pos_fin_2) {
                                    $search_start_2 = substr($content, $pos_inicio_2);
                                    $search_end_2 = substr($content, $pos_fin_2);
                                    $content_added_2 = $this->content_variable_model(2);
                                    $content = str_replace($search_start_2, $content_added_2, $content);
                                    $content = str_replace(config_item('replace_key_end_1'), $search_end_2, $content);
                                }
                            }

                            $pos_inicio_3 = strpos($content, config_item('replace_key_start_3'));
                            $pos_fin_3 = strpos($content, config_item('replace_key_end_3'));
                            if ($pos_inicio_3 && $pos_fin_3) {
                                $search_start_3 = substr($content, $pos_inicio_3);
                                $search_end_3 = substr($content, $pos_fin_3);
                                $content_added_3 = $this->content_variable_model(3);
                                $content = str_replace($search_start_3, $content_added_3, $content);
                                $content = str_replace(config_item('replace_key_end_3'), $search_end_3, $content);
                            }
                            $this->write_file($file, $content);

                        }

                    } else {

                        if (file_exists($this->_file_sto_sub_mod_model) && !$this->bReset) {

                            $storage_content = $this->read_file($this->_file_sto_sub_mod_model);

                            if ($this->verify_backup($storage_content)) {

                                $content = $storage_content;

                            } else {

                                $content = $this->getModelContent('o'.ucfirst($this->_sub_mod_s), $options);
                            }
                        } else {

                            $content = $this->getModelContent('o'.ucfirst($this->_sub_mod_s), $options);
                        }

                        $this->write_file($file, $content);

                        $mensaje = "El Archivo " . $file . " fue creado exitosamente";
                    }
                    $this->set_storage('model');

                    return $content;
                }
            }
        }
        return false;
    }

    public function create_migration()
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_migration)) {

                if ($this->create_folder($this->_dir_mod_migration)) {

                    $file = $this->_file_migration;

                    if (file_exists($file) && !$this->bReset) {

                        $mensaje = "El Archivo " . $file . " ya fue creado";

                        $content = $this->read_file($file);

                        if ($content == "" || !$content) {

                            $content = $this->getMigrationContent('o'.ucfirst($this->_sub_mod_s));

                            $this->write_file($file, $content);

                        } else {

                            $pos_inicio = strpos($content, config_item('replace_key_start'));

                            $pos_fin = strpos($content, config_item('replace_key_end'));

                            if ($pos_inicio && $pos_fin) {

                                $search_start = substr($content, $pos_inicio);

                                $search_end = substr($content, $pos_fin);

                                $content_added = $this->content_variable_migration();

                                $content = str_replace($search_start, $content_added, $content);

                                $content = str_replace(config_item('replace_key_end'), $search_end, $content);

                                $this->write_file($file, $content);
                            }
                        }

                    } else {

                        if (file_exists($this->_file_sto_migration) && !$this->bReset) {

                            $storage_content = $this->read_file($this->_file_sto_migration);

                            if ($this->verify_backup($storage_content)) {

                                $content = $storage_content;

                            } else {

                                $content = $this->getMigrationContent('o'.ucfirst($this->_sub_mod_s));
                            }

                        } else {

                            $content = $this->getMigrationContent('o'.ucfirst($this->_sub_mod_s));
                        }

                        $this->write_file($file, $content);

                        $mensaje = "El Archivo " . $file . " se ha creado Exitosamente";
                    }
                    //$this->set_storage('mig');

                    return $content;
                }
            }
        }
        return false;
    }


    public function createViews($views)
    {
        if ($this->create_folder($this->_dir_mod_view)) {

            foreach ($views as $name => $content) {

                if ($name == 'index') {

                    // TODO: crear de forma dinamica vistas en base a un template de cada modulo
                }
            }
        }
    }

    public function create_view_index()
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    if ($this->create_folder($this->_dir_sub_mod_views)) {

                        // ********************** Para el archivo Index.php *********************

                        $file_index = $this->_file_sub_mod_view_index;

                        if (file_exists($file_index) && !$this->bReset) {

                            $mensaje = "El Archivo " . $file_index . " ya fue creado";

                            $content = $this->read_file($file_index);

                            if ($content == "" || !$content) {

                                $content = $this->getViewIndexContent('o'.ucfirst($this->_sub_mod_s));

                                $this->write_file($file_index, $content);

                            } else {

                                $pos_inicio_1 = strpos($content, config_item('replace_key_start_html_1'));
                                $pos_inicio_2 = strpos($content, config_item('replace_key_start_html_2'));

                                $pos_fin_1 = strpos($content, config_item('replace_key_end_html_1'));
                                $pos_fin_2 = strpos($content, config_item('replace_key_end_html_2'));

                                if ($pos_inicio_1 && $pos_inicio_2 && $pos_fin_1 && $pos_fin_2) {

                                    $search_start_1 = substr($content, $pos_inicio_1);
                                    $search_start_2 = substr($content, $pos_inicio_2);

                                    $search_end_1 = substr($content, $pos_fin_1);
                                    $search_end_2 = substr($content, $pos_fin_2);

                                    $content_added_1 = $this->content_variable_view_index(1,'o'.ucfirst($this->_sub_mod_s));
                                    $content_added_2 = $this->content_variable_view_index(2,'o'.ucfirst($this->_sub_mod_s));

                                    $content = str_replace($search_start_1, $content_added_1, $content);
                                    $content = str_replace(config_item('replace_key_end_html_1'), $search_end_1, $content);

                                    $content = str_replace($search_start_2, $content_added_2, $content);
                                    $content = str_replace(config_item('replace_key_end_html_2'), $search_end_2, $content);

                                    $this->write_file($file_index, $content);

                                    $mensaje = "El Archivo " . $file_index . " fue creado y modificado exitosamente";
                                }
                            }
                        } else {

                            if (file_exists($this->_file_sto_sub_mod_view_index) && !$this->bReset) {

                                $storage_content = $this->read_file($this->_file_sto_sub_mod_view_index);

                                if ($this->verify_backup($storage_content)) {

                                    $content = $storage_content;

                                } else {

                                    $content = $this->getViewIndexContent('o'.ucfirst($this->_sub_mod_s));
                                }
                            } else {

                                $content = $this->getViewIndexContent('o'.ucfirst($this->_sub_mod_s));
                            }

                            $this->write_file($file_index, $content);

                            $mensaje = "El Archivo " . $file_index . " fue creado y modificado exitosamente";
                        }
                        $this->set_storage('index');

                        return $content;
                    }
                }
            }
        }
        return false;
    }

    public function create_view_edit()
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    if ($this->create_folder($this->_dir_sub_mod_views)) {

                        $file_edit = $this->_file_sub_mod_view_edit;

                        // ********************** Para el archivo Edit.php *********************

                        if (file_exists($file_edit) && !$this->bReset) {

                            $mensaje = "El Archivo " . $file_edit . " ya fue creado";

                            $content = $this->read_file($file_edit);

                            if ($content == "" || !$content) {

                                $content = $this->getViewEditContent('o'. ucfirst($this->_sub_mod_s));

                                $this->write_file($file_edit, $content);

                            } else {

                                $pos_inicio = strpos($content, config_item('replace_key_start_html'));

                                $pos_fin = strpos($content, config_item('replace_key_end_html'));

                                if ($pos_inicio && $pos_fin) {

                                    $search_start = substr($content, $pos_inicio);

                                    $search_end = substr($content, $pos_fin);

                                    $content_added = $this->content_variable_view_edit('o'.ucfirst($this->_sub_mod_s));

                                    $content = str_replace($search_start, $content_added, $content);

                                    $content = str_replace(config_item('replace_key_end_html'), $search_end, $content);

                                    $this->write_file($file_edit, $content);
                                }
                            }

                        } else {

                            if (file_exists($this->_file_sto_sub_mod_view_edit) && !$this->bReset) {

                                $storage_content = $this->read_file($this->_file_sto_sub_mod_view_edit);

                                if ($this->verify_backup($storage_content)) {

                                    $content = $storage_content;

                                } else {

                                    $content = $this->getViewEditContent('o'. ucfirst($this->_sub_mod_s));
                                }

                            } else {

                                $content = $this->getViewEditContent('o'. ucfirst($this->_sub_mod_s));
                            }

                            $this->write_file($file_edit, $content);

                            $mensaje = "El Archivo " . $file_edit . " fue creado y modificado exitosamente";
                        }
                        $this->set_storage('edit');

                        return $content;
                    }
                }
            }
        }
        return false;
    }

    public function create_view_lib_js()
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    if ($this->create_folder($this->_dir_sub_mod_views)) {

                        $file_lib = $this->_file_sub_mod_view_lib;

                        // ********************** Para el archivo Edit.php *********************

                        if (file_exists($file_lib) && !$this->bReset) {

                            $mensaje = "El Archivo " . $file_lib . " ya fue creado";

                            $content = $this->read_file($file_lib);

                            if ($content == "" || !$content) {

                                $content = $this->getViewLibJsContent('o'. ucfirst($this->_sub_mod_s));

                                $this->write_file($file_lib, $content);

                            } else {

                                $pos_inicio = strpos($content, config_item('replace_key_start_html'));

                                $pos_fin = strpos($content, config_item('replace_key_end_html'));

                                if ($pos_inicio && $pos_fin) {

                                    $search_start = substr($content, $pos_inicio);

                                    $search_end = substr($content, $pos_fin);

                                    $content_added = $this->content_variable_view_lib_js('o'.ucfirst($this->_sub_mod_s));

                                    $content = str_replace($search_start, $content_added, $content);

                                    $content = str_replace(config_item('replace_key_end_html'), $search_end, $content);

                                    $this->write_file($file_lib, $content);
                                }
                            }

                        } else {

                            if (file_exists($this->_file_sto_sub_mod_view_lib) && !$this->bReset) {

                                $storage_content = $this->read_file($this->_file_sto_sub_mod_view_lib);

                                if ($this->verify_backup($storage_content)) {

                                    $content = $storage_content;

                                } else {

                                    $content = $this->getViewLibJsContent('o'. ucfirst($this->_sub_mod_s));
                                }

                            } else {

                                $content = $this->getViewLibJsContent('o'. ucfirst($this->_sub_mod_s));
                            }

                            $this->write_file($file_lib, $content);

                            $mensaje = "El Archivo " . $file_lib . " fue creado y modificado exitosamente";
                        }
                        $this->set_storage('lib');

                        return $content;
                    }
                }
            }
        }
        return false;
    }

    public function create_view_cnt()
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    if ($this->create_folder($this->_dir_sub_mod_views)) {

                        if ($this->create_folder($this->_dir_sub_mod_views_content)) {

                            $file_cnt = $this->_file_sub_mod_view_cnt;

                            // ********************** Para el archivo Edit.php *********************

                            if (file_exists($file_cnt) && !$this->bReset) {

                                $mensaje = "El Archivo " . $file_cnt . " ya fue creado";

                                $content = $this->read_file($file_cnt);

                                if ($content == "" || !$content) {

                                    $content = $this->getViewCntContent('o'. ucfirst($this->_sub_mod_s));

                                    $this->write_file($file_cnt, $content);

                                } else {

                                    $pos_inicio = strpos($content, config_item('replace_key_start_html'));

                                    $pos_fin = strpos($content, config_item('replace_key_end_html'));

                                    if ($pos_inicio && $pos_fin) {

                                        $search_start = substr($content, $pos_inicio);

                                        $search_end = substr($content, $pos_fin);

                                        $content_added = $this->content_variable_view_cnt('o'.ucfirst($this->_sub_mod_s));

                                        $content = str_replace($search_start, $content_added, $content);

                                        $content = str_replace(config_item('replace_key_end_html'), $search_end, $content);

                                        $this->write_file($file_cnt, $content);
                                    }
                                }

                            } else {

                                if (file_exists($this->_file_sto_sub_mod_view_cnt) && !$this->bReset) {

                                    $storage_content = $this->read_file($this->_file_sto_sub_mod_view_cnt);

                                    if ($this->verify_backup($storage_content)) {

                                        $content = $storage_content;

                                    } else {

                                        $content = $this->getViewCntContent('o'. ucfirst($this->_sub_mod_s));
                                    }

                                } else {

                                    $content = $this->getViewCntContent('o'. ucfirst($this->_sub_mod_s));
                                }

                                $this->write_file($file_cnt, $content);

                                $mensaje = "El Archivo " . $file_cnt . " fue creado y modificado exitosamente";
                            }
                            $this->set_storage('cnt');

                            return $content;
                        }
                    }
                }
            }
        }
        return false;
    }

    public function create_view_file($file_name, $content = '')
    {
        if (is_array($this->_fields)) {

            if ($this->create_folder($this->_dir_mod)) {

                if ($this->create_folder($this->_dir_sub_mod)) {

                    if ($this->create_folder($this->_dir_sub_mod_views)) {

                        $view_from_migrate = $this->_dir_sub_mod_migrate_views . $file_name . $this->_ext_php;

                        $view_file = $this->_dir_sub_mod_views . $file_name . $this->_ext_php;

                        $view_sto_file = $this->_dir_sto_sub_mod_views . $file_name . $this->_ext_txt;

                        if (file_exists($view_file)) {

                            $mensaje = "El Archivo " . $view_file . " ya fue creado";

                            $content = $this->read_file($view_from_migrate);

                            if ($content != "" && $content) {

                                $pos_inicio = strpos($content, config_item('replace_key_start_html'));

                                $pos_fin = strpos($content, config_item('replace_key_end_html'));

                                if ($pos_inicio && $pos_fin) {

                                    $search_start = substr($content, $pos_inicio);

                                    $search_end = substr($content, $pos_fin);

                                    $content_added = $this->content_variable_view_file();

                                    $content = str_replace($search_start, $content_added, $content);

                                    $content = str_replace(config_item('replace_key_end_html'), $search_end, $content);

                                    $this->write_file($view_file, $content);

                                    $mensaje = "El Archivo " . $view_file . " fue creado y modificado exitosamente";

                                } else {

                                    $this->write_file($view_file, $content);

                                    $mensaje = "El Archivo " . $view_file . " fue creado y modificado exitosamente";
                                }
                            }
                        } else if ($content == "" || $content) {

                            if (file_exists($view_sto_file)) {

                                $content_view = $this->read_file($view_sto_file);

                                if ($this->verify_backup($content_view)) {

                                    $content = $content_view;

                                } else {

                                    // ************* Actualiza el storage file ***********

                                    $content_sto = $this->read_file($view_from_migrate);

                                    $this->write_file($view_sto_file, $content_sto);

                                    $content_view = $this->read_file($view_sto_file);

                                    if ($this->verify_backup($content_view)) {

                                        $content = $content_view;

                                    }
                                }
                            } else {

                                if (file_exists($view_from_migrate)) {

                                    $content_view = $this->read_file($view_from_migrate);

                                    if ($this->verify_backup($content_view)) {

                                        $content = $content_view;
                                    }
                                }
                            }

                            $this->write_file($view_file, $content);

                            $mensaje = "El Archivo " . $view_file . " fue creado y modificado exitosamente";
                        }

                        $this->set_storage($file_name);

                        return $content;
                    }
                }
            }
        }
        return false;
    }

    public function createViewFiles($aFiles = [], $defaults = true)
    {
        if (validateVar($aFiles,'array')) {

            $filesMigrateViews = $this->get_files_from($this->_dir_sub_mod_migrate_views);

            if (count($filesMigrateViews) > 0) {

                foreach ($aFiles as $key => $value) {

                    if (in_array($value, $filesMigrateViews)) {

                        $this->create_view_file($value);
                    }
                }
            }
        }

        if ($defaults) {

            $this->create_view_index();

            $this->create_view_edit();

            $this->create_view_cnt();

            $this->create_view_lib_js();
        }
    }

    // ***********************************************************************************************
    // ********************************** Controller Content *****************************************
    // ***********************************************************************************************

    public function getCtrlContent($objectKey = 'object')
    {
        $content = config_item('file_ctrl_start');
        $content .= '
        /**
         * Created by ' . config_item('system_name') . '.
         * User: ' . config_item('owner') . '
         * Date: ' . date('d/m/Y') . '
         * Time: ' . date("g:i a") . '
         * @property Model_' . ucfirst($this->_sub_mod_p) . ' $model_' . $this->_sub_mod_p . '
         */
        
        Class Ctrl_' . ucfirst($this->_sub_mod_p) . ' extends ' . ucfirst($this->_mod) . '_Controller {
        
        ';

        $content .= '
            public function __construct()
            {
                parent::__construct();
                $this->load->model("model_' . $this->_sub_mod_p . '");
                ';

        foreach ($this->_fields as $name => $value) {
            if (explode('_', $name)[0] == 'img'|| isset($value['image']) && $value['image']) {
                $dir = 'img/' . $this->_sub_mod_p . '/';
                if ($this->create_folder('img/' . $this->_sub_mod_p)) {
                    $this->create_folder('img/' . $this->_sub_mod_p . '/thumbs');
                    $content .= '
                    // Settings for images
                    
                $config["upload_path"]          = "' . $dir . '";
                $config["allowed_types"]        = "gif|jpg|png";
                $config["max_size"]             = 100;
                $config["max_width"]            = 1024;
                $config["max_height"]           = 768;

                $this->load->library("upload", $config);
                ';
                    break;
                }
            }
        }
        $content .= '
            }
        
            public function index(){
                // Obtiene a todos los ' . $this->_sub_mod_p . '
                
                $this->data["o' .ucfirst($this->_sub_mod_p)  . '"] = $this->model_' . $this->_sub_mod_p . '->get();
        
                // Carga la vista
                
                $this->data["subview"] = "' . $this->_mod . '/' . $this->_sub_mod_p . '/index";
            }
        
            public function edit($id = NULL){
                // Optiene un ' . $this->_sub_mod_s . ' o crea uno nuevo
                // Se construye las reglas de validacion del formulario        
                if($id){
                    $'.$objectKey.' = $this->model_'.$this->_sub_mod_p.'->get($id);
                    if(!count($'.$objectKey.')){
                        $this->data["errors"][] = "El ' . $this->_sub_mod_s . ' no pudo ser encontrado";
                    }
                    $rules_edit = $this->model_'.$this->_sub_mod_p.'->rules_edit;
                    $this->form_validation->set_rules($rules_edit);
                } else {
                    $'.$objectKey.' = $this->model_' . $this->_sub_mod_p . '->get_new();
                    $rules = $this->model_' . $this->_sub_mod_p . '->rules;
                    $this->form_validation->set_rules($rules);
                }
                ';
        foreach ($this->_fields as $name => $value) {
            if (explode('_', $name)[0] == 'img'|| isset($value['image']) && $value['image']) {
                $content .= '
                if(isset($'.$objectKey.'->'.$name.')){
                    $aImg = explode(".",$'.$objectKey.'->'.$name.');
                    if(count($aImg)>1){
                        $'.$objectKey.'->imgThumb = $aImg[0]."_thumb.".$aImg[1];
                    }
                }
                ';
                break;
            }
        }
        $content .= '
                $this->data["' . $objectKey . '"] = $'.$objectKey.';
                // Se procesa el formulario
                
                if($this->form_validation->run() == true){
                    $data = $this->model_' . $this->_sub_mod_p . '->array_from_post(array(
                                  
                    ';

        $content .= $this->content_variable_ctrl();
        $content .= '));
        
        ';

        foreach ($this->_fields as $name => $value) {
            if (explode('_', $name)[0] == 'img' || isset($value['image']) && $value['image']) {
                $dir = 'img/' . $this->_sub_mod_p . '/';
                if ($this->create_folder('img/' . $this->_sub_mod_p)) {
                    $content .= '
                    // Settings for images
                    
                 if ( ! $this->upload->do_upload("' . $name . '"))
                {
                    $error = array("error" => $this->upload->display_errors());
                }
                else
                {
                    $file_info = $this->upload->data();
                    $this->_create_thumbnail("'.$this->_sub_mod_p.'",$file_info["file_name"]);
                    $this->data["' . $name . '"] = array("upload_data" => $file_info);
                    $data["'.$name.'"] = $file_info["file_name"];
                }';
                }
            }
            if(explode('_',$name)[0] == 'password' || isset($value['password']) && $value['password']){
                $content .= '
                if($id == NULL){
                    $data["'.$name.'"] = $this->input->post("'.$name.'");
                    $data["'.$name.'"] = $this->model_'.$this->_sub_mod_p.'->hash($data["'.$name.'"]);
                }
                ';
            }
        }

        $content .= '
                    $this->model_' . $this->_sub_mod_p . '->save($data,$id);
                    redirect("' . $this->_mod . '/' . $this->_sub_mod_p . '");
                }
        
                // Se carga la vista
                $this->data["subview"] = "' . $this->_mod . '/' . $this->_sub_mod_p . '/edit";
            }
        
            public function delete($id){
                $this->model_' . $this->_sub_mod_p . '->delete($id);
                redirect("' . $this->_mod . '/' . $this->_sub_mod_p . '");
            }';

        if($this->_sub_mod_p == 'sessions'){
            $content .= '
            public function login(){
                $this->session->login();
            }
            public function logout(){
                $this->session->logout();
            }
            public function signup(){
                $this->session->signUp();
            }
            ';
        }

        $content .= '
        }

        ';
        $content .= config_item('file_ctrl_end');
        return $content;
    }

    public function content_variable_ctrl()
    {
        $content = config_item('replace_key_start');
        $content .= '
        ';
        foreach ($this->_fields as $key => $value) {
            $exept = array('id', 'img', 'password');
            if (!in_array(explode('_', $key)[0], $exept) && $key != 'date_created' && $key != 'date_modified' && !isset($value['password'])) {
                $arrayName = (isset($value['options_selected']) ? '[]' : (explode('_', $key)[0] == 'ndrop' ? '[]' : ''));
                $validate = (isset($value['validate']) ? ($value['validate'] ? true : false) : true);
                if($validate){
                    $content .= '"';
                    $content .= $key.$arrayName;
                    $content .= '",
                ';
                }
            }
        }
        $content .= '
        ';
        $content .= config_item('replace_key_end') . '
        ';
        return $content;
    }

    // ***********************************************************************************************
    // ************************************ Model Content ********************************************
    // ***********************************************************************************************

    public function getModelContent($objectKey = 'object', $options = [])
    {
        $id = '';
        foreach ($this->_fields as $key => $value) {
            if (explode('_', $key)[0] == 'id') {
                $id = $key;
                break;
            }
        }

        $content = config_item('file_model_start');
        $content .= '
        /**
         * Created by Estic.
         * User: RaFaEl Gutierrez Gaspar
         * Date: ' . date('d/m/Y') . '
         * Time: ' . date("g:i a") . '
         */
        
        defined("BASEPATH") OR exit("No direct script access allowed");
        
        class Model_' . ucfirst($this->_sub_mod_p) . ' extends ' . ucfirst($this->_mod) . '_Model {

        ';

        $content .= $this->content_variable_model(1);

        $content .= '
            protected $_table_name = "' . $this->_table_name . '";
            protected $_order_by = "' . $id . ' desc";
            protected $_timestaps = true;
            protected $_primary_key = "' . $id . '";
        ';
        $bRulesPrinted = false;
        if(count($options))
        {
            if(isset($options['rules']))
            {
                foreach ($options['rules'] as $name => $rules)
                {
                    $content .= '
                    public $'.$name.' = array(    
                    ';
                    $content .= $this->content_variable_model(2, $rules);
                    $content .= '
                    );
                    ';
                }
                $bRulesPrinted = true;
            } else {
                $bRulesPrinted = false;
            }
        }

        if (!$bRulesPrinted)
        {
            $content .= '
            public $rules = array(
            ';
            $content .= $this->content_variable_model(2);
            $content .= '
            );
            ';

            $content .= '
            public $rules_edit = array(    
            ';
            $exepts = ['id','password'];
            $content .= $this->content_variable_model(2, ['exepts' => $exepts]);
            $content .= '
            );
            ';
        }

        $content .= '
            function __construct(){
                parent::__construct();
            }

            public function get_new(){
                $' . $this->_sub_mod_s . ' = new stdClass();
                
                ';

        $content .= $this->content_variable_model(3);

        $content .= '
                return $' . $this->_sub_mod_s . ';
            }';

        $content .= '
        }

        ';
        $content .= config_item('file_model_end');
        return $content;
    }

    public function content_variable_model($index, $aRules = [], $seg_cont = '')
    {
        $content = '';
        $exepts = [];
        $only = [];
        if (count($aRules)) {
            if (isset($aRules['exepts'])) {
                $exepts = $aRules['exepts'];
            } else {
                $exepts = array('id', 'img');
            }
            if (isset($aRules['only'])) {
                $only = $aRules['only'];
            }
        }
        else
        {
            $exepts = array('id', 'img');
        }

        if ($index == 1) {
            $content .= config_item('replace_key_start_1');
            $content .= '

            ';
            foreach ($this->_fields as $key => $value) {
                if($seg_cont != ''){
                    $skey1 = '"'.$key.'"';
                    $skey2 = '\''.$key.'\'';
                    $skey3 = '$'.$key;
                    $posField1 = strpos($seg_cont,$skey1);
                    $posField2 = strpos($seg_cont,$skey2);
                    $posField3 = strpos($seg_cont,$skey3);
                    if(!$posField1 && !$posField1 && !$posField1){
                        $exepts[] = $key;
                    }
                }

                if (explode('_', $key)[0] == 'id') {
                    $id = $key;
                }
                $content .= '/**
                         * The value for the title field.
                         *';

                if ($value['type'] == 'VARCHAR' ||
                    $value['type'] == 'Varchar' ||
                    $value['type'] == 'varchar' ||
                    $value['type'] == 'text' ||
                    $value['type'] == 'Text' ||
                    $value['type'] == 'TEXT' ||
                    $value['type'] == 'LONGVARCHAR' ||
                    $value['type'] == 'longvarchar' ||
                    $value['type'] == 'Longvarchar'
                ) {
                    $content .= '
                         * @var        string';
                } else {
                    $content .= '
                         * @var        ' . strtolower($value['type']);
                }

                $content .= '
                         */
                         ';
                $content .= '
                public $' . $key . ';
                ';
            }

            $content .= '
            
            ';
            $content .= config_item('replace_key_end_1') . '
            ';

            return $content;

        } else if ($index == 2) {

            $content .= config_item('replace_key_start_2');
            $content .= '
            
            ';
            $fields = $this->_fields;
            if(count($only)){
                $new_fields = [];
                foreach ($fields as $key => $vals){
                    if(in_array($key, $only)){
                        $new_fields[$key] = $vals;
                    }
                }
                $fields = $new_fields;
            }
            foreach ($fields as $key => $value) {

                if($seg_cont != ''){
                    $skey1 = '"'.$key.'"';
                    $skey2 = '\''.$key.'\'';
                    $skey3 = '$'.$key;
                    $posField1 = strpos($seg_cont,$skey1);
                    $posField2 = strpos($seg_cont,$skey2);
                    $posField3 = strpos($seg_cont,$skey3);
                    if(!$posField1 && !$posField2 && !$posField3){
                        $exepts[] = $key;
                    }
                }

                if(!in_array($key, $exepts)) {
                    $isHidden = false;
                    if (isset($value['hidden'])) {
                        $isHidden = $value['hidden'];
                    }
                    if (!$isHidden && !in_array(explode('_', $key)[0], $exepts) && $key != 'date_created' && $key != 'date_modified') {
                        $arrayName = (isset($value['options_selected']) ? '[]' : (explode('_', $key)[0] == 'ndrop' ? '[]' : ''));
                        $validate = (isset($value['validate']) ? ($value['validate'] ? true : false) : true);

                        if ($validate) {
                            $content .= '
                "' . $key . '" => array(
                    "field" => "';
                            $content .= $key . $arrayName;
                            $content .= '",
                    "label" => "' . ucfirst($key) . '",
                    "rules" => "trim|required';

                            // ******************************
                            // para mas reglas de validacion
                            // ******************************
                            $content .= isset($value['constraint']) ? '|max_length[' . $value['constraint'] . ']' : '';
                            $content .= explode('_', $key)[0] == 'phone' ? '|numeric' : '';
                            $content .= explode('_', $key)[0] == 'mobile' ? '|numeric' : '';
                            $content .= explode('_', $key)[0] == 'num' ? '|numeric' : '';
                            $content .= explode('_', $key)[0] == 'email' ? '|valid_email' : '';
                            $content .= explode('_', $key)[0] == 'url' ? '|valid_url' : '';
                            $content .= explode('_', $key)[0] == 'ip' ? '|valid_ip' : '';
                            if(explode('_', $key)[0] == 'password' ){

                                $pass_confirm = true;
                                if($seg_cont != ''){
                                    $skey1 = '"'.$key.'_confirm"';
                                    $skey2 = '\''.$key.'_confirm\'';
                                    $skey3 = '$'.$key.'_confirm';
                                    $posField1 = strpos($seg_cont,$skey1);
                                    $posField2 = strpos($seg_cont,$skey2);
                                    $posField3 = strpos($seg_cont,$skey3);
                                    if(!$posField1 && !$posField2 && !$posField3){
                                        $pass_confirm = false;
                                    }
                                }
                                if(!in_array('password_confirm', $exepts)){
                                    if($pass_confirm){
                                        $content .= '|matches[password_confirm]"),
        "password_confirm" => array(
            "field" => "password_confirm",
            "label" => "Confirm password",
            "rules" => "trim|matches[password]';
                                    } else {
                                        $content .= '';
                                    }
                                } else {
                                    $content .= '';
                                }
                            }
                            $content .= '"
                ),
                ';
                        }
                    }
                }
            }
            $content .= '
            
            ';
            $content .= config_item('replace_key_end_2') . '
            ';
            return $content;

        } else if ($index == 3) {
            $content .= config_item('replace_key_start_3');
            $content .= '
            
            ';

            foreach ($this->_fields as $key => $value) {
                if($seg_cont != ''){
                    $skey1 = '"'.$key.'"';
                    $skey2 = '\''.$key.'\'';
                    $skey3 = '$'.$key;
                    $posField1 = strpos($seg_cont,$skey1);
                    $posField2 = strpos($seg_cont,$skey2);
                    $posField3 = strpos($seg_cont,$skey3);
                    if(!$posField1 && !$posField2 && !$posField3){
                        $exepts[] = $key;
                    }
                }
                if (explode('_', $key)[0] != 'id') {
                    if (explode('_', $key)[0] == 'date') {
                        $content .= '$' . $this->_sub_mod_s . '->' . $key . ' = date("Y-m-d");
                    ';
                    } else {
                        $content .= '$' . $this->_sub_mod_s . '->' . $key . ' = "";
                    ';
                    }
                }
            }
            $content .= '
            
            ';
            $content .= config_item('replace_key_end_3') . '
            ';

            return $content;
        }
    }

    // ***********************************************************************************************
    // ************************************ View Index Content ***************************************
    // ***********************************************************************************************

    public function getViewIndexContent($objectKey = 'object')
    {
        $id = '';
        if(!count($this->_fields)){
            header("Refresh:0");
        }
        foreach ($this->_fields as $key => $val) {
            if (explode('_', $key)[0] == 'id') {
                $id = $key;
                break;
            }
        }
        if($id == ''){
            echo 'error';
        }

        $content = config_item('file_index_start');
        $content .= '
        /**
         * Created by ' . config_item('system_name') . '.
         * User: ' . config_item('owner') . '
         * Date: ' . date('d/m/Y') . '
         * Time: ' . date("g:i a") . '
         * @var Model_'.$this->_sub_mod_p.' $model_'.$this->_sub_mod_p.'
         * @var Model_'.$this->_sub_mod_p.' $'.$this->_sub_mod_p.'
         * @var Model_'.$this->_sub_mod_p.' $'.$this->_sub_mod_s.'
         */
        ?>
        
        <section>
            <h3>Lista de ' . ucfirst($this->_sub_mod_p) . '</h3>

            <?php
            $data_icon = array(
                "class" => "fa fa-plus",
                "aria-hidden" => "true",
                "tag" => "i",
                "title" => ""
            );
            $icon = icon($data_icon);
            echo anchor("' . $this->_mod . '/' . $this->_sub_mod_p . '/edit", "Agregar ' . ucfirst($this->_sub_mod_p) . '", null, $icon)?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    
                    ';

        $content .= $this->content_variable_view_index(1,'o'.ucfirst($this->_sub_mod_s));

        if (isset($this->_fields['date_created'])) {
            $content .= '<th>Fecha de Creacion</th>';
        }
        $content .= '
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($o' . ucfirst($this->_sub_mod_p) . ')) { ?>
                    <?php foreach ($o' . ucfirst($this->_sub_mod_p) . ' as $' . $objectKey . ') { ?>
                    <tr>
                    
                    ';

        $content .= $this->content_variable_view_index(2,'o'.ucfirst($this->_sub_mod_s));

        if (isset($this->_fields['date_created'])) {
            $content .= '<td><?= $' . $objectKey . '->date_created; ?></td>
            ';
        }
        $content .= '<td><?= btn_edit("' . $this->_mod . '/' . $this->_sub_mod_p . '/edit/" . $' . $objectKey . '->' . $id . ')?></td>
                        <td><?= btn_delete("' . $this->_mod . '/' . $this->_sub_mod_p . '/delete/" . $' . $objectKey . '->' . $id . ')?></td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">No se pudo encontrar ' . $this->_sub_mod_p . ' registrados</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>

        ';
        $content .= config_item('file_index_end');
        return $content;
    }

    public function content_variable_view_index($index = null,$foreachKey = 'object')
    {
        $content = '';
        $max = 3;
        $exepts = array('id', 'password');

        if ($index == 1) {

            $content .= config_item('replace_key_start_html_1');
            $content .= '

            ';
            $n = $max;
            foreach ($this->_fields as $key => $val) {
                if (!in_array(explode('_', $key)[0], $exepts) && $n > 0 && $key != 'date_created' && $key != 'date_modified') {
                    $content .= '<th>' . (isset(explode('_', $key)[1]) ? ucfirst(explode('_', $key)[0]) . ' ' . ucfirst(explode('_', $key)[1]) : ucfirst(explode('_', $key)[0])) . '</th>
                ';
                    $n--;
                }
            }
            $content .= '

            ';
            $content .= config_item('replace_key_end_html_1') . '
            ';

            return $content;

        } else if ($index == 2) {

            $content .= config_item('replace_key_start_html_2');

            $content .= '
            
            ';

            $n = $max;
            foreach ($this->_fields as $key => $val) {
                if (!in_array(explode('_', $key)[0], $exepts) && $n > 0 && $key != 'date_created' && $key != 'date_modified') {
                    $content .= '<td><?= $' . $foreachKey . '->' . $key . '; ?></td>
                ';
                    $n--;
                }
            }

            $content .= '

            ';
            $content .= config_item('replace_key_end_html_2') . '
            ';

            return $content;
        }
    }

    // **********************************************************************************************
    // ************************************ View Edit Content ***************************************
    // **********************************************************************************************

    public function getViewEditContent($objectKey = 'object')
    {
        foreach ($this->_fields as $key => $val) {
            if (explode('_', $key)[0] == 'id') {
                $id = $key;
                break;
            }
        }

        $content = config_item('file_edit_start');
        $content .= '
        /**
         * Created by ' . config_item('system_name') . '.
         * User: ' . config_item('owner') . '
         * Date: ' . date('d/m/Y') . '
         * Time: ' . date("g:i a") . '
         * @var Model_' . ucfirst($this->_sub_mod_p) . ' $model_'.$this->_sub_mod_p.'
         * @var Model_' . ucfirst($this->_sub_mod_p) . ' $'.$this->_sub_mod_p.'
         * @var Model_' . ucfirst($this->_sub_mod_p) . ' $'.$this->_sub_mod_s.'
         */
        ?>
        
        <h3><?= empty($' . $objectKey . '->' . $id . ') ? "Agregar ' . ucfirst($this->_sub_mod_p) . '" : "Actualizando datos, ' . ucfirst($this->_sub_mod_s) . ' #" . $' . $objectKey . '->' . $id . ' ?></h3>
        ';
        $has_image = false;
        foreach ($this->_fields as $k => $obj) {
            if (explode('_',$k)[0] == 'img' || isset($obj['image']) && $obj['image']) {
                $has_image = true;
                break;
            }
        }
        if($has_image){
            $content .= '
        <?= form_open_multipart() ?>
        ';
        } else {
            $content .= '
        <?= form_open_multipart() ?>
        ';
        }

        $content .= $this->content_variable_view_edit("o".ucfirst($this->_sub_mod_s));

        $content .= '
        <div class="form-group row">
            <!-- Button -->
            <div class="col-sm-12 controls">
                <?php
                 $data = array(
                    "name" => "save",
                    "value" => "Guardar",
                    "id" => "btnSave",
                    "class" => "btn btn-success"
                 );
                 echo form_submit($data) ?>
            </div>
        </div>
        <?= form_close() ?>

        ';
        $content .= config_item('file_edit_end');
        return $content;
    }

    public function content_variable_view_edit($objectKey = "object")
    {
        $content = config_item('replace_key_start_html');
        $content .= '
        
        ';
        $exepts = [$this->_id_table,'date_created','date_modified'];

        foreach ($this->_fields as $key => $value) {

            if (!in_array($key, $exepts)) {
                $words = explode('_', $key);
                $js = isset($value['js']) ? $value['js'] : '';
                $class = isset($value['class']) ? $value['class'] : '';
                $extra = isset($value['extra']) ? $value['extra'] : '';
                $in_value = isset($value['value']) ? $value['value'] : '';
                $checked = false;
                $options = isset($value['options']) ? $value['options'] : [];
                $options_selected = isset($value['options_selected'])  ? $value['options_selected'] : [];
                $option_selected = isset($value['option_selected'])  ? $value['option_selected'] : '';
                $id_tag = '';
                $name_tag = $key;
                $label = '';
                foreach ($words as $index => $word) {
                    $id_tag .= ucfirst($word);
                    $label .= ucfirst($word) . ' ';
                }
                $label = isset($value['label']) ? $value['label'] : $label;
                if (isset($value['type'])) {

                    if (strhas($key,'password_')) {
                        $content .= '
                            <?php if(!isset($' . $objectKey . '->id_' . $this->_sub_mod_s . ')){ ?>';
                    }

                    // ***********************************************************************************************
                    // ******************************* Para campos de tipo texto *************************************
                    // ***********************************************************************************************
                    if (compareArrayStr($value,'type','text') || compareArrayStr($value,'input','text')) {
                        $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                        $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                        $content .= '$data = array(';
                        $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                        $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                        $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                        $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control textTinymce ' . $class . '",';
                        $content .= '
                                     "value" => set_value("';
                        $content .= $name_tag;
                        $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_textarea($data,"' . $in_value . '","' . $extra . '"); ?> 
                                 </div>
                    </div>';

                        // ***********************************************************************************************
                        // ******************************* Para campos de tipo varchar ***********************************
                        // ***********************************************************************************************
                    } else if (compareArrayStr($value,'type','varchar') || compareArrayStr($value,'type','longvarchar')) {

                        // ******************************* input de tipo password **********************************
                        // *****************************************************************************************
                        if (strhas($key,'password_') || compareArrayStr($value, 'input' ,'password' )) {
                            $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>
                               
                               <div class="col-sm-6">';
                            $content .= '<?php
                            $data = array(';
                            $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                            $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                            $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                            $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "value" => set_value("';
                            $content .= $name_tag;
                            $content .= '", $' . $objectKey . '->' . $key . '),
                                 );
                                 echo form_password($data, "'.$in_value.'", "'.$extra.'"); ?>
                                 </div>
                                 </div>
                                 
                                 <div class="form-group row">
                                <label for="fieldPassword" class="col-sm-4 col-form-label col-form-label-md">Confirmar Password  </label>
                                <div class="col-sm-6">
                                <?php
                                $data = array(
                                    "placeholder" => "Confirmar contraseña",
                                     "name" => "' . $name_tag . '_confirm",
                                     "id" => "fieldConfirm' . $id_tag . '",
                                     "class" => "form-control ' . $class . '"
                                 );
                                 echo form_password($data, "'.$in_value.'", "'.$extra.'") ?>
                                </div>
                    </div>';

                            // ******************************* input de tipo hidden ************************************
                            // *****************************************************************************************
                        } else if (compareArrayStr($value,'input','hidden')) {
                            $content .= '
                            <div class="form-group row">';
                            $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                            $content .= 'echo form_hidden("'.$name_tag.'","' . $in_value . '","' . $extra . '") ?>
                                </div>
                    </div>';

                            // ******************************* input de tipo radio ************************************
                            // ****************************************************************************************
                        } else if (compareArrayStr($value,'input','radio') || strhas($key,'opt_')) {

                            if(strhas($key,'opt_') && count($options)){
                                $analized = true;
                            } else if(compareArrayStr($value,'input','radio') && count($options)){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized){
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                                foreach ($options as $ind => $option){
                                    if(is_array($option)){
                                        $opt = array_keys($option)[0];
                                        $checked = $option[$opt] == 'checked' ? true : false;
                                    } else {
                                        $opt = $option;
                                    }
                                    $content .= 'echo "<label>" . form_radio("'.$name_tag.'", "'.$opt.'", $'.$objectKey.'->'.$name_tag.' == "'.$opt.'" ? true : false, "'.$extra.'") . " ' . ucfirst($opt) . '</label><br>";
                                ';
                                    $checked = false;
                                }
                                $content .= '
                                ?>
                                </div>
                    </div>
                                ';
                            }

                            // ******************************* input de tipo checkbox **********************************
                            // *****************************************************************************************
                        } else if (strhas($key,'chk_') || compareArrayStr($value,'input','checkbox')) {

                            if(strhas($key,'chk_')  && count($options)){
                                $analized = true;
                            } else if(compareArrayStr($value,'input','checkbox') && count($options)){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized){
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                                foreach ($options as $ind => $option){
                                    if(is_array($option)){
                                        $opt = array_keys($option)[0];
                                        $checked = $option[$opt] == 'checked' ? true : false;
                                    } else {
                                        $opt = $option;
                                    }
                                    $content .= 'echo "<label>" . form_checkbox("'.$name_tag.'", "'.$opt.'", $'.$objectKey.'->'.$name_tag.' == "'.$opt.'" ? true : false, "'.$extra.'") . " ' . ucfirst($opt) .
                                        '</label><br>
                                    ";
                                ';
                                    $checked = false;
                                }
                                $content .= ' ?>
                                </div>
                    </div>
                                ';
                            }

                            // ******************************* input de tipo dropdown **********************************
                            // *****************************************************************************************
                        } else if (strhas($key,'drop_') || compareArrayStr($value,'input','dropdown')) {

                            if(strhas($key,'drop_') && count($options)){
                                $analized = true;
                            } else if(compareArrayStr($value,'input','dropdown') && count($options)){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized){
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';

                                if(count($options_selected)){
                                    $content .= '$data = array(';
                                    $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                                    $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                                    $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                                    $content .= '
                                    "name" => "' . $name_tag . '[]",
                                    "id" => "field' . $id_tag . '",
                                    "class" => "' . $class . '"
                                );
                                $options = '. var_export($options,true) . ';
                                $options_selected = json_decode($'.$objectKey.'->'.$name_tag.');
                                echo form_dropdown($data, $options, $options_selected, "'.$extra.'"); ';
                                } else {
                                    $content .= '$data = array(';
                                    $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                                    $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                                    $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                                    $content .= '
                                    "name" => "' . $name_tag . '",
                                    "id" => "field' . $id_tag . '",
                                    "class" => "' . $class . '"
                                );
                                $options = '. var_export($options,true).';
                                echo form_dropdown($data, $options, "$'.$objectKey.'->'.$name_tag.'","'.$extra.'") ?> 
                                </div>
                    </div>';
                                }
                            }

                            // ******************************* input de tipo select *******************************
                            // ************************************************************************************
                        } else if (strhas($key,'sel_') || compareArrayStr($value,'input','select')) {

                            if(strhas($key,'sel_') && count($options)){
                                $analized = true;
                            }else if(compareArrayStr($value,'input','select') && count($options)){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized){
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                                if(count($options_selected) == 0){
                                    $opt = array_keys($options);
                                    $options_selected[] = $opt[0];
                                }
                                $content .= '$data = array(';
                                $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                                $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                                $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                                $content .= '
                                    "name" => "' . $name_tag . '[]",
                                    "id" => "field' . $id_tag . '",
                                    "class" => "' . $class . '"
                                );
                                $options = '. var_export($options,true) . ';
                                $options_selected = json_decode($'.$objectKey.'->'.$name_tag.');
                                echo form_select($data, $options, "$'.$objectKey.'->'.$name_tag.'", "'.$extra.'") ?>
                                </div>
                    </div>';
                            }

                            // ******************************* input de tipo multiselect *******************************
                            // *****************************************************************************************
                        } else if (strhas($key,'mulsel_') || compareArrayStr($value,'input','multiselect')) {

                            if(strhas($key,'ndrop_') && count($options)){
                                $analized = true;
                            }else if(compareArrayStr($value,'input','multiselect') && count($options)){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized){
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                                if(count($options_selected) == 0){
                                    $opt = array_keys($options);
                                    $options_selected[] = $opt[0];
                                }
                                $content .= '$data = array(';
                                $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                                $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                                $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                                $content .= '
                                    "name" => "' . $name_tag . '[]",
                                    "id" => "field' . $id_tag . '",
                                    "class" => "' . $class . '"
                                );
                                $options = '. var_export($options,true) . ';
                                $options_selected = json_decode($'.$objectKey.'->'.$name_tag.');
                                echo form_multiselect($data, $options, $options_selected, "'.$extra.'") ?>
                                </div>
                    </div>';
                            }

                            // ******************************* input de tipo imagen *******************************
                            // ************************************************************************************
                        } else if (strhas($key,'img_') || compareArrayStr($value,'input','image')) {

                            if(strhas($key,'img_')){
                                $analized = true;
                            }else if(compareArrayStr($value,'input','image')){
                                $analized = true;
                            } else {
                                $analized = false;
                            }

                            if($analized) {
                                $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                                $content .= '
                                <div class="col-sm-6">
                                <div class="two-columns">
                                <?php if(isset($'.$objectKey.'->imgThumb)){?>
                                    <img class="img-thumb-1" id="imgThumb" src="<?=site_url("img/'.$this->_sub_mod_p.'/thumbs/".$'.$objectKey.'->imgThumb)?>"/>
                                <?php }?>
                                <?php
                                ';
                                $content .= '$data = array(';
                                $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                                $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                                $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                                $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "onchange" => "oImgs.showThisImg(this)",
                                     "value" => set_value("';

                                $content .= $name_tag;

                                $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_upload($data,"' . $in_value . '","' . $extra . '") ?>
                                 </div>
                                 </div>
                    </div>';
                            }

                        } else if(compareArrayStr($value,'input','disabled')){

                            // ******************************* Input por defecto *******************************
                            // *********************************************************************************
                            $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                            $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                            $content .= '$data = array(';
                            $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                            $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                            $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                            $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "value" => set_value("';

                            $content .= $name_tag;

                            $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"'.$in_value.'","disabled") ?>
                                 </div>
                    </div>
                                 ';
                        } else if(compareArrayStr($value,'input','default')){

                        // ******************************* Input por defecto *******************************
                        // *********************************************************************************
                        $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                        $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                        $content .= '$data = array(';
                        $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                        $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                        $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                        $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "value" => set_value("';

                        $content .= $name_tag;

                        $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"'.$in_value.'","'.$extra.'") ?>
                                 </div>
                    </div>
                                 ';
                    } else {
                            // ******************************* Input por defecto *******************************
                            // *********************************************************************************
                            $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                            $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                            $content .= '$data = array(';
                            $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                            $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                            $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                            $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "value" => set_value("';

                            $content .= $name_tag;

                            $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_input($data,"'.$in_value.'","'.$extra.'") ?>
                                 </div>
                    </div>
                                 ';

                        }

                        // ***********************************************************************************************
                        // ******************************* Para campos de tipo int ***************************************
                        // ***********************************************************************************************
                    } else if (compareArrayStr($value,'type','int')) {
                        $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                        $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                        $content .= '$data = array(';
                        $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                        $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                        $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                        $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control ' . $class . '",
                                     "value" => set_value("';
                        $content .= $name_tag;

                        $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "number"
                                 );
                                 echo form_input($data, "'.$in_value.'", "'.$extra.'") ?>
                                 </div>
                                 </div>
                                 ';

                        // ***********************************************************************************************
                        // ******************************* Para campos de tipo date **************************************
                        // ***********************************************************************************************
                    } else if (compareArrayStr($value,'type','date')) {

                        $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                        $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                        $content .= '$data = array(';
                        $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                        $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                        $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                        $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control datepicker ' . $class . '",
                                     "value" => set_value("';
                        $content .= $name_tag;

                        $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_input($data, "'.$in_value.'", "'.$extra.'") ?>
                                 </div>
                                 </div>';

                        // ***********************************************************************************************
                        // ******************************* Para campos de tipo datetime **********************************
                        // ***********************************************************************************************
                    } else if (compareArrayStr($value,'type','datetime') || compareArrayStr($value,'type','timestamp')) {
                        $content .= '
                            <div class="form-group row">
                                <label for="field' . $id_tag . '" class="col-sm-4 col-form-label col-form-label-md">' . $label . ' </label>';
                        $content .= '
                                <div class="col-sm-6">
                                <?php
                                ';
                        $content .= '$data = array(';
                        $content .= isset($value['onchange']) ? '"onchange" => "' . $value['onchange'] . '",' : '';
                        $content .= isset($value['onclick']) ? '"onclick" => "' . $value['onclick'] . '",' : '';
                        $content .= isset($value['placeholder']) ? '"placeholder" => "' . $value['placeholder'] . '",' : '';
                        $content .= '
                                     "name" => "' . $name_tag . '",
                                     "id" => "field' . $id_tag . '",
                                     "class" => "form-control datepicker ' . $class . '",
                                     "value" => set_value("';
                        $content .= $name_tag;

                        $content .= '", $' . $objectKey . '->' . $key . '),
                                     "type" => "text"
                                 );
                                 echo form_input($data, "'.$in_value.'", "'.$extra.'") ?>
                                 </div>
                    </div>
                                 ';
                    }

                    // ******************************* Para validar el campo **********************************
                    // ****************************************************************************************
                    $validate = (isset($value['validate']) ? ($value['validate'] ? true : false) : true);
                    $content .= $validate? '<?php echo form_error("'.$name_tag.'"); ?>
                    ' : '';
                    if (strhas($key,'password_')) {
                        $content .= '
                            <?php } ?>';
                    }

                } else {
                    return '';
                }
            }
        }
        $content .= '
        
            ';
        $content .= config_item('replace_key_end_html') . '
        ';

        return $content;
    }

    // ***********************************************************************************************
    // ************************************ View lib.js File Content ***************************************
    // ***********************************************************************************************

    public function getViewLibJsContent($objectKey = 'object'){
        $content = '
        /**
 * Created by '.config_item('system_name').' on '.date('d/m/Y').'.
 */

var '.$objectKey.' = {

    init: function(){

    }
}
        ';

        return $content;
    }

    public function content_variable_view_lib_js(){

    }

    // ***********************************************************************************************
    // ************************************ View cnt Content ***************************************
    // ***********************************************************************************************

    public function getViewCntContent($objectKey = 'object')
    {
        $id = '';
        if(!count($this->_fields)){
            header("Refresh:0");
        }
        foreach ($this->_fields as $key => $val) {
            if (explode('_', $key)[0] == 'id') {
                $id = $key;
                break;
            }
        }
        if($id==null){
            echo "error";
        }
        $content = config_item('file_index_start');
        $content .= '
        /**
         * Created by ' . config_item('system_name') . '.
         * User: ' . config_item('owner') . '
         * Date: ' . date('d/m/Y') . '
         * Time: ' . date("g:i a") . '
         * @var Model_'.$this->_sub_mod_p.' $model_'.$this->_sub_mod_p.'
         * @var Model_'.$this->_sub_mod_p.' $'.$this->_sub_mod_p.'
         * @var Model_'.$this->_sub_mod_p.' $'.$this->_sub_mod_s.'
         */
        ?>
        
        <section>
            <h3>Lista de ' . ucfirst($this->_sub_mod_p) . '</h3>

            <?php
            $data_icon = array(
                "class" => "fa fa-plus",
                "aria-hidden" => "true",
                "tag" => "i",
                "title" => ""
            );
            $icon = icon($data_icon);
            echo anchor("' . $this->_mod . '/' . $this->_sub_mod_p . '/edit", "Agregar ' . ucfirst($this->_sub_mod_p) . '", null, $icon)?>
            <table class="table table-striped">
                <thead>
                    <tr>
                    
                    ';

        $content .= $this->content_variable_view_index(1,'o'.ucfirst($this->_sub_mod_s));

        if (isset($this->_fields['date_created'])) {
            $content .= '<th>Fecha de Creacion</th>';
        }
        $content .= '
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($o' . ucfirst($this->_sub_mod_p) . ')) { ?>
                    <?php foreach ($o' . ucfirst($this->_sub_mod_p) . ' as $' . $objectKey . ') { ?>
                    <tr>
                    
                    ';

        $content .= $this->content_variable_view_index(2,'o'.ucfirst($this->_sub_mod_s));

        if (isset($this->_fields['date_created'])) {
            $content .= '<td><?= $' . $objectKey . '->date_created; ?></td>
            ';
        }
        $content .= '<td><?= btn_edit("' . $this->_mod . '/' . $this->_sub_mod_p . '/edit/" . $' . $objectKey . '->' . $id . ')?></td>
                        <td><?= btn_delete("' . $this->_mod . '/' . $this->_sub_mod_p . '/delete/" . $' . $objectKey . '->' . $id . ')?></td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">No se pudo encontrar ' . $this->_sub_mod_p . ' registrados</td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>

        ';
        $content .= config_item('file_index_end');
        return $content;
    }

    public function content_variable_view_cnt($index = null,$foreachKey = 'object')
    {
        $content = '';
        $max = 3;
        $exepts = array('id', 'password');

        if ($index == 1) {

            $content .= config_item('replace_key_start_html_1');
            $content .= '

            ';
            $n = $max;
            foreach ($this->_fields as $key => $val) {
                if (!in_array(explode('_', $key)[0], $exepts) && $n > 0 && $key != 'date_created' && $key != 'date_modified') {
                    $content .= '<th>' . (isset(explode('_', $key)[1]) ? ucfirst(explode('_', $key)[0]) . ' ' . ucfirst(explode('_', $key)[1]) : ucfirst(explode('_', $key)[0])) . '</th>
                ';
                    $n--;
                }
            }
            $content .= '

            ';
            $content .= config_item('replace_key_end_html_1') . '
            ';

            return $content;

        } else if ($index == 2) {

            $content .= config_item('replace_key_start_html_2');

            $content .= '
            
            ';

            $n = $max;
            foreach ($this->_fields as $key => $val) {
                if (!in_array(explode('_', $key)[0], $exepts) && $n > 0 && $key != 'date_created' && $key != 'date_modified') {
                    $content .= '<td><?= $' . $foreachKey . '->' . $key . '; ?></td>
                ';
                    $n--;
                }
            }

            $content .= '

            ';
            $content .= config_item('replace_key_end_html_2') . '
            ';

            return $content;
        }
    }

    // **********************************************************************************************
    // ************************************ View File Content ***************************************
    // **********************************************************************************************

    public function content_variable_view_file()
    {
        // TODO: Realizar la creacion del contenido variable de cada vista de forma dinamica
    }

    // ******************************************************************************************
    // ************************************ Migration Tables ***************************************
    // ******************************************************************************************

    public function getMigrationContent($objectKey = 'object')
    {
        $content = '
        <?php
/**
 * Created by '.config_item('system_name').'.
 * User: '.config_item('owner').'
 * Date: '.date('d/m/Y').'
 * Time: '.date("g:i a").'
 */


defined("BASEPATH") OR exit("No direct script access allowed");

class Migration_Create_'.$this->_mod_type.'_'.$this->_sub_mod_p.' extends CI_Migration {

    public function up()
    {
        $fields = ';
        $content .= var_export($this->_fields,true);
        $content = str_replace('INTEGER','INT',$content);
        $content = str_replace('LONGVARCHAR','TEXT',$content);
        $content = str_replace('TIMESTAMP','DATETIME',$content);

        $content .= ';

        $settings = array(
            "listed" => "enabled",
            "status" => "enabled",
            "icon" => ""
        );';

        if(isset($this->_keys) && $this->_keys != []){
            $content .= '
        $fk_keys = array(';
            foreach ($this->_keys as $i => $fk_settings){
                $name = array_keys($fk_settings);
                $content .= '
            "'.$name[0].'" => array(
                "table" => "'.$fk_settings[$name[0]]['table'].'",
                "idLocal" => "'.$fk_settings[$name[0]]['idLocal'].'",
                "idForeign" => "'.$fk_settings[$name[0]]['idForeign'].'",
            ),';
            }
            $content .= '
        );
        ';
        }

        $content .= '
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key("'.$this->_id_table.'", TRUE);
        ';
        if(isset($this->_keys) && $this->_keys != []) {
            $content .= '
        $this->dbforge->add_key($fk_keys);';
        }
        $content .= '
        $this->create_or_alter_table("'.$this->_table_name.'",$settings);

        $this->createCtrl();
        $this->createModel();
        $this->createViewFiles();

    }
}
        ';
        return $content;
    }

    public function content_variable_migration()
    {

        $content = '';

        return $content;
    }

    public function create_folder($dir)
    {
        if (!is_dir($dir)) {

            if (!mkdir($dir, 0777, true)) {

                die('Fallo al crear el folder '.$dir);

                return false;
            }
            chmod($dir, 0777);

            $mensaje = "El directorio " . $dir . " se ha creado exitosamente";

            return true;

        } else {

            if (is_dir($dir)) {

                $mensaje = "El Directorio " . $dir . " ya fue creado";

                return true;

            } else {

                return false;
            }
        }
    }

    public function write_file($dir_file, $content)
    {
        $fp = fopen($dir_file, 'w+');

        if (file_exists($dir_file)) {

            if (fileperms($dir_file) != 33279) {

                chmod($dir_file, 0777);
            }
        }

        fwrite($fp, $content);

        $mensaje = "El Archivo " . $dir_file . " se ha creado Exitosamente";

        return true;
    }

    public function read_file($dir_file)
    {

        if (file_exists($dir_file)) {

            $var = fileperms($dir_file);

            if (fileperms($dir_file) != 33279) {

                chmod($dir_file, 0777);
            }
            $fp = fopen($dir_file, 'rb');

            if (is_file($dir_file)) {

                $fileSize = filesize($dir_file);

                if ($fileSize > 0) {

                    $content = fread($fp, $fileSize);

                    return $content;
                }
            }

            fclose($fp);
        }

        return false;
    }

    public function verify_backup($content)
    {
        if (!empty($content)) {

            if (!strpos($content, config_item('no_backup_message') && !strpos($content, config_item('file_empty_php')))) {

                return true;

            } else {

                return false;
            }
        } else {

            return false;
        }
    }

    public function get_files_from($dir, $with_ext = false)
    {
        $files = [];

        if (is_dir($dir)) {

            if ($gestor = opendir($dir)) {

                while (false !== ($entrada = readdir($gestor))) {

                    if ($entrada != '.' && $entrada != '..') {

                        $files[] = $entrada;
                    }
                }
                closedir($gestor);
            }

            if ($with_ext) {

                return $files;

            } else {

                foreach ($files as $i => $name) {

                    $files[$i] = explode('.', $name)[0];
                }
            }
        }
        return $files;
    }

    public function delete_file($file)
    {

        $fh = fopen($file, 'a');

        fclose($fh);

        unlink($file);
    }

    public function delete_dir($dir)
    {

        if (!is_dir($dir)) {

            mkdir($dir);
        }

        rmdir($dir);
    }

    public function add_migration_index($index){

        if(is_numeric($index))
        {
            $this->_file_migration_index = $index;
        }
    }

    protected function _update_primary_key($field,$fields,$tableLocal,$auto_increment = false){
        $fields_cols = array_column($fields, 'name');

        if (explode('_', $field)[0] == 'id') {
            $id_table = '';
            foreach ($fields_cols as $item) {
                if(explode('_',$item)[0] == 'id'){
                    list($id,$table) = explode('_',$item);
                    if(strpos($tableLocal,$table) > -1){
                        $id_table = $item;
                        break;
                    }
                }
            }
            if($id_table == ''){
                list($id,$table) = explode('_',$field);
                if(strpos($tableLocal,$table) > -1){
                    $id_table = $field;
                }
            }
            if($id_table == ''){
                $this->dbforge->setPrimaryKey($tableLocal, $field, $auto_increment);
            }
        }
    }
    protected function _update_indexes_foreignKeys($keys, $fields, $localTable)
    {
        $localTableId = $this->dbforge->getPrimaryKeyFromTable($localTable);
        $fields_new_table = array_keys($fields);

        if (is_array($keys) && count($keys)) {
            foreach ($keys as $i => $key) {
                foreach ($key as $constraintName => $settings) {
                    if (is_array($settings) && $this->db->table_exists($settings['table'])) {
                        $tableForeign = $settings['table'];
                        $idForeign = $settings['idForeign'];
                        $idLocal = $settings['idLocal'];

                        if (in_array($idLocal, $fields_new_table)) {
                            $fk_field = [];
                            $fk_table = $this->db->field_data($tableForeign);
                            foreach ($fk_table as $i => $set) {
                                if ($set->name == $idForeign && $set->primary_key) {
                                    $fk_field = $set;
                                    break;
                                }
                            }
                            if (count($fk_field)) {
                                if ($fields[$idLocal]['type'] == $fk_field->type ||
                                    $fields[$idLocal]['type'] == strtoupper($fk_field->type) ||
                                    $fields[$idLocal]['type'] == ucfirst($fk_field->type) &&
                                    $fields[$idLocal]['default'] == $fk_field->default ||
                                    $fields[$idLocal]['default'] == strtoupper($fk_field->default) ||
                                    $fields[$idLocal]['default'] == ucfirst($fk_field->default) &&
                                    intval($fields[$idLocal]['constraint']) == intval($fk_field->max_length)
                                ) {
                                    if (!$this->dbforge->hasRelation($localTable, $idLocal, $tableForeign, $idForeign, $constraintName)) {
                                        if ($this->dbforge->fieldExistsInDB($localTable, $idLocal)) {
                                            $this->dbforge->setRelation($localTable, $idLocal, $tableForeign, $idForeign, $constraintName);
                                        } else {
                                            header("Refresh:0");
                                        }
                                    }
                                } else {
                                    show_error('Verifica que el campo ' . $idLocal . ' de la actual tabla ' . $localTable . ' tenga las mismas propiedades en la tabla ' . $tableForeign);
                                }
                            } else {
                                show_error('Verifica que el campo ' . $idLocal . ' ha sido instanciado de la misma manera en la tabla ' . $tableForeign);
                            }
                        } else if ($this->db->field_exists($idLocal, $localTable)) {
                            if ($this->dbforge->hasRelation($localTable, $idLocal, $tableForeign, $idForeign, $constraintName)) {
                                if ($this->dbforge->fieldExistsInDB($localTable, $idLocal)) {
                                    $this->dbforge->removeRelation($localTable, $constraintName);
                                }
                            }
                        }
                    } else {
                        $migIndex = $this->getMigrationIndexFromTableName($settings['table']);
                        list($mod, $submod) = getModSubMod($settings['table']);
                        redirect("migrate/set/$mod/$migIndex");
                    }
                }
            }
        }
    }

    public function getMigrationIndexFromTableName($tableLocal)
    {

        $mod = '';
        $subMod = '';

        list($mod, $subMod) = getModSubMod($tableLocal);

        $files = $this->CI->migrationFiles;

        if ($mod == '') {
            $mod = $subMod;
        }
        $migrationTabs = $files[$mod];

        foreach ($migrationTabs as $index => $name) {

            if (strpos($name, $tableLocal)) {

                return $index;
            }
        }
        return 0;
    }

    private function verifyAppOrBase()
    {
        if(isset($this->CI->uri->segments[3])){
            $this->_base_path = $this->CI->uri->segments[3] == 'ci' || $this->CI->uri->segments[3] == 'tic' ? BASEPATH : APPPATH;
            $this->_dir_migrations_files = $this->CI->uri->segments[3] == 'ci' || $this->CI->uri->segments[3] == 'tic' ? BASEPATH . "migrations/tables/" :APPPATH . "migrations/tables/" ;
            $this->_dir_root_store = $this->CI->uri->segments[3] == 'ci' || $this->CI->uri->segments[3] == 'tic' ? BASEPATH . "migrations/storage/" :APPPATH . "migrations/storage/";
        }
    }

    private function getIdUserDefault()
    {
        if($this->db->table_exists('ci_usuarios')){
            $this->db->where('id_usuario', 1);
            $oUser = $this->db->get('ci_usuarios')->row();

            if(is_object($oUser)){
                return $oUser->id_usuario;
            } else {
                $data = array(
                    'id_usuario' => 1,
                    'name' => 'Rafael',
                    'lastname' => 'Gutierrez',
                    'email' => 'rafael@herbalife.com.bo',
                    'mobile_number_1' => '3213231',
                    'mobile_number_2' => '3213231',
                    'ci' => '3213231',
                    'img' => 'rafo.jpg',
                    'password' => '123',
                    'date_created' => date('Y-m-d H:i:s'),
                    'date_modified' => date('Y-m-d H:i:s')
                );
                $this->db->set($data);
                if($this->db->insert('ci_usuarios')){
                    return $data['id_usuario'];
                };
            }
        }
    }

    public function create_migration_tables()
    {
        $tables = $this->dbforge->getArrayTablesFieldsFromDB();



        foreach ($tables as $table){
            $content = var_export($table,true);
        }
    }


}
