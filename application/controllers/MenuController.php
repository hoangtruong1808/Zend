<?php
class MenuController extends Zend_Controller_Action
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

        $this->model = new Model_Menu;

    }

    //liệt kê dữ liệu trong db
    public function indexAction(){
        $this->view->title = "Nhóm tài sản";
        $this->view->menu_list = $this->model->listItems();
    }

    //thêm dữ liệu vào db
    public function addAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //validation
        $description_add = $arrParam['description'];
        $validator = new Zend_Validate_NotEmpty();
        $exist_validator = new Zend_Validate_Db_NoRecordExists(
            array(
                'table' => 'tbl_asset_group',
                'field' => 'description',
            )
        );
        if($validator->isValid($description_add)) {
            if($exist_validator->isValid($description_add)){
                $id = $this->model->addItem($arrParam);
                $id_insert = ['id_insert'=> $id];
                $this->_helper->json->sendJson($id_insert);
            }
            else {
                $error_input = ['error_input'=> "Tên nhóm tài sản đã tồn tại!"];
                $this->_helper->json->sendJson($error_input);
            };
        }
        else{
            $error_input = ['error_input'=> "Vui lòng nhập tên nhóm tài sản!"];
            $this->_helper->json->sendJson($error_input);
        };

    }

    //cập nhật dữ liệu trong db
    public function updateAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //validation
        $description_update = $arrParam['description'];
        $validator = new Zend_Validate_NotEmpty();
        if($validator->isValid($description_update)) {
            $this->model->updateItem($arrParam);
        }
        else{
            $error_input = ['error_input'=> "Vui lòng nhập tên nhóm tài sản!"];
            $this->_helper->json->sendJson($error_input);
        };
    }

    //xóa dữ liệu trong db
    public function deleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;

        //delete item
        $this->model->deleteItem($arrParam["id"]);
    }

    //xóa nhiều dữ liệu trong db
    public function multideleteAction(){

        //lấy giá trị arrParam từ request
        $arrParam = $this->_arrParam;
        //delete items
        foreach($arrParam["id"] as $item_id)
        {
            $this->model->deleteItem($item_id);
        }
    }

    //tìm kiếm dữ liệu
    public function searchAction(){

        $this->view->title = "Nhóm tài sản thông tin";

        $arrParam = $this->_arrParam;

        $this->view->menu_list = $this->model->searchItem( $arrParam["key"]);

    }

}