<?php
include('../../models/admin/db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_POST['submit']) {
    if (empty($_POST['name']) || empty($_POST['email'])) {
        $_SESSION['edit_msg'] = 'please fill all the values';
        header('location: ../../views/admin/admin/adminEdit.php');
    } else {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
    
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg', 'jpeg', 'png');
        if (!empty($fileName)) {
            if (in_array($fileActualExt, $allow)) {
                if ($fileError === 0) {
                    if ($fileSize < 4194304) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDes = '../../uploads/admin/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDes);
                        $ppm = "Image sucessfully uploaded";
                        $image = $fileDes;

                        $connection = new db();
                        $conobj = $connection->OpenCon();

                        $userQuery = $connection->editAdmin($conobj, $_POST['name'], $_POST['email'], $_SESSION['username'],$fileNameNew);
                        if ($userQuery) {

                            $_SESSION['edit_msg'] = 'Edit complete';
                            header('location: ../../views/admin/admin/dashboard.php');
                        } else {
                            $_SESSION['edit_msg'] = 'Sql Error';
                            header('location: ../../views/admin/adminEdit.php');
                        }
                    } 
                    else {
                        $_SESSION['edit_msg'] = "File size too large (Maximum file size- 4MB)";
                    }
                } 
                else {
                    $_SESSION['edit_msg'] = "There was an error uploading your file!";
                }
            } 
            else {
                $_SESSION['edit_msg'] = "Only images are allowed (jpeg, jpg, png)";
            }
        } 
        else {
            $_SESSION['edit_msg'] = "Please Select an image";
        }
    }
}
else {
    $_SESSION['edit_msg'] = 'Submit the form';
    header('location: ../../views/admin/admin/adminEdit.php');
}
