

<?php
	require_once 'adm/vendor/autoload.php';
	use hisorange\BrowserDetect\Parser as Browser;
	$browser = new Browser;
	if ($browser->isBot()){
	  echo 1;
	} else
	{
		echo 0;
	}
	//die();
?>   
    