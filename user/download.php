<?php
require 'includes/dbh.inc.php';

$filename = $_GET['name'];
$sql = "SELECT filename,filetype,filesize,filecontent FROM tender WHERE filename='$filename'";
$result = mysqli_query($conn, $sql) or die('Error, query failed');

list($name, $type, $size, $content) = mysqli_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
exit();
