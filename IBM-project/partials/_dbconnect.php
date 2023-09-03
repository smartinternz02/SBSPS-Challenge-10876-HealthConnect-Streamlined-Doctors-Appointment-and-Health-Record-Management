<?php 
$server="localhost";
$username="root";
$password="";
$database="rithvik_6719";
$con=mysqli_connect($server,$username,$password,$database);

if(!$con){
//     echo "success";
// }else {
    die("Error".misqli_connect_error());
}

?>