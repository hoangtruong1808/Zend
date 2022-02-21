<?php
require(LIBRARY_PATH.'/PhpExcel/Classes/PHPExcel.php');

class InventoryController extends Zend_Controller_Action
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

        $this->model = new Model_Inventory();
    }

    //liệt kê dữ liệu trong db
    public function indexAction(){
        $this->view->inventory_list = $this->model->listInventory();
    }
    public function detailAction(){
        $arrParam = $this->_arrParam;

        $this->view->inventory = $this->model->getInventory($arrParam['inventory_id']);
        $this->view->inventory_detail = $this->model->detailInventory($arrParam['inventory_id']);

    }
    public function exportExcelAction(){

        //set no layout
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout()->disableLayout();
        $arrParam = $this->_arrParam;

        //tạo object phpexcel
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('Chi tiết kiểm kê');

        //merge row & column
        $sheet->mergeCells('A2:C2');
        $sheet->mergeCells('A3:C3');
        $sheet->mergeCells('A5:E5');
        $sheet->mergeCells('B7:E7');
        $sheet->mergeCells('B8:E8');
        $sheet->mergeCells('B9:E9');

        //set column width
        $sheet->getColumnDimension('A')->setWidth(17);
        $sheet->getColumnDimension('B')->setWidth(35);
        $sheet->getColumnDimension('c')->setWidth(30);
        $sheet->getColumnDimension('D')->setWidth(30);
        $sheet->getColumnDimension('E')->setWidth(24);

        //set row height
        $sheet->getRowDimension('2')->setRowHeight(20);
        $sheet->getRowDimension('3')->setRowHeight(20);
        $sheet->getRowDimension('5')->setRowHeight(30);
        $sheet->getRowDimension('7')->setRowHeight(20);
        $sheet->getRowDimension('8')->setRowHeight(20);
        $sheet->getRowDimension('9')->setRowHeight(20);
        $sheet->getRowDimension('11')->setRowHeight(20);
        $sheet->getRowDimension('12')->setRowHeight(20);
        $sheet->getRowDimension('13')->setRowHeight(20);
        $sheet->getRowDimension('14')->setRowHeight(20);

        //lấy dữ liệu từ model
        $inventory = $this->model->getInventory($arrParam['inventory_id']);
        $inventory_detail = $this->model->detailInventory($arrParam['inventory_id']);
        var_dump($inventory_detail);
//        exit();

        //thêm data
        $sheet  ->setCellValue('A2', 'VPĐD Plott tại Việt Nam')
                ->setCellValue('A3', '10 Phổ Quang, Phường 2, Tân Bình, Thành phố Hồ Chí Minh')
                ->setCellValue('A5', 'BẢN KIỂM KÊ TÀI SẢN')
                ->setCellValue('A7', 'Người kiểm kê:')
                ->setCellValue('A8', 'Ngày kiểm kê:')
                ->setCellValue('A9', 'Ghi chú:')
                ->setCellValue('A11', 'STT')
                ->setCellValue('B11', 'Tên tài sản')
                ->setCellValue('C11', 'Tình trạng trước kiểm kê')
                ->setCellValue('D11', 'Tình trạng sau kiểm kê')
                ->setCellValue('E11', 'Lưu ý:')
                ->setCellValue('B7', $inventory['user_name'])
                ->setCellValue('B8', $inventory['inventory_date'])
                ->setCellValue('B9', $inventory['inventory_note']);
        $next_row = 12;
        $stt = 1;
        foreach($inventory_detail as $key=>$value){
            $sheet->setCellValue('A'.$next_row, $stt);
            $sheet->setCellValue('B'.$next_row, $value['asset_name']);
            $sheet->setCellValue('C'.$next_row, $value['before_status_name']);
            $sheet->setCellValue('D'.$next_row, $value['inventory_status_name']);
            $sheet->setCellValue('E'.$next_row, $value['note']);

            $sheet->getStyle('A'.$next_row.':E'.$next_row)->applyFromArray([
                'font' => [
                    'size' => 11,
                    'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
                ],
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    )
                )
            ]);

            $next_row++;
            $stt++;
        }

        $sheet->getStyle('A2:C2')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
            ],
            'alignment' => [
                'horizontal' => PHPEXcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPEXcel_Style_Alignment::VERTICAL_CENTER
            ],

        ]);

        $sheet->getStyle('A3:C3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
            ],
            'alignment' => [
                'horizontal' => PHPEXcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPEXcel_Style_Alignment::VERTICAL_CENTER
            ],

        ]);

        $sheet->getStyle('A5:E5')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
                'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
            ],
            'alignment' => [
                'horizontal' => PHPEXcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPEXcel_Style_Alignment::VERTICAL_CENTER
            ],

        ]);

        $sheet->getStyle('A7:E9')->applyFromArray([
            'font' => [
                'size' => 11,
                'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
            ],

        ]);

        $sheet->getStyle('A11:E11')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 11,
                'name' => 'Arial',
//                'color' => array('rgb' => '16365C'),
            ],
            'alignment' => [
                'horizontal' => PHPEXcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPEXcel_Style_Alignment::VERTICAL_CENTER
            ],
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                )
            )
        ]);

//        $inventory_detail = $this->model->detailInventory($arrParam['inventory_id']);
//        foreach($inventory_detail as $value){
//            $rowCount++;
//            $sheet->setCellValue('A'.$rowCount, $value.asset_name);
//        }


        //lưu file excel
        $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
        ob_end_clean();
        $filename = 'ChiTiếtKiểmKê.xlsx';
        $objWriter->save($filename);

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        ob_end_clean();

        header("Pragma: no-cache");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment;filename=$filename");
        header("Content-Length: ". filesize($filename));
        header("Content-Transfer-Encoding: binary ");

        readfile($filename);
    }

}