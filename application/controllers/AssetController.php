<?php
class AssetController extends Zend_Controller_Action
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

        $this->model = new Model_Asset;

        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        if ($this->_flashMessenger->getMessages()) {
            $this->view->flashmessage = $this->_flashMessenger->getMessages();
        }
    }

    //liệt kê dữ liệu trong db
    public function indexAction(){

        //lấy dữ liệu
        $user = new Model_User;
        $this->view->user_list = $user->listUsers();

        $this->view->title = "Quản lý tài sản";
        $this->view->asset_list = $this->model->listAssets();
        if (isset($_SESSION['message'])) {
            $this->view->message = $_SESSION['message'];
            unset( $_SESSION['message'] );
        }

    }

    //thêm dữ liệu vào db
    public function addAction(){

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

        //lấy giá trị arrParam từ request

        //lấy danh sách từ các bảng con
        $menu = new Model_Menu();
        $this->view->menu_list = $menu->listItems();

        $status = new Model_Status();
        $this->view->status_list = $status->listStatus();

        $state = new Model_State();
        $this->view->state_list = $state->listState();

        if ($this->_request->isPost()) {
            //set arrParam
            if (!isset($this->_arrParam["asset_group_id"])){
                $this->_arrParam["asset_group_id"]="";
            }
            if (!isset($this->_arrParam["status"])){
                $this->_arrParam["status"]="";
            }

            $arrParam = $this->_arrParam;

            //xử lý image
            $file_adapter = new Zend_File_Transfer_Adapter_Http();
            $file_adapter->setDestination(ASSET_IMAGE_PATH);

            //validate for image
            $size_validator = new Zend_Validate_File_Size(array('max' => '1000KB'));
            $size_validator->setMessage('Dung lượng ảnh quá lớn ', Zend_Validate_File_Size::TOO_BIG);
            $exist_validator = new Zend_Validate_File_Upload;
            $exist_validator->setMessage('Vui lòng chọn ảnh');
            $extension_validator = new Zend_Validate_File_Extension('jpg,png,gif');
            $extension_validator->setMessage('Sai định dạng hình ảnh', Zend_Validate_File_Extension::FALSE_EXTENSION);

            $file_adapter->addValidator($size_validator);
            $file_adapter->addValidator($exist_validator);
            $file_adapter->addValidator($extension_validator);

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

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

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
                $size_validator->setMessage('Dung lượng ảnh quá lớn', Zend_Validate_File_Size::TOO_BIG);

                $exist_validator = new Zend_Validate_File_Upload;
                $exist_validator->setMessage('Vui lòng chọn ảnh');

                $extension_validator = new Zend_Validate_File_Extension('jpg,png,gif');
                $extension_validator->setMessage('Sai định dạng hình ảnh', Zend_Validate_File_Extension::FALSE_EXTENSION);

                $file_adapter->addValidator($size_validator);
                $file_adapter->addValidator($exist_validator);
                $file_adapter->addValidator($extension_validator);

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

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //delete item

        if ($this->model->getCurrentBorrow($arrParam["id"])){
            $error_input = ['error_input'=> "Xóa tài sản không thành công!"];
            $this->_helper->json->sendJson($error_input);
        }
        else{
            $this->model->deleteAsset($arrParam["id"]);
            $_SESSION['message'] = 'Xóa tài sản thành công!';
            $this->redirect('/asset');
        }
    }

    //xóa nhiều dữ liệu trong db
    public function multideleteAction(){

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //delete items
        foreach($arrParam["id"] as $item_id)
        {
            var_dump($item_id);
            $this->model->deleteAsset($item_id);
        }
        exit();
    }

    //chi tiết dữ liệu
    public function detailAction(){

        //lấy dữ liệu
        $user = new Model_User;
        $this->view->user_list = $user->listUsers();
        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //lấy thông tin tài sản
        $this->view->asset = $this->model->getAsset($arrParam["id"]);
        //lấy thông tin người mượn tài sản hiện tại
        $this->view->current_borrow = $this->model->getCurrentBorrow($arrParam["id"]);
        //lấy lịch sử sử dụng
        $this->view->all_borrow = $this->model->getAllBorrow($arrParam["id"]);

        if (isset($_SESSION['message'])) {
            $this->view->message = $_SESSION['message'];
            unset($_SESSION['message'] );
        }
        if (isset($_SESSION['alert'])) {
            $this->view->alert = $_SESSION['alert'];
            echo $this->view->alert;
            echo $_SESSION['alert'];
//            unset($_SESSION['alert'] );
        }
    }
    //xuất người dùng
    public function borrowAction(){

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

        //set no layout
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //validation
        $validator = new Zend_Validate_NotEmpty();

        if($validator->isValid($arrParam['borrow_user_id']) && $validator->isValid($arrParam['borrow_date'])) {
            //thành công
            $this->model->borrow($arrParam);
//            $this->redirect('/asset/detail/id/'.$arrParam['asset_id']);
        }
        else{
            $error_input = ['error_input'=> "Vui lòng nhập đầy đủ thông tin!"];
            $this->_helper->json->sendJson($error_input);
        };

    }

    //kiểm kê
    public function inventoryAction(){

        if($_SESSION['role_id']==3){
            $this->redirect('/asset');
        }

        $arrParam = $this->_arrParam;
        //xử lý asset_id
        if (isset($arrParam['asset_id'])) {
            $arrParam['asset_id'] = explode(',', $arrParam['asset_id']);
            $_SESSION['inventory_asset_id'] =  $arrParam['asset_id'];
        }


        if (!empty($_SESSION['inventory_asset_id'][0])) {
            //hiển thị dnah sách cần kiểm kê
            $this->view->asset_list = $this->model->listInventoryAsset($_SESSION['inventory_asset_id']);

            //hiển thị danh sách tình trạng trong input
            $state = new Model_Status();
            $this->view->status_list = $state->listStatus();

            //submit kiểm kê
            $validator = new Zend_Validate_NotEmpty();

            if (isset($arrParam['inventory_detail_status'])) {
                if($validator->isValid($arrParam['inventory_date'])){
                    if(strtotime($arrParam['inventory_date']) <= strtotime(date("Y-m-d"))) {
                        $inventory_id = $this->model->inventory($arrParam);
                        $this->_redirect('/inventory/detail/inventory_id/'.$inventory_id);
//                        echo 'abc';
                    }
                    else{
                        $this->_flashMessenger->addMessage(array('alert' => 'Ngày kiểm kê trước ngày hiện tại'));
                        $this->_redirect('/asset/inventory');
                    }
                }
                else {
                    $this->_flashMessenger->addMessage(array('alert' => 'Vui lòng nhập đầy đủ thông tin'));
                    $this->_redirect('/asset/inventory');
                }
            }
        }
        else{
            //nếu không có asset_id thì chuyển sang trang asset và báo lỗi
            $this->_flashMessenger->addMessage(array('alert' => 'Chọn tối thiểu một dòng!'));
            $this->_redirect('/asset');
        }

    }

}