<?php

	/*
		simple gd based captcha.
		random 4 digit code is written into
		an image,them user has to pass it via
		GET request to captcha.php

	 */

	session_start();
	if(!isset($_SESSION['code']))
		$_SESSION['code'] = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
	//starting session and generating the code if its not present

	$img = imagecreate(128,64);
	$background_color = imagecolorallocate($img,65,0,0);
	$second_color = imagecolorallocate($img,255,255,255);
	imagettftext($img,24,12,22,44,$second_color,realpath("font.ttf"),$_SESSION['code']);
	imagepng($img,"image.png");
	//creating an image and writing text into it
	imagedestroy($img);
	//destroying an image	
?>

<html>
	<head>
	</head>
		<body>
			<!--
			>NOOOOOO!!!!YOU CANT JUST CREATE SHITTY HTML AND DONT
			GIVE A CRAP ABOUT IT.YOU MUST CREATE BEAUTIFULL,RESPONSIVE
			PAGE WITH BOOTSTRAP AND REACT.JS!!!!!!
			>he hee,minimalistic html goes brr!
			-->
			<img src="image.png">
			<?php
	
				if(isset($_SESSION['verified']) && $_SESSION['verified'] == true){
					echo "<p>verified!</p>";
					unset($_SESSION['code']);
					unset($_SESSION['verified']);
					//showing the message and cleaning everything
				}else{
					echo "<p>not verified</p>";
					//if code was invalid,not provided etc. we got different message
				}			
			?>
		</body>
</html>
