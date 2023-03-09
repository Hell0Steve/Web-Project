<?php
$server_name="localhost";
$user_name="zivbr_details";
$password="12345";
$database_name="zivbr_dogs";

//create connection
$conn=new mysqli($server_name,$user_name,$password,$database_name);

//check the connection
if ($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

//get info from html
$formGender=$_POST["formGender"];
$dogname=$_POST["dogname"];
$name=$_POST["name"];
$email=$_POST["email"];
$text=$_POST["text"];

if (empty($name)) {
    echo "Name is required";
    exit();
}
elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    echo "Only letters and white space allowed in name field";
    exit();
}

if (empty($email)) {
    echo "Email is required";
    exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit();
}

if (empty($text)) {
    echo "Lifestyle description is required";
    exit();
}

//add use
$sql="insert into user(formGender,dogname,name,email,text) values ('".$formGender."','".$dogname."','".$name."','".$email."','".$text."')";
$x=$conn->query($sql);




if ($x==FALSE){
    echo "Can not add new user.  Error is: ".$conn->error;
    exit();
}
else{
    echo "Thank you for your submission !";
     exit();
}



?>