
	function display(image_id){
		$("#section").css({"left":"20%","top":"10%"})
		$("#section").toggle("fade");
		
		 $.get("ppe_json.php", function(data){
				var data = JSON.parse(data);
				var val = image_id;
				loadInfo(data, val);
			});
	}
	
	function loadInfo(data, val)
	{
		$("#fName").html(data[val].fName);
		$("#lName").html(data[val].lName);
		$("#program1").html(data[val].program1);
		$("#program2").html(data[val].program2);
		$("#email").html(data[val].email);
		$("#linkedIn").html(data[val].linkedIn);
		$("#websiteAddress1").html(data[val].website1);
		$("#websiteAddress2").html(data[val].website2);
		$("#hometown").html(data[val].hometown);
		$("#careerGoals").html(data[val].careerGoals);
		$("#threeWords").html(data[val].threeWords);

	}

$(document).ready(function(){

	$("#section").draggable({
		containment: "window",
	});
	
	$("#closeSection").click(function(){
		$("#section").toggle("fade");
	});
	
});