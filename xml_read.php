<?php
	
	//word for search
	$word="test";

	//getting xml object for a search from DictService(only WordNet)
	$xml=simplexml_load_string( 
	file_get_contents('http://services.aonaware.com/DictService/DictService.asmx/DefineInDict?dictId=wn&word='.$word) 
	) 
	or 
	die("Error: Cannot create object");
	
	//echo $res;
	
	$def=$xml->Definitions->Definition->WordDefinition;
	
	//identify whether the word is a verb or not using regex
	$validity=preg_match("/v\s(\d*):/",$def);
	
	//getting various types and its definition for given word
	//$type_flag = preg_match_all("/(\w+)\s(\d*):/", $def,$types,PREG_OFFSET_CAPTURE);
	//$flag = preg_match_all("/(\d+):/", $def,$numbers,PREG_OFFSET_CAPTURE);

	//echo $validity;
	
	
	//split definitions based on types
	//$def_array=preg_split("/(\w+)\s(\d*):/",$def,NULL,PREG_SPLIT_NO_EMPTY);
	
	//replacing shortforms with full words and giving proper linebreaks
	$def_replace=preg_replace("/n\s(\d*):/",'</br></br>noun</br></br>$1:',$def);
	$def_replace=preg_replace("/adv\s(\d*):/",'</br></br>adverb</br></br> $1',$def_replace);
	$def_replace=preg_replace("/v\s(\d*):/",'</br></br>verb</br></br>$1',$def_replace);
	$def_replace=preg_replace("/adj\s(\d*):/",'</br></br>adjective</br></br>$1',$def_replace);
	$def_replace=preg_replace("/(\d+):/",'</br>$1:',$def_replace);
	
	echo $def_replace;
	
?>
