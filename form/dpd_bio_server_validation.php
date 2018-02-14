<?php
//server-side validation

//form variables
$inFirstName = "";
$inLastName = "";
$inProgram = "";
$inWebsiteAddress = "";
$inWebsiteAddress2 = "";
$inLinkedIn = "";
$inEmail = "";
$inHometown = "";
$inCareerGoals = "";
$inThreeWords = "";
$inRobotest = "";

$validForm = true;

function firstNameValidation()
{
	global $inFirstName, $validForm;
	
	$firstNameRegEx = "/^[a-zA-Z0-9 ]*$/";
	
	if(preg_match($firstNameRegEx, $inFirstName) || ($inFirstName == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "1";
	}
	
}

 function lastNameValidation()
{
	global $inLastName, $validForm;
	
	$lastNameRegEx = "/^[a-zA-Z0-9 ]*$/";
	
	if(preg_match($lastNameRegEx, $inLastName) || ($inLastName == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "2";
	}
	
}


function programValidation()
{
	global $inProgram, $validForm;
	
	if($inProgram == "default"){
		$validForm = false;
		echo "3";
	}
}

function websiteAddressValidation()
{
	global $inWebsiteAddress, $validForm;
	
	$websiteAddressRegEx = "/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/";
	
	if(preg_match($websiteAddressRegEx, $inWebsiteAddress) || ($inWebsiteAddress == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "4";
	}

	
}

function websiteAddress2Validation()
{
	global $inWebsiteAddress2, $validForm;
	
	$websiteAddress2RegEx = "/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/";
	
	if(preg_match($websiteAddress2RegEx, $inWebsiteAddress2) || ($inWebsiteAddress2 == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "5";
	}

}

function linkedInValidation()
{
	global $inLinkedIn, $validForm;
	
	$linkedInRegEx = "/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)((([\w]{2,3})?)|([^\/]+\/(([\w|\d-&#?=])+\/?){1,}))$/";
	
	if(preg_match($linkedInRegEx, $inLinkedIn) || ($inLinkedIn == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "5.5";
	}
}

function emailValidation()
{
	global $inEmail, $validForm;
	
	$emailRegEx = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
	
	if(preg_match($emailRegEx, $inEmail) || ($inEmail == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "6";
	}

}

function hometownValidation()
{
	global $inHometown, $validForm;
	
	$hometownRegEx = "/^[a-zA-Z0-9, ]*$/";

	if(preg_match($hometownRegEx, $inHometown) || ($inHometown == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "7";
	}
	
}

function careerGoalsValidation()
{
	global $inCareerGoals, $validForm;
	
	$careerGoalsRegEx = "/[a-zA-Z0-9,.!?;\" ]$/";
	
	if(preg_match($careerGoalsRegEx, $inCareerGoals) || ($inCareerGoals == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "8";
	}
	
}
	
function threeWordsValidation()
{
	global $inThreeWords, $validForm;
	
	$threeWordsRegEx = "/[a-zA-Z0-9,.!?;\" ]$/";
	
	if(preg_match($threeWordsRegEx, $inThreeWords) || ($inThreeWords == ""))
	{
		return;
	}
	else
	{
		$validForm = false;
		echo "9";
	}
	
}	

function validateRobotest()
{
	global $inRobotest, $validForm;
	if(!empty($inRobotest))
	{
		$validForm = false;
		echo "10";
	}
}
function validateForm()
{
	global $validForm;
	
	firstNameValidation();
	lastNameValidation();
	programValidation();
	websiteAddressValidation();
	websiteAddress2Validation();
	emailValidation();
	hometownValidation();
	careerGoalsValidation();
	threeWordsValidation();
	validateRobotest();
	
	//return $validForm;
}
?>