

<?php
	require_once 'adm/vendor/autoload.php';
	use hisorange\BrowserDetect\Parser as Browser;
	$browser = new Browser;
	/*
	This to be used be JSONP where is a cross domain js script
	 to execute this on the client site add this code
	 <script>
		function isBot(data){ 
		    // do someting with data
			//document.getElementById("info").textContent= data.name;
		};
	</script>
	<script src="https://bot-detect-1.herokuapp.com/bot-detect.php"></script>
	*/
	if ($browser->isBot()){
	  echo "isBot({name:1});";
	} else
	{
		echo "isBot({name:0});";
	}
	die();
?>   
    