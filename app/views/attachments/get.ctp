<?php
header ("Expires: Mon, 28 Oct 2008 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: public, must-revalidate");
header ("Pragma: public");
header ("Content-type: application/octet-stream");
header("Content-Type: application/force-download");
header("Content-Type: application/download");
header("Content-Transfer-Encoding: binary");
header('Content-Disposition: attachment; filename="'.$attachment['Attachment']['filename'].'"');

echo $attachment['Attachment']['file_store'];
?>