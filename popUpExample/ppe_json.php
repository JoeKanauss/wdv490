<?php
$database = "joekan_wdv341"; 
$hostname = "localhost";
$username = "joekan_wdv341"; 
$password = "wdv341";

try {
	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
	
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

$sql = "SELECT value, name, photo, words FROM popupexample";


$result = $conn->query($sql);

$jos = "{";
foreach($result as $row)
{
	$jos .=  '"'.$row["value"].'":{"name":"'.$row["name"].'","photo":"'.$row["photo"].'","words":"'.$row["words"].'"},';
}

echo substr($jos, 0, -1);
echo"}";