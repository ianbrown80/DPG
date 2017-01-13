<?php

$folder = $_POST["folder"];
$jsonData = array();
$dir = "gallery/" . $folder . "/";
$dirHandle = opendir($dir); 
$i = 0;

while ($file = readdir($dirHandle)) {
    
	if(!is_dir($file) && preg_match("/.jpg|.gif|.png|.jpeg/i", $file)) {
        
		$i++;
		$src = "$dir$file";
        $jsonData["img$i"]["src"] = $src;
        
    }
    
}

closedir($dirHandle);
echo json_encode($jsonData);
?>