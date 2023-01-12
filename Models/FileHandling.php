<?php
class FileHandling{

public function ImageUpload(){

    $randomhash = md5(date('YmdFhms'));
    $target_dir = "Assets/Img/uploads/";
    $imageFileType = strtolower(pathinfo($_FILES['cinema_img']['name'],PATHINFO_EXTENSION));
    $image = $randomhash.".".$imageFileType;
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["cinema_img"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $msg = "File is not an image.";
        $uploadOk = 0;
      }
    }

    // Check file size
    if ($_FILES["cinema_img"]["size"] > 500000) {
      $msg = "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["cinema_img"]["tmp_name"], $target_file)) {
        $msg = "Avatar has been uploaded.";
      } else {
        $msg = "Sorry, there was an error uploading your file.";
      }
    }
      return $image;

}
}


?>