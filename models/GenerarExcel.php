<?php
require "../resources/PHPExcel/PHPExcel.php";

class GenerarExcel{


    public function borrar(){
        $files = glob('../tmp/*');
        foreach($files as $file){
            if(is_file($file))
                unlink($file);
        }
    }


    public function generar($resp){
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Itech")
                                     ->setLastModifiedBy("Itech")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Report");

        $objPHPExcel->setActiveSheetIndex(0)
                 ->setCellValue('A1', 'CEDULA VOTANTE')
                 ->setCellValue('B1', 'CANDIDATOS')
                 ->setCellValue('C1', 'CATEGORIA')
                 ->setCellValue('D1', 'VOTACION')
                 ->setCellValue('E1', 'PLANCHA');

        foreach($resp as $key=>$row){
            $objPHPExcel->setActiveSheetIndex(0)
                     ->setCellValue('A' . ($key + 2), $row['ccVotante'])
                     ->setCellValue('B' . ($key + 2), $row['nombres'])
                     ->setCellValue('C' . ($key + 2), $row['categoria'])
                     ->setCellValue('D' . ($key + 2), $row['forma_votacion'])
                     ->setCellValue('E' . ($key + 2), $row['plancha']);
        }

        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);

        $objPHPExcel->setActiveSheetIndex(0);

        $nombrearchivo = 'reporte_'.date("Y-m-d");


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'.$nombrearchivo.'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 2015 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('../tmp/'.$nombrearchivo.'.xlsx');
        
        return '../tmp/'.$nombrearchivo.'.xlsx';
    }

}

?>
