<?php
class UserController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $model;


    public function init(){

        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $this->redirect('/login');
        }
        $this->_helper->layout->setLayout('layout_admin');

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        $this->model = new Model_User;

    }

    //liệt kê dữ liệu trong db
    public function indexAction(){

        $this->view->title = "Quản lý người dùng";
        $this->view->user_list = $this->model->listUsers();
        if (isset($_SESSION['message'])) {
            $this->view->message = $_SESSION['message'];
            unset( $_SESSION['message'] );
        }
    }

    //thêm dữ liệu vào db
    public function addAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //lấy danh sách từ các bảng con
        $role = new Model_Role();
        $this->view->role_list = $role->listRole();

        if ($this->_request->isPost()) {
            //xử lý image
            $file_adapter = new Zend_File_Transfer_Adapter_Http();
            $file_adapter->setDestination(USER_IMAGE_PATH);

            //validate for image
            $size_validator = new Zend_Validate_File_Size(array('max' => '10MB'));
            $size_validator->setMessage('*Dung lượng ảnh quá lớn !!!', Zend_Validate_File_Size::TOO_BIG);
            $upload_validator = new Zend_Validate_File_Upload;
            $upload_validator->setMessage('*Vui lòng chọn ảnh!!');

            $file_adapter->addValidator($size_validator);
            $file_adapter->addValidator($upload_validator);

            //lấy giá trị image
            $file_upload = $file_adapter->getFileInfo();
            $arrParam['image']=$file_upload['image']['name'];


            $user_add = $this->model->addUser($arrParam);

            //get error input
            if ($user_add === true){
                if($file_adapter->isValid()){
                    $file_adapter->receive();
                }
                else{
                    $error_input['image'] = $file_adapter->getMessages();
                }
            }
            else{
                $error_input = $user_add;
            }

            // nếu không có error input thì thông báo thành công, không thì trả ra view error input
            if (empty($error_input)){
                $_SESSION['message'] = 'Thêm người dùng thành công!';
                $this->redirect('/user');
            }
            else {
                $this->view->error_input = $error_input;
            }

        }
    }

    //cập nhật dữ liệu trong db
    public function updateAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //lây dữ liệu từ các bảng khóa ngoại
        $role = new Model_Role();
        $this->view->role_list = $role->listRole();

        //lấy dữ liệu
        $this->view->user = $this->model->getUser($arrParam["id"]);

        if ($this->_request->isPost()) {
            //xử lý image
            $file_adapter = new Zend_File_Transfer_Adapter_Http();
            $file_adapter->setDestination(USER_IMAGE_PATH);

            //lấy giá trị image
            $file_upload = $file_adapter->getFileInfo();
            if ($file_upload['image']['name'])
            {
                $arrParam['image']=$file_upload['image']['name'];
                //validate for image
                $size_validator = new Zend_Validate_File_Size(array('max' => '1000KB'));
                $size_validator->setMessage('Dung lượng ảnh quá lớn !!!', Zend_Validate_File_Size::TOO_BIG);

                $exist_validator = new Zend_Validate_File_Upload;
                $exist_validator->setMessage('*Vui lòng chọn ảnh!!');

                $file_adapter->addValidator($size_validator);
                $file_adapter->addValidator($exist_validator);

            }

            $user_update = $this->model->updateUser($arrParam);

            //get error input
            if ($user_update === true){
                if ($file_upload['image']['name']) {
                    if ($file_adapter->isValid()) {
                        $file_adapter->receive();
                    } else {
                        $error_input['image'] = $file_adapter->getMessages();
                    }
                }
            }
            else{
                $error_input = $user_update;
            }

            // nếu không có error input thì thông báo thành công, không thì trả ra view error input
            if (empty($error_input)){
                $_SESSION['message'] = 'Cập nhật người dùng thành công!';
                $this->redirect('/user');
            }
            else {
                $this->view->error_input = $error_input;
            }

        }

    }

    //xóa dữ liệu trong db
    public function deleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //delete item
        $this->model->deleteUser($arrParam["id"]);
        $_SESSION['message'] = 'Xóa người dùng thành công!';
        $this->redirect('/user');
    }

    //xóa nhiều dữ liệu trong db
    public function multideleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //delete items
        foreach($arrParam["id"] as $item_id)
        {
            $this->model->deleteUser($item_id);
        }
    }

    //chi tiết dữ liệu
    public function detailAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //lấy dữ liệu
        $this->view->user = $this->model->getUser($arrParam["id"]);

        $this->view->all_borrow_asset = $this->model->getBorrowAsset($arrParam["id"]);

    }
    public function returnAssetAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //lấy dữ liệu
        foreach($arrParam["borrow_id"] as $item)
        {
            $this->model->returnAsset($item);
        }
        foreach($arrParam["asset_id"] as $item)
        {
            $this->model->updateAssetState($item);
        }
    }
}