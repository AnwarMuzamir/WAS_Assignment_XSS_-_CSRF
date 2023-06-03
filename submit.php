<?php
require 'config.php';
if(isset($_POST["name"]) && isset($_POST["matricno"]) && isset($_POST["currentaddress"]) && isset($_POST["homeaddress"]) && isset($_POST["email"]) && isset($_POST["mobilephone"]) && isset($_POST["homephone"])){
  $name = $_POST["name"];
  $matricno = $_POST["matricno"];
  $currentaddress = $_POST["currentaddress"];
  $homeaddress = $_POST["homeaddress"];
  $email = $_POST["email"];
  $mobilephone = $_POST["mobilephone"];
  $homephone = $_POST["homephone"];

  $result = mysqli_query($conn, "INSERT INTO studentreg (name, matricno, currentaddress, homeaddress, email, mobilephone, homephone) VALUES ('$name', '$matricno', '$currentaddress', '$homeaddress', '$email', '$mobilephone', '$homephone')");

  // Sanitize user input
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $matricno = filter_var($_POST['matricno'], FILTER_SANITIZE_NUMBER_INT);
  $currentaddress = filter_var($_POST['currentaddress'], FILTER_SANITIZE_STRING);
  $homeaddress = filter_var($_POST['homeaddress'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $mobilephone = filter_var($_POST['mobilephone'], FILTER_SANITIZE_NUMBER_INT);
  $homephone = filter_var($_POST['homephone'], FILTER_SANITIZE_NUMBER_INT);

  // Validate the user's input (Late validation)
  if (!preg_match('/^[A-Za-z ]+$/', $name)) {
    die("Invalid name");
  }
  
  if (!preg_match('/^[0-9]+$/', $matricno)) {
    die("Invalid matric number");
  }
  
  if (!preg_match('/^[a-zA-Z0-9\s,\'-]*$/', $currentaddress)) {
    die("Invalid current address");
  }
  
  if (!preg_match('/^[a-zA-Z0-9\s,\'-]*$/', $homeaddress)) {
    die("Invalid home address");
  }
  
  if (!preg_match('/^[a-z0-9._%+-]+@gmail\.com$/', $email)) {
    die("Invalid email address");
  }
  
  if (!preg_match('/^[0-9]+$/', $mobilephone)) {
    die("Invalid mobile phone number");
  }
  
  if (!preg_match('/^[0-9]+$/', $homephone)) {
    die("Invalid home phone number");
  }

  if($result){
    header("Location: index.php");
  }
  else{
    echo "Invalid" . mysqli_error($conn);
  }
}
else{
  header("Location: index.php");
}
?>
