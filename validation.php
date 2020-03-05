<?php 
$imgToUpload=$_FILES["img_upload"];

//___________________________________________________________________________
//validation test
isfileValid($_FILES);
//___________________________________________________________________________
//functions
function isfileValid($str = null){
    if ($str) {
        $target_dir = "uploads/";
        $target_file  = $_FILES["img_upload"]["name"];
        $size = $_FILES["img_upload"]["size"];
        $type = $_FILES["img_upload"]["type"];
        $count_str = count($target_file);
        for ($i=0; $i < $count_str ; $i++){
        if (checkType($type[$i]) || isfileExist($target_file[$i]) || validate_size($size)){
            echo "Sorry, your file was not uploaded.<br>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES['img_upload']['tmp_name'][$i],"uploads/".$target_file[$i])) {
                $image =  $_FILES["img_upload"]["name"];
                    //echo '<img src= "upload/"."upload/".$image>';
                echo "Sucessfully Uploaded!<br>";
            }else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        } 
        }
    }else
    echo "Choose image to upload";
}
function checkType($type = null){
    if ($type) {
        $allowed = array('jpeg','png');
        if ($type) {
            $strArray = explode('/',$type);
            if (in_array(end($strArray),$allowed))
                return false;
            else{
                echo "Sorry, only JPEG & PNG files are allowed.";
                return true;
            }
        }
    }
}
// Check if file already exists
function isfileExist($target_file = null){
    if ($target_file) {
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br>";
            return true;
        }else
            return false;
    }
}
// Check file size
function validate_size($size = null){
    if ($size) {
        if ($size < 1000000) {
            echo "Sorry, your file is too large.<br>";
            return true;
        }else
        return false;
    }
}
$folder = "uploads";
$results = scandir('uploads');
foreach($results as $result){
    if ($result === '.' or $result === '..') continue;

    if (is_file($folder . '/' . $result)){
        echo '<br>
            <div class="col-md-3">
                <img src= "'.$folder . '/' .$result.'" alt"..." style="width:200px; height:auto;">
            </div>';
    }
}
//___________________________________________________________
?>
<form action="index.php">
    <input type="submit" value="Back to form">
</form>
