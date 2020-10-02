<?php
$user_name="root";
$pass= "";
$server="localhost";
$databname="data1";

$connection= new mysqli($server,$user_name,$pass,$databname);
if($connection->connect_error){
echo $connection->connect_error;
die();}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $create_n = $_POST['create_n'];
    $c_pass = $_POST['c_pass'];
}

$user_name = "root";
$pass = "";
$server="localhost";
$databname= "data1";

$connection= new mysqli($server,$user_name,$pass,$databname);

if($connection->connect_error){
    echo $connection->connect_error;
    die();}
$select = "insert into fyra_users (login_name,login_pass) values ($create_n,$c_pass)";

$ben = $connection->query($select);
while($value=$ben->fetch_assoc()){
    echo $value["login_pass"]."<br>";
    echo $value["login_name"]."<br>";
}

if(mysqli_num_rows($ben)>0){
    header("Location: login.html");
    exit;
}
else{
   echo "<script> alert('user name or password is already used'); document.location='create.html' </script>";

}
?>