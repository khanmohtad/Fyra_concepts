
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];
}

$user_name = "root";
$pass = "";
$server="localhost";
$databname= "data1";

$connection= new mysqli($server,$user_name,$pass,$databname);

if($connection->connect_error){
    echo $connection->connect_error;
    die();}
$select = "select * from fyra_users where login_name= '$uname' and login_pass = '$upass'";

$ben = $connection->query($select);
while($value=$ben->fetch_assoc()){
    echo $value["login_pass"]."<br>";
    echo $value["login_name"]."<br>";
}
if(mysqli_num_rows($ben)>0){
    header("Location: mainweb.html ")
}
?>
