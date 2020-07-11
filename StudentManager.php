<?php
include_once "Student.php";

class StudentManager
{
    protected $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function readFileData()
    {
        $dataJson = file_get_contents($this->fileName);
        return json_decode($dataJson, true);
    }

    public function saveFileData($arr)
    {
        $dataJson = json_encode($arr);
        file_put_contents($this->fileName, $dataJson);
    }

    public function addStudent($student)
    {
        $data = $this->readFileData();
        $arr = [
            "id" => $student->getId(),
            "img" => $student->getImg(),
            "name" => $student->getName(),
            "age" => $student->getAge(),
            "gender" => $student->getGender()
        ];
        array_push($data, $arr);
        $this->saveFileData($data);
    }

    public function displayStudent()
    {
        $data = $this->readFileData();
        $arr = [];
        foreach ($data as $key => $value) {
            $student = new Student(++$key, $value['img'], $value['name'], $value['age'], $value['gender']);
            array_push($arr, $student);
        }
        return $arr;
    }

    public function deleteStudent($id)
    {
        $data = $this->readFileData();
        array_splice($data, $id, 1);
        $this->saveFileData($data);
    }

    public function updateStudent($id,$student)
    {
        $data = $this->readFileData();
        $arr =[
            "img"=>$student->getImg(),
            "name"=>$student->getName(),
            "age"=>$student->getAge(),
            "gender"=>$student->getGender()
        ];
        $data[$id] = $arr;
        $this->saveFileData($data);
    }

}