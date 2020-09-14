<?php
include 'config.php';
// get contents of the current directory
$files = ftp_mlsd($con, "/");



foreach($files as $file) {
	if ($file["type"] == "file"){
		$data[] = $file;
		
	}
}

echo json_encode($data);

ftp_close($con);