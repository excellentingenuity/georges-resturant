<?php

function pdf_create($html, $filename='', $stream=TRUE) 
{
	//$this->fb->setEnabled(true);
	//$this->fb->log("inside dompdf helper before require");
	
   require_once("dompdf/dompdf_config.inc.php");
   
    //$this->fb->log("inside dompdf helper");
    
ini_set("memory_limit", "999M");
ini_set("max_execution_time", "999");
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>