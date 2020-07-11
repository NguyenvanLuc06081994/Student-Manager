<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="id" placeholder="ID">
    <input type="text" name="img" placeholder="Image">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="age" placeholder="Age">
    <input type="text" name="gender" placeholder="Gender">
    <input type="submit" value="ADD">
</form>
<?php
include_once "Student.php";
include_once "StudentManager.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $img = $_POST['img'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $student = new Student($id, $img, $name, $age, $gender);
    $manager = new StudentManager("data.json");
    $manager->addStudent($student);
    $manager->displayStudent();
    header("location: index.php");
}
?>
</body>
</html>
