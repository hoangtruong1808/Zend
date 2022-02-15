<?php
class Model_Asset extends Zend_Db_Table{

    protected $_name = 'tbl_asset';
    protected $_primary = 'asset_id';
    protected $db;
    protected $_filter = null;
    protected $_validate = null;
    protected $_option = null;

    public function init(){
        $this->db = Zend_Registry::get('connectDb');

        $this->_filter = array(
            'asset_id' => array('Int'),
        );

    }

    public function countItem(){
        $select = $this->db->select()
            ->from('tbl_asset_group', array('COUNT(group_id)'))
            ->where('is_disabled = 0');
        $result = $this->db->fetchOne($select);
        return $result;

    }

    public function listAssets(){

        //$result = $this->fetchAll($where, $order, $count, $offet);
        $select = $this->db->select('tbl_person.name')
            ->from('tbl_asset')
            ->join('tbl_status','tbl_asset.status=tbl_status.status_id')
            ->join('tbl_state','tbl_asset.state=tbl_state.state_id')
            ->where('tbl_asset.is_disabled = 0')
            ->order('tbl_asset.asset_id DESC');

        $result = $this->db->fetchAll($select);
        return $result;
    }
    public function addAssets($arrParam){

        $this->_validate = array(
            'name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'max' => 30
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập tên tài sản ',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Tên tài sản tối đa 30 kí tự ',
                    )
                )
            ),
            'code' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'max' => 20,
                        'min' => 3
                    )
                ),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_asset',
                        'field' => 'code'
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập mã tài sản ',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Mã tài sản tối đa 20 kí tự ',
                        Zend_Validate_StringLength::TOO_SHORT => 'Mã tài sản tối thiểu 3 kí tự ',
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND=> 'Mã tài sản đã tồn tại',
                    ),
                )
            ),
            'asset_group_id' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập nhóm tài sản ',
                    )
                ),
            ),
            'status' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập nhóm tình trạng',
                    )
                ),
            ),
        );
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);

        if ($input->isValid()){
            $row['name']= $arrParam['name'];
            $row['code']= $arrParam['code'];
            $row['configuration']= $arrParam['configuration'];
            $row['status']= $arrParam['status'];
            $row['asset_group_id']= $arrParam['asset_group_id'];
            $row['state']= 2;
            $row['image']= $arrParam['image'];
            $this->db->insert('tbl_asset', $row);
            $result = true;
        }
        else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;

    }

    public function getAsset($id){
        $select = $this->db->select()
            ->from('tbl_asset')
            ->join('tbl_status','tbl_asset.status=tbl_status.status_id')
            ->join('tbl_state','tbl_asset.state=tbl_state.state_id')
            ->join('tbl_asset_group','tbl_asset.asset_group_id=tbl_asset_group.group_id', array('group_name'=>'description'))
            ->where('tbl_asset.asset_id ='. $id)
            ->where('tbl_asset.is_disabled = 0')
            ->order('tbl_asset.asset_id DESC');

        $result = $this->db->fetchRow($select);

//        $where = 'asset_id = ' . $id;
//        $detail = $this->fetchRow($where)->toArray();
        return $result;
    }
    public function updateAsset($arrParam){

        $this->_validate = array(
            'name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'max' => 30
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập tên tài sản ',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Tên tài sản tối đa 30 kí tự ',
                    )
                )
            ),
            'code' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'max' => 20,
                        'min' => 3
                    )
                ),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_asset',
                        'field' => 'code',
                        'exclude' => array(
                            "field" => "asset_id",
                            "value" => $arrParam['id']
                        )
                    )
                ),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập mã tài sản ',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Mã tài sản tối đa 20 kí tự ',
                        Zend_Validate_StringLength::TOO_SHORT => 'Mã tài sản tối thiểu 3 kí tự ',
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND=> 'Mã tài sản đã tồn tại',
                    ),
                )
            ),
            'asset_group_id' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập nhóm tài sản ',
                    )
                ),
            ),
            'status' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập tình trạng ',
                    )
                ),
            ),
        );

        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()){
            $where = 'asset_id='.$arrParam['id'];
            $row['name']= $arrParam['name'];
            $row['code']= $arrParam['code'];
            $row['configuration']= $arrParam['configuration'];
            $row['status']= $arrParam['status'];
            $row['asset_group_id']= $arrParam['asset_group_id'];
            if (!empty($arrParam['image'])){
                $row['image']= $arrParam['image'];
            }
            $this->db->update('tbl_asset', $row, $where);
            $result = true;
        }
        else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                $result = $messages;
            }
        }
        return $result;
    }
    public function deleteAsset($ID){
        $where = 'asset_id= '.$ID;
        $row['is_disabled']=1;
        $row['deleted_at']= date("Y-m-d H:i:s");
        $this->db->update('tbl_asset', $row, $where);
    }
    public function borrowUser($arrParam){

        //insert vào bảng mượn
        $row['asset_id']= $arrParam['asset_id'];
        $row['user_id']= $arrParam['borrow_user_id'];
        $row['borrow_date']= $arrParam['borrow_date'];

        $this->db->insert('tbl_borrow', $row);

        //chuyển tài sản thành trạng thái đang sử dụng
        $row_asset['state'] = 1;
        $where = 'asset_id= '.$arrParam['asset_id'];
        $this->db->update('tbl_asset', $row_asset, $where);
    }
    public function getCurrentBorrow($asset_id){
        $select = $this->db->select()
            ->from('tbl_borrow')
            ->join('tbl_asset','tbl_asset.asset_id=tbl_borrow.asset_id')
            ->join('tbl_user','tbl_user.user_id=tbl_borrow.user_id', array('borrow_user_name'=>'name'))
            ->where('tbl_asset.asset_id ='. $asset_id)
            ->where('tbl_asset.is_disabled = 0')
            ->order('tbl_borrow.borrow_id DESC');

        $result = $this->db->fetchRow($select);

        return $result;
    }
    public function getAllBorrow($asset_id){
        $select = $this->db->select()
            ->from('tbl_borrow')
            ->join('tbl_asset','tbl_asset.asset_id=tbl_borrow.asset_id')
            ->join('tbl_user','tbl_user.user_id=tbl_borrow.user_id', array('borrow_user_name'=>'name'))
            ->where('tbl_asset.asset_id ='. $asset_id)
            ->where('tbl_asset.is_disabled = 0')
            ->order('tbl_borrow.borrow_id DESC');

        $result = $this->db->fetchAll($select);

        return $result;
    }
}