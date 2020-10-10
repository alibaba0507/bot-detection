

<?php
	require_once 'adm/vendor/autoload.php';
	use hisorange\BrowserDetect\Parser as Browser;
	$browser = new Browser;
	if ($browser->isBot()){
	  echo "isBot({name:1});";
	} else
	{
		echo "isBot({name:0});";
	}
	die();
?>   
    