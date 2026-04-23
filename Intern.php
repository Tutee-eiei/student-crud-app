<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "is222";

$connect = mysqli_connect($host,$dbuser,$dbpass,$dbname,'3306');
if($connect){
	echo "Connect Success";
}else{
	echo "Connect Failed";
}

$sql = "INSERT INTO internship (stdID, stdFname, stdLname, Email, Term, Company, stdAddress, Province, StartDate, EndDate, Contact)
VALUES ('6510101020', 'Claire', 'Redfield', 'redfield@gmail.com', '2/2569','amazon', '1600 Pennylvania Avenue NW', 'Washington', '2025/01/11', '2025/04/11', 'chris-080-xxx-xxxx')";

if ($connect->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>