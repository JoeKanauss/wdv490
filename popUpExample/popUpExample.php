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
	
$sql = "SELECT photo, name FROM popupexample";

$result = $conn->query($sql);


$galleryItems = array();
//$gallery = "<table><tr>";
foreach($result as $row)
{
	array_push($galleryItems, $row["photo"]."<h2>".$row["name"]."</h2>");
}


// for($x = 0; $x< count($galleryItems); $x++)
// {
		// echo $x . $galleryItems[$x];
// }

// echo "<br>";

$gallery = "<table id='galleryItems'><tr>";

for($x = 0; $x< sizeof($galleryItems); $x++)
{
		$gallery .= "<td>".$galleryItems[$x]."</td>";
		if( ($x+1) % 3 == 0)
		{
			$gallery .= "</tr>";
		}
}
$gallery .= "</tr></table>";


	/* $gallery .= "<td>".$row["item_image"]."<br><h2>".$row["item_name"]."</h2></td>";
	while(count($row) % == 0)
	{
	
	} */

?>

<!DOCTYPE html>
<html>
<head>
<script src="jquery-3.2.1.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="popupJS.js"></script>
<style>
table{
	text-align: center;
}
td{
	width: 33%;
	padding: 0;
	border: collapse;
}
table img {
	width: 15%;
	height: auto;
	cursor: pointer;
}
#gallery{
	width: 75%;
	margin: 0 auto;
}



#section{
	display: none;
	position: absolute;
	margin: 0 auto;
	z-index: 1;
	margin: 0 auto;
	width: 50%;
	background-color: white;
	box-shadow: 11px 9px 32px -16px;
	border: 5px solid black;
	
}

#closeSection{
	margin: 2%;
	font-size: 1.5em;
	border-radius: .2em;
	border: none;
	cursor: pointer;
	float: left;
}
#closeSection:hover{
	background-color: black;
	color: white;
	font-weight: bold;
}

#sectionInfo{
	width: 75%;
	margin: 2%;
	margin-left: 12%;
	margin-top: 5%;
	padding: 2%;
	text-align: center;
	background-color: white;
}
</style>
</head>
<body>
<h1> gallery</h1>
<div id="gallery">
<?php echo $gallery; ?>
</div>

<div id="section">
<input type="button" id="closeSection" value="X">
<div id="sectionInfo">
<p><span id="image">Image</span></p>
<p>Name:<br><span id="name">Name</span></p>
<p>Words:<br><span id="words">Words</span></p>
</div>
</div>

</body>
</html> 