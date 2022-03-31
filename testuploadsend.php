<?php

$folder_name = "img/";
// $target_file = $target_dir . basename($_FILES["file"]["name"]);

// if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
//    $status = 1;
// }

if(!empty($_FILES)){
    $temp_file = $_FILES['file']['tmp_name'];
    $location = $folder_name . $_FILES['file']['name'];
    move_uploaded_file($temp_file, $location);
}

if(isset($_POST["name"]))
{
 $filename = $folder_name.$_POST["name"];
 unlink($filename);
}

$result = array();

$files = scandir('img'); //scan img folder and return an array of files name

$output = '<div class="row>';

//check if there are any errors in scan directory function
if(false !== $files){
    foreach($files as $file){
        if('.' != $file && '..' != $file){
            //condition to ignore single dot and double dot file

            $output .= '
            <div class="col-md-2">
             <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
             <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove</button>
            </div>
            ';
        }
    }
}
$output .= '</div>';
echo $output;



?>