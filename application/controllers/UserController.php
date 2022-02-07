<?php
class UserController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $model;


    public function init(){
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

        $this->view->title = "Quản lý nhân sự";
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
        $menu = new Model_Menu();
        $this->view->menu_list = $menu->listItems();

        $status = new Model_Status();
        $this->view->status_list = $status->listStatus();

        $state = new Model_State();
        $this->view->state_list = $state->listState();

        if ($this->_request->isPost()) {
            //xử lý image
            $file_adapter = new Zend_File_Transfer_Adapter_Http();
            $file_adapter->setDestination(ASSET_IMAGE_PATH);

            //validate for image
            $size_validator = new Zend_Validate_File_Size(array('max' => '1000KB'));
            $size_validator->setMessage('Dung lượng ảnh quá lớn !!!', Zend_Validate_File_Size::TOO_BIG);
            $exist_validator = new Zend_Validate_File_Upload;
            $exist_validator->setMessage('*Vui lòng chọn ảnh!!');

            $file_adapter->addValidator($size_validator);
            $file_adapter->addValidator($exist_validator);

            //lấy giá trị image
            $file_upload = $file_adapter->getFileInfo();
            $arrParam['image']=$file_upload['image']['name'];

            $asset_add = $this->model->addAssets($arrParam);

            //get error input
            if ($asset_add === true){
                if($file_adapter->isValid()){
                    $file_adapter->receive();
                }
                else{
                    $error_input['image'] = $file_adapter->getMessages();
                }
            }
            else{
                $error_input = $asset_add;
            }

            // nếu không có error input thì thông báo thành công, không thì trả ra view error input
            if (empty($error_input)){
                $_SESSION['message'] = 'Thêm tài sản thành công!';
                $this->redirect('/asset');
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
        $menu = new Model_Menu();
        $this->view->menu_list = $menu->listItems();

        $status = new Model_Status();
        $this->view->status_list = $status->listStatus();

        $state = new Model_State();
        $this->view->state_list = $state->listState();

        //lấy dữ liệu
        $this->view->asset = $this->model->getAsset($arrParam["id"]);

        if ($this->_request->isPost()) {
            //xử lý image
            $file_adapter = new Zend_File_Transfer_Adapter_Http();
            $file_adapter->setDestination(ASSET_IMAGE_PATH);

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

            $asset_update = $this->model->updateAsset($arrParam);

            //get error input
            if ($asset_update === true){
                if ($file_upload['image']['name']) {
                    if ($file_adapter->isValid()) {
                        $file_adapter->receive();
                    } else {
                        $error_input['image'] = $file_adapter->getMessages();
                    }
                }
            }
            else{
                $error_input = $asset_update;
            }

            // nếu không có error input thì thông báo thành công, không thì trả ra view error input
            if (empty($error_input)){
                $_SESSION['message'] = 'Cập nhật tài sản thành công!';
                $this->redirect('/asset');
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
        echo 'truongnguyen484';
        //lấy dữ liệu

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        $this->view->asset = $this->model->getAsset($arrParam["id"]);

    }

}