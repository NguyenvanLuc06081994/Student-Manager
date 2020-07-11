<?php
include_once ("Student.php");
include_once ("StudentManager.php");
$id = $_GET["id"];
$manager = new StudentManager('data.json');
$manager->deleteStudent($id);
header("location: index.php");
