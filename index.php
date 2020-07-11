<?php
include_once "Student.php";
include_once "StudentManager.php";

$manager = new StudentManager('data.json');
$students = $manager->displayStudent();
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
<a href="add.php">ADD NEW STUDENT</a>
<table>
    <tr>
        <th>STT</th>
        <th>Image</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    <?php foreach ($students as $key => $student): ?>
    <tr>
        <td><?php echo $student->getId() ?></td>
        <td><img src="<?php echo $student->getImg() ?>" alt="" style="width: 75px; height: 75px"></td>
        <td><?php echo $student->getName() ?></td>
        <td><?php echo $student->getAge() ?></td>
        <td><?php echo $student->getGender() ?></td>
        <td><a href="delete.php?<?php echo $key ?>">Delete</a></td>
        <td><a href="update.php?<?php echo $key ?>">Update</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
