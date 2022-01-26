<?php
class AssetController extends Zend_Controller_Action
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

        $this->model = new Model_Asset;

    }

    //liệt kê dữ liệu trong db
    public function indexAction(){

        $this->view->title = "Quản lý tài sản";
        $this->view->asset_list = $this->model->listAssets();
    }

    //thêm dữ liệu vào db
    public function addAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        $menu = new Model_Menu();
        $this->view->menu_list = $menu->listItems();

        $status = new Model_Status();
        $this->view->status_list = $status->listStatus();

        $state = new Model_State();
        $this->view->state_list = $state->listState();

        if ($this->_request->isPost()) {
            $asset_add = $this->model->addAssets($this->_arrParam);
            if ($asset_add === true){
                $this->redirect('/asset');
            }
            else{
                $this->view->error_input = $asset_add;
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
            $asset_update = $this->model->updateAsset($this->_arrParam);
            if ($asset_update === true){
                $this->redirect('/asset');
            }
            else{
                $this->view->error_input = $asset_update;
            }
        }

    }

    //xóa dữ liệu trong db
    public function deleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //delete item
        $this->model->deleteAsset($arrParam["id"]);
    }

    //xóa nhiều dữ liệu trong db
    public function multideleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //delete items
        foreach($arrParam["id"] as $item_id)
        {
            $this->model->deleteAsset($item_id);
        }
    }

    //tìm kiếm dữ liệu
    public function detailAction(){


    }
}