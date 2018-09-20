<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/11/2017
 * Time: 12:27 AM
 */
use Propel\Runtime\Exception\PropelException;

Class ES_Model extends ES_Model_Vars {

    protected $_table_name = '';
    protected $_primary_key = "id";
    protected $_primary_filter = "intval";
    protected $_order_by = '';
    public $rules = array();
    protected $_timestaps = true;
    protected $_num_thumbs = 5;

    public $rules_login = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
    );

    public $rules_register = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        "password" => array(
            "field" => "password",
            "label" => "Password",
            "rules" => "trim|required|max_length[128]|matches[password_confirm]"),
        "password_confirm" => array(
            "field" => "password_confirm",
            "label" => "Confirm password",
            "rules" => "trim|matches[password]"
        ),
    );

    private $img_path;
    private $original_path;
    private $thumb_path;

    private static $instance = null;

    function __construct() {
        parent::__construct();
//        $this->load->library('migration');
//        if(function_exists('initStaticTableVars')){
//            initStaticTableVars($this);
//        }
        $this->img_path = realpath(APPPATH.'../assets/img/');
        createFolder($this->img_path);
    }

    public static function create()
    {
        if(!self::$instance){
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    public function init()
    {

    }
    public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function get($id = null, $single = false){
        if($id != null){
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } else if ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        $this->db->order_by($this->_order_by);
        $oResult = $this->db->get($this->_table_name)->$method();
        return $oResult;
    }

    public function get_by_selecting($where, $select, $single = false){
        $this->db->select($this->_primary_key.', '.$select);
        $this->db->where($where);
        return $this->get(null, $single);
    }
    public function get_by($where, $bSelecting = false, $single = false){
        $select = validateVar($where) ? '' : $this->_primary_key;
        $aWheres = [];
        $i = 0;
        if(!validateVar($where, 'array')){
            $where = [$where];
        }
        foreach ($where as $k => $wh){
            if(validateVar($k,'numeric',false)){
                if($i == 0 && validateVar($wh)){
                    $aWheres = !validateVar($k,'numeric', false) ? [$k => $wh] : [];
                }
                if(validateVar($wh,'array')){
                    foreach ($wh as $j => $wh_interno){
                        if(validateVar($j,'numeric',false)){
                            $select .= validateVar($select) ? ', '.$wh_interno : $wh_interno;
                        }
                    }
                } else if(validateVar($wh)){
                    $select .= validateVar($select) ? ', '.$wh : $wh;
                }
            } else if($bSelecting){
                $select .= validateVar($select) ? ', '.$k : $k;
                $aWheres[] = !validateVar($k,'numeric') ? [$k => $wh] : [];
            } else {
                $aWheres[] = !validateVar($k,'numeric') ? [$k => $wh] : [];
            }
            $i++;
        }
        $this->db->select($select);
        foreach($aWheres as $where){
            $this->db->where($where);
        }
        return $this->get(null, $single);
    }

    public function get_one_by($where, $bSelecting = false, $single = false){
        $result = $this->get_by($where, $bSelecting, $single);

        if(countStd($result) == 1){
            return $result->{0};
        } else {
            return $result;
        }
    }

    public function setOptions($fields, $delimiter){
        $options = [];
        if(!isset($delimiter)){
            $delimiter = ', ';
        } else {
            $delimiter = $delimiter." ";
        }
        $primary ='';
        foreach ($fields as $field){
            $primary_key = $this->_primary_key;
            if(isset($field->$primary_key)){
                $key = $field->$primary_key;
                unset($field->$primary_key);
                $options[$key] = '';
                foreach ($field as $setting){
                    $options[$key] .= $setting.$delimiter;
                }
                $field->$primary_key = $key;
                $options[$key] = substr($options[$key],0,strlen($options[$key])-2);
            }
        }

        return $options;
    }

    public function create_ci_sessions(){
        $this->dbforge->create_ci_sessions();
    }

    public function get_pk_table($table){
        $sql = "show columns from `$table` where `Key` = 'PRI'";
        $pkTable = $this->db->query($sql)->row();

    }

    public function save($data, $id = null, $with_id = true){
        // set timesatamps
        $now = date('Y-m-d H:i:s');
        if($this->db->field_exists('date_created',$this->_table_name)){
            if($this->_timestaps == true){
                if($id == null){
                    $data['date_created'] = $now;
                } else {
                    $data['date_modified'] = $now;
                }
            }
        }
        if($this->db->field_exists('date_modified', $this->_table_name)){
            if($this->_timestaps == true){
                $data['date_modified'] = $now;
            }
        }
        if($this->db->field_exists('id_user_modified', $this->_table_name)){
            if($this->db->table_exists('ci_users') && $this->db->field_exists('id_user','ci_users')){
                $userAdmin = CiUsersQuery::create()->findOneByIdUser(1);
                if (is_object($userAdmin)){
                    $data['id_user_modified'] = 1;
                }
            }
        }
        if($this->db->field_exists('id_user_created', $this->_table_name)){
            if($this->db->table_exists('ci_users') && $this->db->field_exists('id_user','ci_users')){
                $userAdmin = CiUsersQuery::create()->findOneByIdUser(1);
                if (is_object($userAdmin)){
                    $data['id_user_created'] = 1;
                }
            }
        }

        $funct_v = function ($vals) {
            if(is_array($vals)){
                $str = json_encode($vals);
                return $str;
            }
            $vals = xss_clean($vals);
            return $vals;
        };
        $funct_k = function ($key) {
            if(strpos($key,'[]')){
                $key = substr($key,0,strlen($key)-2);
            }
            return $key;
        };
        $keys = array_map($funct_k, array_keys($data));
        $vals = array_map($funct_v, array_values($data));
        $data = array_combine($keys,$vals);

        // insert
        if (($id == null || $id == 0) && !isset($data[$this->_primary_key])){
            $data[$this->_primary_key] = null;
            if(is_numeric($with_id) || is_string($with_id)){
                $id = $with_id;
                $data[$this->_primary_key] = $with_id;
            } else if(is_bool($with_id)){
                $this->db->insert_id();
            }
            $this->db->set($data);
            $this->db->insert($this->_table_name);
        } else if(isset($data[$this->_primary_key]) ){
            $this->db->set($data);
            $this->db->insert($this->_table_name);
        }
        // update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        unset($data[$this->_primary_key]);
        return $data;
    }
//    public function getThumbs($obj,$file = '',$field = ''){
//
//    }

    public function getThumbs($objs, $file = '', $field = ''){
        if(isset($objs->{$this->_primary_key})){
            $obj = $objs;
            unset($objs);
            $objs[0] = $obj;
        }
        foreach ($objs as $k => $obj) {
            list($mod, $submod) = getModSubMod($this->_table_name);
            $filesFields = array();
            if ($file == '' || $field == '') {
                $aFields = $this->{'table_' . $this->_table_name};
                $funct = function ($val) {
                    if (validateArray($val, 'input')) {
                        if (compareStrStr($val['input'], 'image') || compareStrStr($val['input'], 'img')) {
                            return [$val['field'] => $val['input']];
                        }
                    }
                };
                if(validateVar($aFields, 'array')){
                    $aImgInputs = array_map($funct, $aFields);
                    foreach ($aImgInputs as $field => $imgInput) {
                        if ($imgInput != null) {
                            $filesFields[$field] = $obj->{$field};
                        } else {
                            unset($aImgInputs[$field]);
                        }
                    }
                }
            } else {
                $filesFields = [$field => $file];
            }
            foreach ($filesFields as $field => $file) {
                $aThumbs = array();
                if ($file != '') {
                    $aFilePart = explode('.', $file);
                    if (count($aFilePart) > 1) {
                        $ext = $aFilePart[sizeof($aFilePart) - 1];
                        $name = $aFilePart[sizeof($aFilePart) - 2];
                        $size = 50;
                        if (file_exists(FCPATH . "assets/img/$submod/$file")) {
                            for ($i = 1; $i <= $this->_num_thumbs; $i++) {
                                $thumbFile = $name . "-thumb_$size.$ext";
                                if (file_exists(FCPATH . "assets/img/$submod/thumbs/$thumbFile")) {
                                    $aThumbs[$i] = $thumbFile;
                                    $size += 100;
                                }
                            }
                        }
                    } else {
                        for ($i = 1; $i <= $this->_num_thumbs; $i++) {
                            $aThumbs[$i] = '';
                        }
                    }
                } else {
                    for ($i = 1; $i <= $this->_num_thumbs; $i++) {
                        $aThumbs[$i] = '';
                    }
                }
                foreach ($aThumbs as $i => $thumb) {
                    $obj->{$field . "_thumb$i"} = $thumb;
                }
            }
            if(is_object($objs)){
                $objs->$k = $obj;
            }
            $file = $field = '';
        }
        return $objs;
    }

    public function do_upload($field, $id){
        list($mod,$submod) = getModSubMod($this->_table_name);
        $dirPictures = FCPATH."assets/img/$submod/";
        $dirPicturesThumb = $dirPictures."thumbs/";
        createFolder($dirPictures);
        createFolder($dirPicturesThumb);
        // Settings for images
        $config = array(
            'upload_path'       => $dirPictures,
            'allowed_types'     => 'gif|jpg|png|jpeg',
            'max_size'          => 1000,
            'max_width'         => 2024,
            'max_height'        => 1008,
            'new_image'         => $dirPicturesThumb,
            'maintain_ratio'    => true,
            'image_library'     => 'gd2',
            'create_thumb'      => TRUE,
            'num_thumbs'        => $this->_num_thumbs,
            'width'             => 50,
            'height'            => 50,
            'thumb_marker'      => '-thumb_50',
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        if(validateArray($_FILES,$field)){
            if(validateVar($_FILES[$field],'array')){
                if(!file_exists($dirPictures.$_FILES[$field]['name'])){
                    if ( ! $this->upload->do_upload($field) && $id == null)
                    {
                        return false;
                    }
                    else
                    {
                        $file = $this->upload->data();
                        $config['source_image'] = $file['full_path'];
                        for ($i=0;$i<$config['num_thumbs'];$i++){
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $config['width'] = $config['width']+100;
                            $config['height'] = $config['height']+100;
                            $config['thumb_marker'] = '-thumb_'.$config['width'];
                        }
                    }
                } else {
                    $this->upload->file_name = $_FILES[$field]['name'];
                    $this->upload->file_type = $_FILES[$field]['type'];
                }
            }
        }
        return true;
    }

    public function setForeignValues($t1Contents, $t1FieldRef, $t2Contents, $t2FieldRef, $bWithAllFields = false){
        $primary_key = $this->_primary_key;
        foreach ($t1Contents as $i => $t1Content){
            foreach ($t2Contents as $j => $t2Content){
                if((isset($t2Content->$t2FieldRef) && isset($t1Content->$t1FieldRef ) && $t2Content->$t2FieldRef == $t1Content->$t1FieldRef)|| $bWithAllFields){
                    $t1FieldsRef = std2array($t1Content);
                    $t2FieldsRef = std2array($t2Content);
                    unset($t1FieldsRef[$primary_key]);
                    unset($t1FieldsRef[$t1FieldRef]);
                    unset($t2FieldsRef[$t2FieldRef]);
                    $t1Contents->$i = new stdClass();
                    $t1Contents->$i->$primary_key = $t1Content->$primary_key;

                    foreach ($t2FieldsRef as $t2field => $t2value){
                        $t1Contents->$i->$t2field = $t2Content->$t2field;
                    }
                    foreach ($t1FieldsRef as $t1field => $t1value){
                        if($bWithAllFields){
                            $t1Contents->$i->{$t1FieldRef.'_'.$t1field} = $t1Content->$t1field;
                        } else {
                            $t1Contents->$i->$t1field = $t1Content->$t1field;
                        }
                    }
                }
            }
        } return $t1Contents;
    }

    public function setForeignFields($t1Contents, $t1FieldRef, $t2Contents, $t2FieldRef, $bWithAllFields = false){
        $primary_key = $this->_primary_key;
        if(validateVar($t2Contents,'object')){
            $t2Contents = [$t2Contents];
        }
        foreach ($t2Contents as $j => $t2Content){
            foreach ($t1Contents as $i => $t1Content){
                if($t2Content->$t2FieldRef == $t1Content->$t1FieldRef && is_object($t1Content)){
                    $ref = $t1Content->$t1FieldRef;
                    unset($t1Content->$t1FieldRef);
                    foreach ($t1Content as $t1Name => $t1Value){
                        if(isset($t2Contents->$j)){
                            $t2Contents->$j->{$t2FieldRef.'_'.$t1Name} = $t1Value;
                        } else if(isset($t2Contents[$j])){
                            $t2Contents[$j]->{$t2FieldRef.'_'.$t1Name} = $t1Value;
                        } else if(isset($t2Contents->{$t2FieldRef.'_'.$t1Name} )){
                            $t2Contents->{$t2FieldRef.'_'.$t1Name} = $t1Value;
                        }
                    }
                    $t1Content->$t1FieldRef = $ref;
                }
            }
        } return $t2Contents;
    }

    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if(!$id){
            return false;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $response = $this->db->delete($this->_table_name);
        if(validateVar($response, 'array')){
            $response['localTable'] = $this->_table_name;
        }
        return $response;
    }
}