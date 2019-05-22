<?php

$servername="localhost";
$username="root";
$passsword="";
$dbname="hypermedial";
//crear conexiom

$conn = new mysqli($servername,$username,$passsword,$dbname);

// verificar conecxion
if ($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
    echo "error";
}else{
 //   echo "conexion exitosa";
}


?>