<?php

Function get_string_between_characters($String, $Tag_Open, $Tag_Close)
{
	foreach (explode($Tag_Open, $String) as $key => $Value) 
	{
		if(strpos($Value, $Tag_Close) !== FALSE)
		{
			$Result[] = substr($Value, 0, strpos($Value, $Tag_Close));
		}
		else
		{
			
		}
	}
	if(isset($Result))
	{
		return $Result;
	}
	else
	{
		$Result =	"there_were_no_tags";
		return $Result;
	}
	
	
}

$json_normal	=	'{"field1":"value1","field2":"value2","field3":"value3","field4":"value4"}';

echo						'<br>';
echo						$json_normal;
echo						'<br>';





$json_3d				=	'{"field1":"value1","field2":"value2","field3":"value3","field4":"value4","field5[0]":"value5","field5[1]":"value6"}';

echo						'<br>';
echo						$json_3d;
echo						'<br>';





$array_3d			=	array("field1"=>"value1","field2"=>"value2","field3"=>"value3","field4"=>"value4","field5[0]"=>"value5","field5[1]"=>"value6");

echo						'<br>';
echo						'<pre>';
print_r($array_3d);
echo						'</pre>';
echo						'<br>';




$a=0;
$objekt	=	array();
foreach($array_3d as $key => $value)
{
	if(strpos($key, "[") !== false)
	{
		/*$objekt[$a]								=	 array();*/
		
		$index											=	get_string_between_characters($key, '[', ']')[0];
		$key												=	str_replace('['.$index.']', '', $key);
		
		$objekt[$a][$key][$value] 	= 	$a;
		
		$objekt[$key][$a]					=	$value;
		$a++;
	}
	else
	{
		$objekt[$a] 								= 	array();
		$objekt[$a][$key]					=	array();
		
		$objekt[$key]							=	$value;
	}
	
}







echo						'<br>';
echo						'<pre>';
print_r($objekt);
echo						'</pre>';
echo						'<br>';







if(isset($objekt['field5']))
{
	echo "\$objekt['field5'] = ";
	$a=0;
	foreach($objekt['field5'] as $value)
	{
		echo '<br>_____________________________ : '.$value.' : _____________________________ : '.$a.' : <br>';
		$a++;
	}
}











































?>