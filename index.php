<?php

require_once "XMLPDF.php";

$xml_path = 'layout.xml';
$pdf = null;
if(file_exists($xml_path)){
    $xml = simplexml_load_file($xml_path);
    if($xml === false)
    {
        exit('Error in xml file');
    }
    else{
        $layout = json_decode(json_encode($xml), true);
        //print_r($layout);
        //print_r($layout['unit']);


        // Instanciation of inherited class
        $pdf = new XML_PDF();

        foreach($layout['page'] as $page)
        {
            $pdf->AddCustomizedPage($page);
        }
        $pdf->Output();
    }

}
else{
    exit('Failed to find xml file');
}



?>