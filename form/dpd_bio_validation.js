//Form Validation

function validateFirstName(){
	// valid first name should only include letters, numbers, and spaces
	// ... must be present
	
	var firstName = $("#firstName").val();
	var firstNameRegEx = new RegExp(/^[a-zA-Z'\- ]*$/); 
	var validFirstName = firstNameRegEx.test(firstName);
	
	if(validFirstName || firstName == ""){
		$("#firstNameError").html("");
	}
	else{
		$("#firstNameError").html("Please use only letters, apostrophes, and hyphens in your first name");
		validBioForm = false;
	}
}

function validateLastName(){
	// valid last name should only include letters, numbers and spaces
	// ... must be present
	
	var lastName = $("#lastName").val();
	var lastNameRegEx = new RegExp(/^[a-zA-Z'\- ]*$/); 
	var validLastName = lastNameRegEx.test(lastName);
	
	if(validLastName || lastName == ""){
		$("#lastNameError").html("");
	}
	else{
		$("#lastNameError").html("Please use only letters apostrophes, and hyphens in your last name");
		validBioForm = false;
	}
}

function validateProgram(){
	//valid program must not be default options
	
	var program = $("#program").val();
	
	if(program == "default"){
		$("#programError").html("Please select your program");
		validBioForm = false;
	}
	else
	{
		$("#programError").html("");
	}
}

function validateWebsiteAddress(){
	
	var websiteAddress = $("#websiteAddress").val();
	var websiteAddressRegEx = new RegExp(/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/);
	var validWebsiteAddress = websiteAddressRegEx.test(websiteAddress);
	
	if(validWebsiteAddress || websiteAddress == ""){
		$("#websiteAddressError").html("");
	}
	 else{
		$("#websiteAddressError").html("Please enter a valid website address");
		validBioForm = false;
	}
}

function validateWebsiteAddress2(){
	
	var websiteAddress2 = $("#websiteAddress2").val();
	var websiteAddress2RegEx = new RegExp(/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/)
	var validWebsiteAddress2 = websiteAddress2RegEx.test(websiteAddress2);
	
	if(validWebsiteAddress2 || websiteAddress2 == ""){
		$("#websiteAddress2Error").html("");
	}
	else{
		$("#websiteAddress2Error").html("Please enter a valid secondary website address");
		validBioForm = false;
	}
}

function validateLinkedIn()
{
	var linkedIn = $("#linkedIn").val();
	var linkedInRegEx = new RegExp(/((https?:\/\/)?((www|\w\w)\.)?linkedin\.com\/)((([\w]{2,3})?)|([^\/]+\/(([\w|\d-&#?=])+\/?){1,}))$/);
	var validLinkedIn = linkedInRegEx.test(linkedIn);
	
	if(validLinkedIn || linkedIn == "")
	{
		$("#linkedInError").html("");
	}
	else
	{
		$("#linkedInError").html("Please enter a valid LinkedIn Profile URL");
		validBioForm = false;
	}
}

function validateEmail(){
	//valid email should be in a proper format  
	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123
	//Non-Matches: a@b | notanemail | bob@@.
	
	var email = $("#email").val();
	var emailRegEx = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/);
	var validEmail = emailRegEx.test(email);
	
	if(validEmail || email == ""){
		$("#emailError").html("");
	}
	else{
		$("#emailError").html("Please enter a valid email");
		validBioForm = false;
	}
}

function validateHometown(){
	// valid first name should only include letters, numbers, spaces, and commas
	// ... must be present
	
	var hometown = $("#hometown").val();
	var hometownRegEx = new RegExp(/^[a-zA-Z0-9, ]*$/); 
	var validHometown = hometownRegEx.test(hometown);
	
	if(validHometown || hometown == ""){
		$("#hometownError").html("");
	}
	else{
		$("#hometownError").html("Please use only letters and/or numbers in your hometown");
		validBioForm = false;
	}
}

function validateCareerGoals(){
	//valid career goals should include only numbers, letters, spaces, and basic punctuation
	
	var careerGoals = $("#careerGoals").val();
	var careerGoalsRegEx = new RegExp(/[a-zA-Z0-9,.!?;" ]$/);
	var validCareerGoals = careerGoalsRegEx.test(careerGoals);

	
	if(validCareerGoals || careerGoals == ""){
		$("#careerGoalsError").html("");
	}
	else{
		$("#careerGoalsError").html("Please use only numbers, letters, spaces, and basic punctuation(.,!?&ldquo;') in your career goals");
		validBioForm = false;
	}	
}

function validateThreeWords(){
	//valid three-words should include only numbers, letters, spaces, and basic punctuation
	
	var threeWords = $("#threeWords").val();
	var threeWordsRegEx = new RegExp(/[a-zA-Z0-9,.!?;" ]$/);
	var validThreeWords = threeWordsRegEx.test(threeWords);

	
	if(validThreeWords || threeWords == ""){
		$("#threeWordsError").html("");
	}
	else{
		$("#threeWordsError").html("Please use only numbers, letters, spaces, and basic punctuation(.,!?&ldquo;') in your three words");
		validBioForm = false;
	}	
}

function validateBioForm(){
	validBioForm = true;
	validateFirstName();
	validateLastName();
	validateProgram();
	validateWebsiteAddress();
	validateWebsiteAddress2();
	validateLinkedIn();
	validateEmail();
	validateHometown();
	validateCareerGoals();
	validateThreeWords();
	
	if(validBioForm){
		$("#portfolioBioForm").submit();
	}
}
