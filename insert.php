<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'form');
$email= $_POST['emailId'];
$subject= $_POST['subjectfield'];
$content= $_POST['contentfield'];
$sql = "INSERT INTO form (Email, Subject , Text) VALUES ('$email', '$subject', '$content')";
if ($conn->query($sql) === TRUE) {
    echo "data inserted";
}
else 
{
    echo "failed";
}
?>

