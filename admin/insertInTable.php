<?php
if (isset($_POST['generate-submit'])) {
    require 'includes/dbh.inc.php';

    $tenderNo = $_POST['TenderNo'];
    $dept = $_POST['Dept'];
    $desc = $_POST['Desc'];
    $price = $_POST['Price'];
    $dueDate = $_POST['DueDate'];
    $duration = $_POST['Duration'];

    //File upload path
    /*$targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert file name and file path into database
                $sql = "INSERT INTO tender(TenderNo,Department,Description,Price,DueDate,Duration,filename,filepath) VALUES('$tenderNo','$dept','$desc','$price','$dueDate','$duration','$fileName','$targetFilePath')";
                $query = mysqli_query($conn, $sql);
                header("location: generateTender.php?generate=success");
                exit();
                /*$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())");
                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                //$statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            //$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            header("location: generateTender.php?error=wrongfiletype");
            exit();
        }
    }*/
    $fileName = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);
    if (!get_magic_quotes_gpc()) {

        $fileName = addslashes($fileName);
    }
    echo $fileType;
    $allowTypes = array('application/pdf', 'application/doc', 'application/docx');
    if (in_array($fileType, $allowTypes)) {
        $sql = "INSERT INTO tender(TenderNo,Department,Description,Price,DueDate,Duration,filename,filetype,filesize,filecontent) VALUES('$tenderNo','$dept','$desc','$price','$dueDate','$duration','$fileName','$fileType','$fileSize','$content')";
        $query = mysqli_query($conn, $sql);
        header("location: generateTender.php?generate=success");
        exit();
    } else {
        header("location: generateTender.php?error=wrongfiletype");
        exit();
    }
} else {
    header("location: generateTender.php");
    exit();
}
