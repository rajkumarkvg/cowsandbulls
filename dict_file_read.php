<?php
	$con=mysqli_connect("localhost","root","12345");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}
	
	mysqli_select_db($con,"cowsandbulls");
	
	$file=fopen("word_list_j.txt","r");
	while(!feof($file))
	{
		$str=fgets($file);
		$str1=strchr(trim($str)," ",true);
		$str2=strstr(trim($str)," ");
		$str3=strstr(trim($str2)," ",true);
		$str4=strstr(trim($str2)," ");
		/* echo $str1." || </br>";
		echo " || ".$str3." || </br>";
		echo " || ".$str4." || </br>"; */
		
		
		$sql="INSERT INTO entries VALUES ('$str1','$str3','$str4')";
		if(mysqli_query($con,$sql))		
				echo $str1." is inserted</br>";
		
	}
?>