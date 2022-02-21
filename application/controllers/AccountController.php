<?php
class AccountController extends Zend_Controller_Action
{
    protected $_arrParam;
    protected $_currentController;
    protected $_actionMain;
    protected $model;
    protected $account_id;

    public function init(){

        $auth = Zend_Auth::getInstance();
        if(!$auth->hasIdentity()){
            $this->redirect('/login');
        }
        $this->account_id = $auth->getIdentity()->user_id;


        $this->_helper->layout->setLayout('layout_admin');

        $this->_arrParam = $this->_request->getParams();
        $this->_currentController = '/' . $this->_arrParam['controller'];
        $this->_actionMain = '/' . $this->_arrParam['controller'] . '/';

        $this->view->arrParam = $this->_arrParam;
        $this->view->currentController = $this->_currentController;
        $this->view->actionMain = $this->_actionMain;

        $this->model = new Model_User;
    }

    public function indexAction(){
        //lấy giá trị arrParam từ request


        $arrParam = $this->_arrParam;

        //lấy dữ liệu
        $this->view->user = $this->model->getUser($this->account_id);

        $this->view->all_borrow_asset = $this->model->getBorrowAsset($this->account_id);

    }
    public function changePasswordAction(){
        $arrParam = $this->_arrParam;
        $old_password = $arrParam['old_password'];
        $new_password = $arrParam['new_password'];
        $re_password = $arrParam['re_password'];
        $this->model->getPassword($arrParam['user_id']);
        if ($new_password==$re_password){
            if ($this->model->getPassword($arrParam['user_id']) == md5($old_password)){

                $change_password = $this->model->changePassword($arrParam);

                if ($change_password===true)
                {
                    echo 'abc';
                }
                else{
                    $error_input = ['error_input' => $change_password];
                }
            }
            else {
                $error_input = ['error_input' => "Bạn nhập sai mật khẩu!"];
            }
        }
        else {
            $error_input = ['error_input' => "Mật khẩu không khớp!"];
        }
        if (isset($error_input)) {
            $this->_helper->json->sendJson($error_input);
        }
        exit();
    }
}