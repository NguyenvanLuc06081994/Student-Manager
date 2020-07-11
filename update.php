<?php
include_once "Student.php";
include_once "StudentManager.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $img = $_POST["img"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $student = new Student($id, $img, $name, $age, $gender);
    $manager = new StudentManager("data.json");
    $students = $manager->displayStudent();
    $manager->updateStudent($id, $student);
    header("location : index.php");
}
?>
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
    <?php foreach ($students as $key => $student): ?>
        <input type="text" name="id" placeholder="ID" value="<?php echo $student->getID() ?>">
    <?php endforeach; ?>
    <input type="text" name="name" placeholder="Name" value="">
    <input type="text" name="img" placeholder="Image" value="">
    <input type="text" name="age" placeholder="Age" value="">
    <input type="text" name="gender" placeholder="Gender" value="">
    <input type="submit" value="Update">

</form>
</body>
</html>
