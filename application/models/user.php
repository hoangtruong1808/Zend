<?php
class Model_User extends Zend_Db_Table{

    protected $_name = 'tbl_user';
    protected $_primary = 'user_id';
    protected $db;
    protected $_filter = null;
    protected $_validate = null;
    protected $_option = null;

    public function init(){
        $this->db = Zend_Registry::get('connectDb');

        $this->_filter = array(
            'user_id' => array('Int'),
        );
    }

    public function listUsers(){
        //$result = $this->fetchAll($where, $order, $count, $offet);
        $select = $this->db->select()
            ->from('tbl_user')
            ->join('tbl_roles','tbl_user.role_id=tbl_roles.role_id', array('role_name'=>'name'))
            ->where('tbl_user.is_disabled = 0')
            ->order('tbl_user.user_id DESC');
        $result = $this->db->fetchAll($select);
        return $result;
    }
    public function addUser($arrParam){

        $this->_validate = array(
            'name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' =>3,
                        'max' => 30
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập tên người dùng',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Tên người dùng tối đa 30 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Tên người dùng tối thiểu 3 kí tự',
                    )
                )
            ),
            'email' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_EmailAddress(),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_user',
                        'field' => 'email'
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập email'
                    ),
                    array(
                        Zend_Validate_EmailAddress::INVALID => 'Không nhận dạng được email',
                        Zend_Validate_EmailAddress::INVALID_FORMAT => 'Vui lòng nhập đúng định dạng email',
                        Zend_Validate_EmailAddress::INVALID_HOSTNAME => 'Vui lòng nhập đúng định dạng email',
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Email đã tồn tại'
                    )
                )
            ),

            'phone' => array(
                new Zend_Validate_Digits,
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_user',
                        'field' => 'phone'
                    )
                ),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 10,
                        'max' => 11
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => 'Số điện thoại không đúng định dạng'
                    ),
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập số điện thoại'
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Số điện thoại đã được đăng ký'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Số điện thoại tối đa 11 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Số điện thoại tối thiểu 9 kí tự'
                    )

                )
            ),
//
            'password' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 3,
                        'max' => 20
                    )
                ),
                new Zend_Validate_Regex('/^[a-zA-Z0-9_!@#$&*\/]+$/'),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập mật khẩu'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Mật khẩu tối đa 20 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Mật khẩu tối thiểu 3 kí tự'
                    ),
                    array(
                        Zend_Validate_Regex::NOT_MATCH => 'Vui lòng chỉ sử dụng chữ cái, số và ký tự chấm câu thường gặp '
                    )
                )
            ),
            'role' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập vai trò người dùng',
                    )
                ),
            ),
        );

        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);

        $arrParam['password'] = md5($arrParam['password']);
        if ($input->isValid()){
            $row['name']= $arrParam['name'];
            $row['phone']= $arrParam['phone'];
            $row['email']= $arrParam['email'];
            $row['password']= $arrParam['password'];
            $row['role_id']= $arrParam['role'];
            $row['image']= $arrParam['image'];
            $this->db->insert('tbl_user', $row);
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

    public function getUser($id){
        $select = $this->db->select()
            ->from('tbl_user')
            ->join('tbl_roles','tbl_user.role_id=tbl_roles.role_id', array('user_role'=>'name'))
            ->where('tbl_user.user_id ='. $id)
            ->where('tbl_user.is_disabled = 0')
            ->order('tbl_user.user_id DESC');
        $result = $this->db->fetchRow($select);
        return $result;
    }
    public function updateUser($arrParam){

        $this->_validate = array(
            'name' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' =>3,
                        'max' => 30
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập tên người dùng',
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Tên người dùng tối đa 30 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Tên người dùng tối thiểu 3 kí tự',
                    )
                )
            ),
            'email' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_EmailAddress(),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_user',
                        'field' => 'email',
                        'exclude' => array(
                            "field" => "user_id",
                            "value" => $arrParam['id']
                        )
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập email'
                    ),
                    array(
                        Zend_Validate_EmailAddress::INVALID => 'Không nhận dạng được email',
                        Zend_Validate_EmailAddress::INVALID_FORMAT => 'Vui lòng nhập đúng định dạng email',
                        Zend_Validate_EmailAddress::INVALID_HOSTNAME => 'Vui lòng nhập đúng định dạng email',
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Email đã tồn tại'
                    )
                )
            ),

            'phone' => array(
                new Zend_Validate_Digits,
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_Db_NoRecordExists(
                    array(
                        'table' => 'tbl_user',
                        'field' => 'phone',
                        'exclude' => array(
                            "field" => "user_id",
                            "value" => $arrParam['id']
                        )
                    )
                ),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 10,
                        'max' => 11
                    )
                ),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_Digits::NOT_DIGITS => 'Số điện thoại không đúng định dạng'
                    ),
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập số điện thoại'
                    ),
                    array(
                        Zend_Validate_Db_NoRecordExists::ERROR_RECORD_FOUND => 'Số điện thoại đã được đăng ký'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Số điện thoại tối đa 11 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Số điện thoại tối thiểu 9 kí tự'
                    )

                )
            ),
