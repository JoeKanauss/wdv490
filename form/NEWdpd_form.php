<?php
$greeting = "";
$loginEmail = "";
$firstName = "";
$lastName = "";
$program = "";
$program2 = "";
$websiteAddress = "";
$websiteAddress2 = "";
$linkedIn = "";
$email = "";
$hometown = "";
$careerGoals = "";
$threeWords = "";
$aniCheck = "";
$gDCheck = "";
$phoCheck = "";
$vPCheck = "";
$wDCheck = "";
$noneCheck = "";
$ani2Check = "";
$gD2Check = "";
$pho2Check = "";
$vP2Check = "";
$wD2Check = "";

if(isset($_POST["loginConfirm"]))
{
		
		$loginEmail = $_POST['emailLogin'];
		
		$database = "gullydsm_dmacc";
		$hostname = "localhost";
		$username = "gullydsm_dmacc";
		$password = "wdv341";

		try {
			$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
			$sql = "SELECT * FROM local_dpd_bio WHERE bio_login_email = '$loginEmail'";
			$result = $conn->query($sql);
			
			if($result)
			{
				if($result->rowCount() > 0)
				{
					foreach($result as $row)
					{
						$greeting = "Welcome back, ".$row["bio_first_name"]."!";
						
						// - - - - - - - - - INSERT DATA FROM DATABASE INTO FORM INPUTS - - - - - - - //
						 $stmt = $conn->prepare("SELECT * FROM local_dpd_bio WHERE bio_login_email = '$loginEmail'"); 
	
						$stmt->execute();
		
						// set the resulting array to associative
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
	
						forEach($stmt as $row) 
						{
							//pulling values from SELECT and storing into variables
							$firstName = $row["bio_first_name"];
							$lastName = $row["bio_last_name"];
							$program = $row["bio_program"];
							$program2 = $row["bio_second_program"];
							$websiteAddress = $row["bio_website_address"];
							$websiteAddress2 = $row["bio_second_web"];
							$linkedIn = $row["bio_linkedIn"];
							$email = $row["bio_email"];
							$hometown = $row["bio_hometown"];
							$careerGoals = $row["bio_career_goals"];
							$threeWords = $row["bio_three_words"];
							
							if($program == "animation")
							{
								$aniCheck = "selected";
								$gDCheck = "";
								$phoCheck = "";
								$vPCheck = "";
								$wDCheck = "";
							}
							else if($program == "graphicDesign")
							{
								$aniCheck = "";
								$gDCheck = "selected";
								$phoCheck = "";
								$vPCheck = "";
								$wDCheck = "";
							}
							else if($program == "photography")
							{
								$aniCheck = "";
								$gDCheck = "";
								$phoCheck = "selected";
								$vPCheck = "";
								$wDCheck = "";
							}
							else if($program == "videoProduction")
							{
								$aniCheck = "";
								$gDCheck = "";
								$phoCheck = "";
								$vPCheck = "selected";
								$wDCheck = "";
							}
							else if($program == "webDevelopment")
							{
								$aniCheck = "";
								$gDCheck = "";
								$phoCheck = "";
								$vPCheck = "";
								$wDCheck = "selected";
							}
							
							
							if($program2 == "none")
							{
								$noneCheck = "selected";
								$ani2Check = "";
								$gD2Check = "";
								$pho2Check = "";
								$vP2Check = "";
								$wD2Check = "";
							}
							else if($program2 == "animation")
							{
								$noneCheck = "";
								$ani2Check = "selected";
								$gD2Check = "";
								$pho2Check = "";
								$vP2Check = "";
								$wD2Check = "";
							}
							else if($program2 == "graphicDesign")
							{
								$noneCheck = "";
								$ani2Check = "";
								$gD2Check = "selected";
								$pho2Check = "";
								$vP2Check = "";
								$wD2Check = "";
							}
							else if($program2 == "photography")
							{
								$noneCheck = "";
								$ani2Check = "";
								$gD2Check = "";
								$pho2Check = "selected";
								$vP2Check = "";
								$wD2Check = "";
							}
							else if($program2 == "videoProduction")
							{
								$noneCheck = "";
								$ani2Check = "";
								$gD2Check = "";
								$pho2Check = "";
								$vP2Check = "selected";
								$wD2Check = "";
							}
							else if($program2 == "webDevelopment")
							{
								$noneCheck = "";
								$ani2Check = "";
								$gD2Check = "";
								$pho2Check = "";
								$vP2Check = "";
								$wD2Check = "selected";
							}
						}
					}	
				}
				else
				{
					$greeting = "Hey, first-timer! Come fill out your bio for the Porfolio Day website!";					
				}
			}
			else
			{
				echo "uhoh";
			}
			
			$conn = null;
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
}


if(isset($_POST["submitConfirm"]))
{
	
	$loginEmail = $_POST['emailToLogin'];	
		
	$database = "gullydsm_dmacc";
	$hostname = "localhost";
	$username = "gullydsm_dmacc";
	$password = "wdv341";

		try {
			$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
			$sql = "SELECT * FROM local_dpd_bio WHERE bio_login_email = '$loginEmail'";
			$result = $conn->query($sql);
			
			if($result->rowCount() > 0)
			{
			
	// - - - - - - - - - UPDATE DATABASE WITH ANY SUBMITTED INPUT  - - - - - - - //
						include "dpd_bio_server_validation.php";
						
							$loginEmail = $_POST["emailToLogin"];
							$inFirstName = $_POST["firstName"];
							$inLastName = $_POST["lastName"];
							$inProgram = $_POST["program"];
							$inProgram2 = $_POST["program2"];
							$inWebsiteAddress = $_POST["websiteAddress"];
							$inWebsiteAddress2 = $_POST["websiteAddress2"];
							$inLinkedIn = $_POST["linkedIn"];
							$inEmail = $_POST["email"];
							$inHometown = $_POST["hometown"];
							$inCareerGoals = $_POST["careerGoals"];
							$inThreeWords = $_POST["threeWords"];
							$inRobotest = $_POST["inRobotest"];
		
							validateForm();
		
							if($validForm)
							{
								
								$sqlUpdate = "UPDATE local_dpd_bio SET bio_first_name = '$inFirstName', bio_last_name = '$inLastName', bio_program = '$inProgram', bio_second_program = '$inProgram2', bio_website_address = '$inWebsiteAddress', bio_second_web = '$inWebsiteAddress2', bio_linkedIn = '$inLinkedIn', bio_email = '$inEmail', bio_hometown = '$inHometown', bio_career_goals = '$inCareerGoals', bio_three_words = '$inThreeWords' WHERE bio_login_email = '$loginEmail'";
								
								$updateStmt = $conn->prepare($sqlUpdate);
								$updateStmt->execute();
								
								$confirmationMessage = $updateStmt->rowCount() . " records UPDATED successfully";
							}
							else
							{
								$confirmationMessage =  "Uh-oh! the form was not filled in correctly! Please try again!";
							}
			}
			else
			{
				include "dpd_bio_server_validation.php";
						if(isset($_POST["submitConfirm"]))
						{
							$inLoginEmail = $_POST["emailToLogin"];
							$inFirstName = $_POST["firstName"];
							$inLastName = $_POST["lastName"];
							$inProgram = $_POST["program"];
							$inProgram2 = $_POST["program2"];
							$inWebsiteAddress = $_POST["websiteAddress"];
							$inWebsiteAddress2 = $_POST["websiteAddress2"];
							$inLinkedIn = $_POST["linkedIn"];
							$inEmail = $_POST["email"];
							$inHometown = $_POST["hometown"];
							$inCareerGoals = $_POST["careerGoals"];
							$inThreeWords = $_POST["threeWords"];
							$inRobotest = $_POST["inRobotest"];
		
							validateForm();
		
							if($validForm)
							{
								
								$sql = "INSERT INTO local_dpd_bio (bio_login_email,bio_first_name, bio_last_name, bio_program, bio_second_program, bio_website_address, bio_second_web, bio_linkedIn, bio_email, bio_hometown, bio_career_goals, bio_three_words) VALUES(:loginEmail, :firstName, :lastName, :program, :program2,  :websiteAddress, :secondWeb, :linkedIn, :email, :hometown, :careerGoals, :threeWords)";
				
								$stmt = $conn->prepare($sql);
								
								$stmt->bindParam(':loginEmail', $logEmail);
								$stmt->bindParam(':firstName', $firstName);
								$stmt->bindParam(':lastName', $lastName);
								$stmt->bindParam(':program', $program);
								$stmt->bindParam(':program2', $program2);
								$stmt->bindParam(':websiteAddress', $websiteAddress);
								$stmt->bindParam(':secondWeb', $websiteAddress2);
								$stmt->bindParam(':linkedIn', $linkedIn);
								$stmt->bindParam(':email', $email);
								$stmt->bindParam(':hometown', $hometown);
								$stmt->bindParam(':careerGoals', $careerGoals);
								$stmt->bindParam(':threeWords', $threeWords);
								
								$logEmail = $inLoginEmail;
								$firstName = $inFirstName;
								$lastName = $inLastName;
								$program = $inProgram;
								$program2 = $inProgram2;
								$websiteAddress = $inWebsiteAddress;
								$websiteAddress2 = $inWebsiteAddress2;
								$linkedIn = $inLinkedIn;
								$email = $inEmail;
								$hometown = $inHometown;
								$careerGoals = $inCareerGoals;
								$threeWords = $inThreeWords;
				
								$stmt->execute();
							
								
							}
							else
							{
								$confirmationMessage = "Uh-oh! the form was not filled in correctly! Please try again!";
							}
			}
			}
		}
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
						
		$conn = null;
}

?>


<?php 
if(isset($_POST["submitConfirm"]))
{

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DMACC Portfolio Day Bio Form</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- css3-mediaqueries.js for IE less than 9 -->

<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

<script src="js/jquery-3.2.1.js"></script>
<script src="dpd_bio_validation.js"></script>
<script>
		function bioSubmit(){
			validateBioForm();
		}
	$(document).ready(function(){
		$("select#program").change(function(){
			if( $("select#program option:checked").val() == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
			
		});
	});
	</script>
  
  <style>
	img{
		display: block;
		margin: 0 auto;
	}
	.frame{
		background-image: url("orange popsicle.jpg");
		padding: 1em;	
	}
	.frame2{
		background-image: url("citrus.jpg");
		padding: 1.3em;	
	}	
	body{
		background-image: url("bodacious.png");
		margin: 1.5em;
	}
	
	.main {
		padding: 1em;
		background-color: white;
	}
	form{
		text-align: center;
	}
	h2 {
		text-align: center;
	}
	.robotic{
		display: none;
	}

	.form {
		background-color:white;
		padding-left: 5em;
	}
	p {
		align:left;
	}	
	.citrus{
		margin: auto;
		background-image: url("raspberry.jpg");
		padding: 1.3em;	
		width: 70%;
	}
	.bamboo{
		background-image: url("bamboo.jpg");
		padding: 1em;	
	}	
	.violet{
		background-image: url("ultra violet.png");
		padding: .5em;	
	}	
	.secondWeb{
		display: none;
	}
	table{
		margin: auto;
	}
	table td{
		padding-bottom: .5em;
	}
	h2 a{
		text-decoration: underline;
		color: black;
	}
	h2 a:hover{
		text-decoration: overline underline;
		color: black;
	}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  img {
    width:100%;
  }
  .form {
	width:100%; 
	padding-left: .1em;
	padding-top: .1em;
  }
  .citrus {
	background-image:none;  
  }
  .bamboo {
	background-image:none;  
  } 
  .violet {
	background-image:none;  
  }  
  .secondWeb{
		display: none;
	}  
  table{
		margin: auto;
	}
  table td{
		padding-bottom: .5em;
	}
}
	
  </style>
  
</head>

<section class="orange">
<body>
<div class="frame2">
<div class="frame">

  <div class="main">
  <div><img src="madonna.gif" alt="Mix gif" ></div>
  <br>

<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->

<section class="citrus">
<section class="bamboo">
<section class="violet">

	<div class="main form">
	
	<h2><?php echo $confirmationMessage; ?></h2>
	<h2><a href="NEWdpd_login.php">Return to Login</a></h2>

	</div>
	

</section>	
</section>
</section>
  
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>
</section>

</html>
<?php
}
else
{
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DMACC Portfolio Day Bio Form</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- css3-mediaqueries.js for IE less than 9 -->

<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

<script src="js/jquery-3.2.1.js"></script>
<script src="dpd_bio_validation.js"></script>
<script>
		function bioSubmit(){
			validateBioForm();
		}
	$(document).ready(function(){
		if( $("select[name=program]	option:selected").val() == "webDevelopment")
		{
			$(".secondWeb").css("display", "inline");
		}
		else
		{
			$(".secondWeb").css("display", "none");
		}
		
		$("select#program").change(function(){
			if( $("select#program option:checked").val() == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
		});
		
		function resetForm(){
			$("#firstName").val("");
			$("#lastName").val("");
			$("#program").val("default");
			$("#websiteAddress").val("");
			$("#websiteAddress2").val("");
			$("#email").val("");
			$("#hometown").val("");
			$("#careerGoals").val("");
			$("#threeWords").val("");
		}
	});
	
	
	</script>
  
  <style>
	img{
		display: block;
		margin: 0 auto;
	}
	.frame{
		background-image: url("orange popsicle.jpg");
		padding: 1em;	
	}
	.frame2{
		background-image: url("citrus.jpg");
		padding: 1.3em;	
	}	
	body{
		background-image: url("bodacious.png");
		margin: 1.5em;
	}
	
	.main {
		padding: 1em;
		background-color: white;
	}
	form{
		text-align: center;
	}
	h2 {
		text-align: center;
	}
	.robotic{
		display: none;
	}

	.form {
		background-color:white;
		padding-left: 5em;
	}
	p {
		align:left;
	}	
	.citrus{
		margin: auto;
		background-image: url("raspberry.jpg");
		padding: 1.3em;	
		width: 70%;
	}
	.bamboo{
		background-image: url("bamboo.jpg");
		padding: 1em;	
	}	
	.violet{
		background-image: url("ultra violet.png");
		padding: .5em;	
	}	
	.secondWeb{
		display: none;
	}
	table{
		margin: auto;
	}
	table td{
		padding-bottom: .75em;
	}
	.error{
		font-style: italic;
		color: #d42a58;
		font-weight: bold;
	}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  img {
    width:100%;
  }
  .form {
	width:100%; 
	padding-left: .1em;
	padding-top: .1em;
  }
  .citrus {
	background-image:none;  
  }
  .bamboo {
	background-image:none;  
  } 
  .violet {
	background-image:none;  
  }  
  .secondWeb{
		display: none;
	}  
  table{
		margin: auto;
	}
  table td{
		padding-bottom: .5em;
	}
}
	
  </style>
  
</head>

<section class="orange">
<body>
<div class="frame2">
<div class="frame">

  <div class="main">
  <div><img src="madonna.gif" alt="Mix gif" ></div>
  <br>

<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->

<section class="citrus">
<section class="bamboo">
<section class="violet">

	<div class="main form">
	
	<h2><?php echo $greeting; ?></h2>
	</table>
	<form id="portfolioBioForm" method="post" action="NEWdpd_form.php">
		
		<table>
		<tr>
		<td>Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value="<?php echo $loginEmail; ?>"/></td>
		</tr>
		<tr>
		<td>First Name:<br> <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>"/><br><span class="error" id="firstNameError"></span></td>
		</tr>
		<tr>
		<td>Last Name:<br> <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" /><br><span class="error" id="lastNameError"></span></td>
		</tr>
		<tr>
		<td >Program:<br> <select id="program" name="program">
				<option value="default">---Select Your Program---</option>
				<option value="animation" <?php echo $aniCheck; ?>>Animation</option>
				<option value="graphicDesign" <?php echo $gDCheck; ?>>Graphic Design</option>
				<option value="photography" <?php echo $phoCheck; ?>>Photography</option>
				<option value="videoProduction" <?php echo $vPCheck; ?>>Video Production</option>
				<option value="webDevelopment" <?php echo $wDCheck; ?>>Web Development</option>
			</select><br><span class="error" id="programError"></span><td>
		</tr>
		<tr>
		<td >Secondary Program:<br> <select id="program2" name="program2">
				<option value="none" <?php echo $noneCheck; ?>>---No Secondary Program---</option>
				<option value="animation" <?php echo $ani2Check; ?>>Animation</option>
				<option value="graphicDesign" <?php echo $gD2Check; ?>>Graphic Design</option>
				<option value="photography" <?php echo $pho2Check; ?>>Photography</option>
				<option value="videoProduction" <?php echo $vP2Check; ?>>Video Production</option>
				<option value="webDevelopment" <?php echo $wD2Check; ?>>Web Development</option>
			</select><br><span class="error" id="program2Error"></span><td>
		</tr>
		<tr>
		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value="<?php echo $websiteAddress; ?>"/><br><span class="error" id="websiteAddressError"></span></td>
		</tr>
		<tr>
		<td>Personal Email:<br><input type="text" id="email" name="email" value="<?php echo $email; ?>" /><br><span class="error" id="emailError"></span></td>
		</tr>
		<tr>
		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="<?php echo $linkedIn; ?>" /><br><span class="error" id="linkedInError"></span></td>
		<tr>
		<td><span class="secondWeb">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value="<?php echo $websiteAddress2; ?>"/><br><span class="error" id="websiteAddress2Error"></span></span></td>
		</tr>
		<tr>
		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value="<?php echo $hometown; ?>"/><br><span class="error" id="hometownError"></span></td>
		</tr>
		<tr>
		<td>Career Goals:<br> <textarea id="careerGoals" name="careerGoals"><?php echo $careerGoals; ?> </textarea><br><span class="error" id="careerGoalsError"></span></td>
		</tr>
		<tr>
		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value="<?php echo $threeWords; ?>"/><br><span class="error" id="threeWordsError"></span></td>
		<p class="robotic" id="pot">
			<label>Leave Blank</label>
			<input type="hidden" name="inRobotest" id="inRobotest" class="inRobotest" />
		</p>
		<input type="hidden" id="submitConfirm" name="submitConfirm" value="submitConfirm"/>
		</tr>
		<tr>
		<td><input type="button" id="submitBio" name="submitBio" value="Submit Bio" onclick="bioSubmit();"/></td>
		</tr>
		<tr>
		<td><input type="reset" id="resetBio" name="resetBio" value="Reset Bio"/></td>
		</tr>
		</table>
	</form>

	</div>
	

</section>	
</section>
</section>
  
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>
</section>

</html>
<?php
}
?>