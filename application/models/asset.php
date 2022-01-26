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
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tên tài sản !',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Tên tài sản tối đa 30 kí tự !',
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
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập mã tài sản !',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => '* Mã tài sản tối đa 20 kí tự !',
                        Zend_Validate_StringLength::TOO_SHORT => '* Mã tài sản tối thiểu 3 kí tự !',
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND=> '* Mã tài sản đã tồn tại!',
                    ),
                )
            ),
            'asset_group_id' => array(
            new Zend_Validate_NotEmpty(),
            Zend_Filter_Input::MESSAGES => array(
                array(
                    Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập nhóm tài sản !',
                    )
                ),
            ),
            'state' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập tình trạng !',
                    )
                ),
            ),
            'status' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => '* Vui lòng nhập nhóm trạng thái !',
                    )
                ),
            ),
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

        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()){
            $row['name']= $arrParam['name'];
            $row['code']= $arrParam['code'];
            $row['configuration']= $arrParam['configuration'];
            $row['status']= $arrParam['status'];
            $row['asset_group_id']= $arrParam['asset_group_id'];
            $row['state']= $arrParam['state'];
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

//        $id = $this->db->lastInsertId();
//        return $id;
    }

    public function getAsset($id){
        $where = 'asset_id = ' . $id;
        $detail = $this->fetchRow($where)->toArray();
        return $detail;
    }
    public function updateAsset($arrParam){
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()){
            $where = 'asset_id='.$arrParam['id'];
            $row['name']= $arrParam['name'];
            $row['code']= $arrParam['code'];
            $row['configuration']= $arrParam['configuration'];
            $row['status']= $arrParam['status'];
            $row['asset_group_id']= $arrParam['asset_group_id'];
            $row['state']= $arrParam['state'];
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
    public function searchItem($key){

        $select = $this->db->select()
            ->from('tbl_asset_group')
            ->where('is_disabled = 0');
        $keywords = '%'.$key.'%';
        $select->where('lower(description) LIKE ?', $keywords);

        $result = $this->db->fetchAll($select);
        return $result;


    }
}