//
            'password' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 3,
                        'max' => 20
                    )
                ),
                new Zend_Validate_Regex('/^[a-zA-Z0-9_!@#$&*\/]+$/'),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập mật khẩu'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Mật khẩu tối đa 20 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Mật khẩu tối thiểu 3 kí tự'
                    ),
                    array(
                        Zend_Validate_Regex::NOT_MATCH => 'Vui lòng chỉ sử dụng chữ cái, số và ký tự chấm câu thường gặp '
                    )
                )
            ),
            'role' => array(
                new Zend_Validate_NotEmpty(),
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập vai trò người dùng',
                    )
                ),
            ),
        );

        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()){
            $where = 'user_id='.$arrParam['id'];
            $row['name']= $arrParam['name'];
            $row['phone']= $arrParam['phone'];
            $row['email']= $arrParam['email'];
            $row['role_id']= $arrParam['role'];

            if (!empty($arrParam['image'])){
                $row['image']= $arrParam['image'];
            }

            $this->db->update('tbl_user', $row, $where);
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
    public function deleteUser($ID){
        $where = 'user_id= '.$ID;
        $row['is_disabled']=1;
        $row['deleted_at']= date("Y-m-d H:i:s");
        $this->db->update('tbl_user', $row, $where);
    }
    public function getBorrowAsset($user_id){
        $select = $this->db->select()
            ->from('tbl_borrow')
            ->join('tbl_asset','tbl_asset.asset_id=tbl_borrow.asset_id', array('borrow_asset_name'=>'name'))
            ->join('tbl_user','tbl_user.user_id=tbl_borrow.user_id')
            ->where('tbl_user.user_id ='. $user_id)
            ->where('tbl_borrow.return_date IS NULL')
            ->where('tbl_asset.is_disabled = 0')
//            ->where('tbl_asset.is_disabled = 0')
            ->order('tbl_borrow.borrow_id DESC');

        $result = $this->db->fetchAll($select);

        return $result;
    }
    public function returnAsset($borrow_id){

        //update vào bảng mượn
        $row['return_date']= date("Y-m-d");
        $where = 'borrow_id= '.$borrow_id;
        $this->db->update('tbl_borrow', $row, $where);
    }
    public function updateAssetState($asset_id){

        $row['state'] = 2;
        $where = 'asset_id= '.$asset_id;
        $this->db->update('tbl_asset', $row, $where);
    }

    public function getPassword($user_id){
        $select = $this->db->select()
            ->from('tbl_user')
            ->where('tbl_user.user_id ='. $user_id);
        $result = $this->db->fetchRow($select);
        return $result['password'];
    }
    public function changePassword($arrParam){

        $this->_validate = array(
            'new_password' => array(
                new Zend_Validate_NotEmpty(),
                new Zend_Validate_StringLength(
                    array(
                        'min' => 3,
                        'max' => 20
                    )
                ),
                new Zend_Validate_Regex('/^[a-zA-Z0-9_!@#$&*\/]+$/'),
                'breakChainOnFailure' => true,
                Zend_Filter_Input::MESSAGES => array(
                    array(
                        Zend_Validate_NotEmpty::IS_EMPTY => 'Vui lòng nhập mật khẩu'
                    ),
                    array(
                        Zend_Validate_StringLength::TOO_LONG => 'Mật khẩu tối đa 20 kí tự',
                        Zend_Validate_StringLength::TOO_SHORT => 'Mật khẩu tối thiểu 3 kí tự'
                    ),
                    array(
                        Zend_Validate_Regex::NOT_MATCH => 'Vui lòng chỉ sử dụng chữ cái, số và ký tự chấm câu thường gặp '
                    )
                )
            ),
        );
        $result = null;
        $input = new Zend_Filter_Input($this->_filter, $this->_validate, $arrParam, $this->_option);
        if ($input->isValid()){
//            echo 'abc';
            $row['password'] = md5($arrParam['new_password']);
            $where = 'user_id= '.$arrParam['user_id'];
            $this->db->update('tbl_user', $row, $where);
            $result = true;
        }
        else {
            if ($input->hasInvalid() || $input->hasMissing()) {
                $messages = $input->getMessages();
                foreach($messages as $key=>$message_value){
                    foreach($message_value as $key=>$value){
                        $result = $value;
                    }
                }
            }
        }
        return $result;
    }
}