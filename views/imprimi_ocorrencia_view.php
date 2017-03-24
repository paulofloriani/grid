




<?php
ini_set('default_charset','utf-8'); 
foreach ($ocorrencia as $ocor): endforeach;

 // INCLUDE THE phpToPDF.php FILE
require(base_url('assets')."/phptopdf.php");

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'url',
  "source" => 'base_url(\'painel/mostra_ocorrencia\')',
  "action" => 'download',
  "page_size" => 'A5',
  "file_name" => 'url_fifa_A5.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

?>
