<?php
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
$select= "select * from fyra_users where login_name ='$create_n' and login_pass ='$c_pass'";
$ben= $connection->query($select);

if(mysqli_num_rows($ben)>0){
    echo "<script> alert('user id is already in used try some thing new'); document.location='create.html'</script>";
}

$insert = "insert into fyra_users (login_name,login_pass) values ('$create_n','$c_pass')";


if($connection->query($insert)==true)
    {echo "<script> alert('you have successfully created user id'); document.location='login.html'</script>";}

else{
echo "<script> alert('some error in query'); document.location='create.html' </script>";}
?>