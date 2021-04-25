<?php
require 'vendor/autoload.php';
if(isset($_FILES['video'])){
    $errors= array();
    $file_name = $_FILES['video']['name'];
    $file_size =$_FILES['video']['size'];
    $file_tmp =$_FILES['video']['tmp_name'];
    $file_type=$_FILES['video']['type'];
    $tmp = explode('.', $file_name);
    $file_ext = end($tmp);
    $extensions= array("flv", "mp4");

    if(in_array($file_ext,$extensions)=== false){
        $error="extension not allowed, please choose a JPEG or PNG file.\n";
    }

    if($file_size > 2097152){
        $error="File size must not be above 2MB \n";
    }
    
    if(empty($error)==true && $file_ext != ""){
        $fu = true;
        file_put_contents("counter.txt", $postNum+1);
        $postNum = file_get_contents("counter.txt");
        move_uploaded_file($file_tmp,"videos/".$postNum.".".$file_ext);
        echo "File uploaded!\n";
    }elseif(empty($error)==false){
        print($error); 
    }
}
