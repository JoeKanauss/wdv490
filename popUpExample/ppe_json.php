<?php
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

$jos = "{";
foreach($result as $row)
{
	$fName = $row["bio_first_name"];
	$lName = $row["bio_last_name"];
	$program1 = $row["bio_program"];
	$program2 = $row["bio_second_program"];
	$website1 = $row["bio_website_address"];
	$website2 = $row["bio_second_web"];
	$linkedIn = $row["bio_linkedIn"];
	$email = $row["bio_email"];
	$hometown = $row["bio_hometown"];
	$careerGoals = $row["bio_career_goals"];
	$threeWords = $row["bio_three_words"];
	
	if($row["bio_first_name"] == ""){
		$fName = "<span></span>";
	} 
	if($row["bio_last_name"] == ""){
		$lName = "<span></span>";
	} 
	if($row["bio_program"] == ""){
		$program1 = "<span></span>";
	}
		if($row["bio_program"] == "animation"){
			$program1 = "Animation";
		}
		if($row["bio_program"] == "graphicDesign"){
			$program1 = "Graphic Design";
		}
		if($row["bio_program"] == "photography"){
			$program1 = "Photography";
		}
		if($row["bio_program"] == "videoProduction"){
			$program1 = "Video Production";
		}
		if($row["bio_program"] == "webDevelopment"){
			$program1 = "Web Development";
		}
	
	if($row["bio_second_program"] == ""){
		$program2 = "<span></span>";
	} 
	
		if($row["bio_second_program"] == "none"){
			$program2 = "<span></span>";
		}
	
		if($row["bio_second_program"] == "animation"){
			$program2 = " / Animation";
		}
		if($row["bio_second_program"] == "graphicDesign"){
			$program2 = " / Graphic Design";
		}
		if($row["bio_second_program"] == "photography"){
			$program2 = " / Photography";
		}
		if($row["bio_second_program"] == "videoProduction"){
			$program2 = " / Video Production";
		}
		if($row["bio_second_program"] == "webDevelopment"){
			$program2 = " / Web Development";
		}
	
	if($row["bio_website_address"] == ""){
		$website1 = "<span></span>";
	} 
	if($row["bio_second_web"] == ""){
		$website2 = "<span></span>";
	} 
	if($row["bio_linkedIn"] == ""){
		$linkedIn = "<span></span>";
	} 
	if($row["bio_email"] == ""){
		$email = "<span></span>";
	} 
	if($row["bio_hometown"] == ""){
		$hometown = "<span></span>";
	} 
	if($row["bio_career_goals"] == ""){
		$careerGoals = "<span></span>";
	} 
	if($row["bio_three_words"] == ""){
		$threeWords = "<span></span>";
	} 
	
	$jos .=  '"'.$row["bio_login_email"].'":
	{"fName":"'.$fName.'",
	"lName":"'.$lName.'",
	"program1":"'.$program1.'",
	"program2":"'.$program2.'",
	"website1":"<a href=\''.$website1.'\'>'.$website1.'</a>",
	"website2":"<a href=\''.$website2.'\'>'.$website2.'</a>",
	"linkedIn":"<a href=\''.$linkedIn.'\'>'.$linkedIn.'</a>",
	"email":"'.$email.'",
	"hometown":"'.$hometown.'",
	"careerGoals":"'.$careerGoals.'",
	"threeWords":"'.$threeWords.'"},';
}

echo substr($jos, 0, -1);
echo"}";
