<?php
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

class PHPExcel_reader {

    function __construct() {
        $ci =& get_instance();
        $ci->load->library('PHPExcel');
    }

    function read_from_excel ($filename,$total_worksheet = 1) {
        //try to load the file
        try {
            $inputFileType = PHPExcel_IOFactory::identify($filename);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($filename);
        } catch(Exception $e) {
            return ["is_error" => TRUE, "error_msg" =>'Error loading file "'.pathinfo($filename,PATHINFO_BASENAME).'": '.$e->getMessage()];
        }

        $models = array();

        $sheet = 1;

        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            // echo 'Worksheet - ' , $worksheet->getTitle() , EOL;
            if ($sheet <= $total_worksheet) {
                foreach ($worksheet->getRowIterator() as $row) {

                    // echo '    Row number - ' , $row->getRowIndex() , EOL;
                    if ($row->getRowIndex() > 1) {
                        $model = array();
                        $cellIterator = $row->getCellIterator();
                        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                        foreach ($cellIterator as $cell) {

                            if (!is_null($cell)) {
                                // echo '        Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue() , EOL;
                                if(PHPExcel_Shared_Date::isDateTime($cell) && $cell->getValue() != "") {
                                    $dateValue = PHPExcel_Shared_Date::ExcelToPHP(trim($cell->getValue()));
                                    $model[] = date('Y-m-d H:i:s',$dateValue);
                                } else {
                                    $model[] = trim($cell->getCalculatedValue());
                                }
                            }
                        }
                        $models[] = $model;
                    }
                }
            }
            $sheet++;
        }
        return ["is_error" => FALSE, "datas" => $models];
    }

	public function exportToExcelSingleSheets($datas,$filename = null, $merge = null, $autoFilter = null, $first_col = null, $last_col = null, $first_no = null, $last_no = null) {
        //creating new workbook
        $objPHPExcel = new PHPExcel();
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $objWorksheet->fromArray($datas);

        if (!$filename) $filename = "Book ".date('Y-m-d');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

        //set filter
		$objPHPExcel->getActiveSheet()->setAutoFilter(
			$objPHPExcel->getActiveSheet()->calculateWorksheetDimension()
		);

		if ($merge) {
			$objPHPExcel->getActiveSheet()->mergeCells($merge);
			$objPHPExcel->getActiveSheet()->setAutoFilter($autoFilter);
			$style = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb'=>'C1D2F5'),
				),
				'font'  => array(
					'bold'  => true,
					'size'  => 15,
					'name'  => 'Arial'
				),
			);


			$default_border = array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb'=>'1006A3')
			);

			$style_odd = array(
				'borders' => array(
					'allborders' => $default_border,
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb'=>'BFCAE3'),
				),
			);

			$style_even = array(
				'borders' => array(
					'allborders' => $default_border,
				),
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb'=>'AABDE6'),
				),
			);

			$objPHPExcel->getActiveSheet()->getStyle($merge)->applyFromArray($style);

			for($i = $first_no; $i <= $last_no; $i++) {
				if ($i%2 == 0) {
					$objPHPExcel->getActiveSheet()->getStyle($first_col.$i.":".$last_col.$i)->applyFromArray($style_even);
				} else {
					$objPHPExcel->getActiveSheet()->getStyle($first_col.$i.":".$last_col.$i)->applyFromArray($style_odd);
				}
			}

			for($col = $first_col; $col <= $last_col; $col++) {
				$objPHPExcel->getActiveSheet()
					->getColumnDimension($col)
					->setAutoSize(true);
			}

		} else {

			for($col = $first_col; $col <= $last_col; $col++) {
				$objPHPExcel->getActiveSheet()
					->getColumnDimension($col)
					->setAutoSize(true);
			}
		}

		// Redirect output to a clientâ€™s web browser (Excel2007)
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        // header('Cache-Control: max-age=0');
        // // If you're serving to IE 9, then the following may be needed
        // header('Cache-Control: max-age=1');
        //
        // // If you're serving to IE over SSL, then the following may be needed
        // header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        // header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        // header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        // header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_start();
		$objWriter->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();

        return $xlsData;
		// exit;
	}

    public function get_col_letter($num){
        $comp=0;
        $pre='';
        $letters=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

        //if the number is greater than 26, calculate to get the next letters
        if($num > 26){
            //divide the number by 26 and get rid of the decimal
            $comp=floor($num/26);

            //add the letter to the end of the result and return it
        if($comp!=0)
            // don't subtract 1 if the comparative variable is greater than 0
            return $this->get_col_letter($comp).$letters[($num-$comp*26)];
        else
                return $this->get_col_letter($comp).$letters[($num-$comp*26)-1];
        }
        else
        //return the letter
            return $letters[($num-1)];
    }

}
