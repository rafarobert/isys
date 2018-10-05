<?php
/**
 * Created by PhpStorm.
 * User: RaFaEl
 * Date: 6/11/2017
 * Time: 12:27 AM
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

Class ES_Model extends ES_Model_Vars {

    protected $_table_name = '';
    protected $_primary_key = "id";
    protected $_primary_filter = "intval";
    protected $_order_by = '';
    public $rules = array();
    protected $_timestaps = true;
//    protected $_num_thumbs = 5;

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
        } else if ($single) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        if($this->db->field_exists('estado',$this->_table_name)){
            $this->db->where_in('estado', ['ENABLED','enabled']);
        } else if($this->db->field_exists('status',$this->_table_name)){
            $this->db->where_in('status', ['ENABLED','enabled']);
        }
        $this->db->order_by($this->_order_by);
        $oResult = $this->db->get($this->_table_name)->$method();
        return $oResult;
    }

    public function setResultsFromData($oResults){
        $aReturn = array();
        foreach ($oResults as $key => $result){
            $aReturn[$key] = $this->setFromData($result);
        }
        return $aReturn;
    }

    public function get_by_selecting($where, $select, $single = false){
        $this->db->select($this->_primary_key.', '.$select);
        $this->db->where($where);
        return $this->get(null, $single);
    }
    public function get_by($where, $bSelecting = false, $single = false){
        $select = isString($where) ? '' : $this->_primary_key;
        $aWheres = [];
        $i = 0;
        if(!isArray($where)){
            $where = [$where];
        }
        $bSelectAdded = false;
        foreach ($where as $k => $wh){
            if(isNumeric($k,false)){
                if($i == 0 && isString($wh)){
                    $aWheres = !isNumeric($k, false) ? [$k => $wh] : [];
                }
                if(isArray($wh)){
                    if(inArray(1,$wh, false)){
                        if(isBoolean($wh[1]) && $wh[1] && !strhas($select,$wh[0])){
                            $select .= ", $wh[0]";
                            $bSelectAdded = true;
                        } else {
                            $select .= "";
                            $bSelectAdded = false;
                        }
                    }
                    if(!$bSelectAdded){
                        foreach ($wh as $j => $wh_interno){
                            if(isNumeric($j,false)){
                                $select .= isString($select) ? ', '.$wh_interno : $wh_interno;
                            }
                        }
                    }
                } else if(isString($wh)){
                    $select .= !strhas($select,$wh) ? ", $wh" : "";
                } else if(isNumeric($wh)){
                    $select .= !strhas($select,$wh) ? ", $wh" : "";
                }
            } else if(isString($k)){
                if(isArray($wh)){
                    if (inArray(1,$wh, false)){
                        $select .= isBoolean($wh[1]) && $wh[1] && !strhas($select,$k) ? ", $k" : "";
                    }
                    $aWheres[$k] = $wh[0];
                } else if(isString($wh)){
                    $aWheres[$k] = $wh;
                    $select .= !strhas($select,$k) ? ", $k" : "";
                } else if(isNumeric($wh)){
                    $aWheres[$k] = $wh;
                    $select .= !strhas($select,$k) ? ", $k" : "";
                }
            } else {
                $select = "";
                $aWheres[$k] = $wh;
            }
            if(!$bSelecting){
                $select = '' ;
            }
            $i++;
        }

        $this->db->select($select);
        foreach($aWheres as $k => $where){
            $this->db->where($k,$where);
        }
        return $this->get(null, $single);
    }

    public function get_one_by($where, $bSelecting = false, $single = false){
        $result = $this->get_by($where, $bSelecting, $single);

        if(countStd($result) == 1){
            return isset($result->{0}) ? $result->{0} : isset($result[0]) ? $result[0] : null;
        } else {
            return $result;
        }
    }

    public function setOptions($fields, $delimiter = ' '){
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
        $this->load->library('session');
        // set timesatamps
        $now = date('Y-m-d H:i:s');

        if($this->db->field_exists('estado', $this->_table_name) && $id == null){
            $data['estado'] = 'ENABLED';
        } else if($this->db->field_exists('status', $this->_table_name) && $id == null){
            $data['status'] = 'ENABLED';
        }

        if($this->_timestaps == true){
            if($id == null){
                if($this->db->field_exists('date_created',$this->_table_name) && $this->db->field_exists('date_modified',$this->_table_name) && $this->db->field_exists('change_count',$this->_table_name)){
                    $data['date_created'] = $now;
                    $data['date_modified'] = $now;
                    $data['change_count'] = 0;
                }
            } else {
                if($this->db->field_exists('date_modified', $this->_table_name) && $this->db->field_exists('change_count', $this->_table_name)){
                    $data['date_modified'] = $now;
                    $data['change_count'] = inArray('change_count', $data, false) ? (int)$data['change_count']+1 : 0;
                }
            }
        }

        if($this->db->field_exists('id_user_modified', $this->_table_name)){
            if($this->db->table_exists('ci_users') && $this->db->field_exists('id_user','ci_users')){
                $oUserLoggued = $this->session->getUserLoggued();
                if (is_object($oUserLoggued) && $id == null){
                    $data['id_user_created'] = $oUserLoggued->id_user;
                    $data['id_user_modified'] = $oUserLoggued->id_user;
                } else if(is_object($oUserLoggued) && $id != null){
                    $data['id_user_modified'] = $oUserLoggued->id_user;
                }
            }
        }

//        if($this->db->field_exists('id_user_created', $this->_table_name)){
//            if($this->db->table_exists('ci_users') && $this->db->field_exists('id_user','ci_users')){
//                $idUserCreated = $this->session->getIdUserLoggued();
//                $userAdmin = CiUsersQuery::create()
//                    ->filterByIdRole(1)
//                    ->findOneByIdUser($idUserCreated);
//                if (isObject($userAdmin)){
//
//                    $data['id_user_created'] = $idUserCreated;
//                }
//            }
//        }

        $funct_v = function ($vals) {
            if(is_array($vals)){
                $str = json_encode($vals);
                return $str;
            }
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

        if(inArray($this->_primary_key,$data) ){
            unset($data[$this->_primary_key]);
        }

        // insert
        if (($id == null || $id == 0) && !isset($data[$this->_primary_key])) {
            $data[$this->_primary_key] = null;
            if (is_numeric($with_id) || is_string($with_id)) {
                $id = $with_id;
                $data[$this->_primary_key] = $with_id;
            }
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
            // update
        } else {
            $filter = $this->_primary_filter;
            unset($data[$this->_primary_key]);
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        $data[$this->_primary_key] = $id;
        return $data;
    }
//    public function getThumbs($obj,$file = '',$field = ''){
//
//    }

    public function getDataFromPost($object = null)
    {
        $data = $this->input->post();
        $oModelUcObjTableS = $this->setFromData($data,$object);
        return $oModelUcObjTableS;
    }

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
        $dirPictures = ROOTPATH."assets/$submod/";
        createFolder($dirPictures);
        // Settings for images
        $config = array(
            'allowed_types'     => config_item('file_types'),
            'max_size'          => config_item('img_max_size'),
            'max_width'         => config_item('img_max_width'),
            'max_height'        => config_item('img_max_heigth'),
            'maintain_ratio'    => true,
            'image_library'     => 'gd2',
            'create_thumb'      => TRUE,
            'num_thumbs'        => 3,
            'width'             => 50,
            'height'            => 50,
            'thumb_marker'      => '-thumb_50',
        );
        $this->load->library('upload', $config);
        $this->load->library('image_lib');

        foreach ($_FILES as $fName => $fSettings){
            $dirPictures .= "$fName/";
            createFolder($dirPictures);
            $dirPicturesThumb = $dirPictures."thumbs";
            createFolder($dirPicturesThumb);
            $this->upload->upload_path = $dirPictures;
            $config['new_image'] = $dirPicturesThumb;
            $files = $_FILES;
            $aThumbs = array();
            $aFiles = ['.docx','xlsx','pdf'];
            $aThumbs = [];
            if (isArray($files[$fName])) {
                if (!$this->upload->do_upload($fName) && $id == null) {
                    return false;
                } else {
                    $this->upload->bFileUploaded = true;
                    $this->upload->num_thumbs = $config['num_thumbs'];
                    $this->upload->file_url = WEBASSETS."$submod/$fName/".$this->upload->orig_name;
                    $file = $this->upload->data();
                    $config['source_image'] = $file['full_path'];
                    for ($i = 0; $i < $config['num_thumbs']; $i++) {
                        if($this->image_lib->initialize($config)){
                            if(in_array($this->image_lib->dest_ext,$aFiles)){
                                $this->upload->num_thumbs = 0;
                            } else {
                                $aThumbs['thumb_'.$config['width']] = $file;
                                unset($aThumbs['thumb_'.$config['width']]['nro_thumbs']);
                                $this->image_lib->resize();
                                $aThumbs['thumb_'.$config['width']]['width'] = $this->image_lib->width;
                                $aThumbs['thumb_'.$config['width']]['height'] = $this->image_lib->height;
                                $aThumbs['thumb_'.$config['width']]['name'] = $this->image_lib->dest_name;
                                $aThumbs['thumb_'.$config['width']]['library'] = $this->image_lib->image_library;
                                $aThumbs['thumb_'.$config['width']]['thumb_marker'] = $this->image_lib->thumb_marker;
                                $aThumbs['thumb_'.$config['width']]['url'] = WEBASSETS."$submod/$fName/thumbs/".$this->image_lib->dest_name;
                                $aThumbs['thumb_'.$config['width']]['raw_name'] = $this->image_lib->dest_name;
                                $aThumbs['thumb_'.$config['width']]['ext'] = $this->image_lib->dest_ext;
                                $aThumbs['thumb_'.$config['width']]['path'] = $this->image_lib->dest_folder;
                                $aThumbs['thumb_'.$config['width']]['full_path'] = $this->image_lib->full_dst_path;
                                $config['width'] = $config['width'] + 150;
                                $config['height'] = $config['height'] + 150;
                                $config['thumb_marker'] = '-thumb_' . $config['width'];
                            }
                        }
                    }
                    $this->upload->data_thumbs = $aThumbs;
                }
                $this->upload->file_name = $files[$fName]['name'];
                $this->upload->file_type = $files[$fName]['type'];
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

    public function findOneBy($arrayData){

        $oField = $this->get_one_by($arrayData, true);

        return $this->setFromData($oField);
    }

    public function selectBy($selects = null){
        $aSelects = array();
        if(isArray($selects)){
            $aSelects = $selects;
        } else if(isString($selects)){
            $aSelects[] = $selects;
        }
        $aData = $this->get_by(array (
            0 => $aSelects,
        ),true);
        return $aData;
    }

    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if(!$id){
            return false;
        }
        if($response = $this->dbforge->setDeleted($this->_table_name,$this->_primary_key,$id)){
            // ------------------ se aplica a archivos con thumbnails ---------------------
            if($this->_table_name == 'ci_files'){
                $oData = $this->filterByIdParent($id);
                foreach ($oData as $file){
                    $this->dbforge->setDeleted($this->_table_name,$this->_primary_key,$file->id_file);
                }
            }
            // ----------------------------------------------------------------------------
        }

        if(validateVar($response, 'array')){
            $response['localTable'] = $this->_table_name;
        }
        return $response;
    }

    /**
     * @var ES_Model $object
     */
    public function saveOrUpdate($object, $id = null){
        $data = $object->getData();
        $object->save($data,$id);
    }
}