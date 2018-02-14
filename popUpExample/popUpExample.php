<?php


// profilepug.png to be replaced with student photo


$database = "local_dpd_bio"; 
$hostname = "localhost";
$username = "root"; 
$password = "";


try {
	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
	
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	}
	
$sql = "SELECT bio_login_email, bio_first_name, bio_last_name, bio_program, bio_second_program, bio_website_address, bio_second_web, bio_linkedIn, bio_email, bio_hometown, bio_career_goals, bio_three_words FROM local_dpd_bio";

$result = $conn->query($sql);


$galleryItems = array();
//$gallery = "<table><tr>";
foreach($result as $row)
{
	array_push($galleryItems, "<img src='profilepug.png' id='".$row["bio_login_email"]."' onclick='display(this.id);' /> <h2>".$row["bio_first_name"]." ".$row["bio_last_name"]."</h2>");
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

<p><span id="image"><img src="profilepug.png" /></span></p>
<p><span id="fName">First Name</span> <span id="lName">Last Name</span></p>
<p><span id="program1">Program 1</span> <span id="program2">Program 2</span></p>
<p><span id="email">Email</span></p>
<p><span id="websiteAddress1">Website Address 1</span></p>
<p><span id="websiteAddress2">Website Address 2</span></p>
<p>Hometown:<br><span id="hometown">Hometown</span></p>
<p>My Career Goals:<br><span id="careerGoals">Career Goals</span></p>
<p>Three Words That Describe Me:<br><span id="threeWords">Three Words</span></p>
<p><span id="linkedIn">LinkedIn</span></p>
</div>
</div>

</body>
</html> 