<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f8f8;
      }
      h1 {
        color: #444;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
      }
      form {
      margin: 50px auto;
      max-width: 600px;
      }
      input[type="text"],
      input[type="email"],
      input[type="tel"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 2px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 20px;
      }
      input[type="submit"] {
        background-color: #0077cc;
        color: #fff;
        border: none;
        margin: 0 auto;
        display: block;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #005daa;
      }
      a {
        color: #0077cc;
        text-decoration: none;
        font-size: 18px;
        display: block;
        margin: 20px auto;
        max-width: 200px;
        text-align: center;
        border: 2px solid #0077cc;
        padding: 10px;
        border-radius: 5px;
      }
      a:hover {
        background-color: #0077cc;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <h1>A. Student Details</h1>
    <form method="post" action="submit.php">
      <label for="name">Name (Legal/Official):</label>
      <input type="text" id="name" name="name" pattern="[A-Za-z ]+" title="Please enter only letters and spaces" required><br>

      <label for="matricno">Matric No:</label>
      <input type="text" id="matricno" name="matricno" pattern="[0-9]+" title="Please enter only numbers" required><br>

      <label for="currentaddress">Current Address:</label>
      <input type="text" id="currentaddress" name="currentaddress" pattern="^[a-zA-Z0-9\s,'-]*$" title="Please enter only letters, numbers, spaces, commas, apostrophes, hyphens, and periods" required><br>

      <label for="homeaddress">Home Address:</label>
      <input type="text" id="homeaddress" name="homeaddress" pattern="^[a-zA-Z0-9\s,'-]*$" title="Please enter only letters, numbers, spaces, commas, apostrophes, hyphens, and periods" required><br>

      <label for="email">Email (Gmail Account):</label>
      <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@gmail\.com$" title="Please enter a valid Gmail address" required><br>

      <label for="mobilephone">Mobile Phone No:</label>
      <input type="tel" id="mobilephone" name="mobilephone" pattern="[0-9]+" title="Please enter a valid phone number in the format XXX-XXX-XXXX" required><br>

      <label for="homephone">Home Phone No (Emergency):</label>
      <input type="tel" id="homephone" name="homephone" pattern="[0-9]+" title="Please enter a valid phone number in the format XXX-XXX-XXXX" required><br>

      <input type="submit" value="Submit">
    </form>
    <a href="logout.php">Logout</a>
  </body>
</html>