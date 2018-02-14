
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
		$("#name").html(data[val].name);
		$("#words").html(data[val].words);
		$("#image").html(data[val].photo);

	}

$(document).ready(function(){

	$("#section").draggable({
		containment: "window",
	});
	
	$("#closeSection").click(function(){
		$("#section").toggle("fade");
	});
	
});