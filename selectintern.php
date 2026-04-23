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
echo "<br><br>";

$sql = "SELECT stdID, stdFname, stdLname, Email, Term, Company, stdAddress, Province, StartDate, EndDate, Contact FROM internship"; // Your SQL query
$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["stdID"];
        echo "FirstName: " . $row["stdFname"]. "<br>";
        echo "LastName: " . $row["stdLname"]. "<br>";
        echo "email: " . $row["Email"]. "<br>";
        echo "term: " . $row["Term"]. "<br>";
        echo "company: " . $row["Company"]. "<br>";
        echo "address: " . $row["stdAddress"]. "<br>";
        echo "province: " . $row["Province"]. "<br>";
        echo "start: " . $row["StartDate"]. "<br>";
        echo "end: " . $row["EndDate"]. "<br>";
        echo "contact: " . $row["Contact"];
    }
} else {
    echo "0 results";
}

$connect->close();
?>