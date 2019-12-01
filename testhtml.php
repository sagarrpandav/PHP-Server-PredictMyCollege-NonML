<?php

require "SQL.php";
require "PdfToText-master/PdfToText.phpclass";

//$caste=$_POST["caste"];
$university=$_POST["university"];
$year=$_POST["year"];
$path=$_POST["path"];

//echo $caste."<br>";
//echo $university."<br>";
//echo $year."<br>";
//echo $path;

mysqli_query($connection,"create table if not exists $university(year int,name varchar(40),OPEN float,OBC float,SC float,ST float,NC float,NT float,GIRLS float,Primary Key(year,name));");


$pdfvar=new PdfToText($path);

$data=$pdfvar->Text;

//echo $data;

//$words=str_word_count($data);

$parts=explode(" ",$data);

//echo sizeof($parts);

$count=0;;

for($i=8;$i<sizeof($parts)-9;$i++)
{
	$name=trim($parts[$i]);
	//echo $name;
	//echo "______".$parts[$i]."________".$name."______";
	//$tot=$parts[$i + 1];
	$openperc=$parts[$i + 1];
	//$obccount=$parts[$i + 3];
	$obcperc=$parts[$i + 2];

	///////11234567890
	//$indiv=explode(",",$parts[$i +3]);
	//$opencount=$parts[$i + 5];
	
	//$indiv=explode(",",$parts[$i +4]);
	//$sccount=$parts[$i + 7];
	$scperc=$parts[$i + 3];
	//$indiv=explode(",",$parts[$i +5]);
	//$ntcount=$parts[$i + 9];
	$stperc=$parts[$i + 4];
	$ncperc=$parts[$i + 5];

	$ntperc=$parts[$i+6];

	//$indiv=explode(",",$parts[$i +6]);
	//$stcount=$parts[$i + 11];
	
	//$indiv=explode(",",$parts[$i +7]);
	//$othercount=$parts[$i + 13];
	$girls=$parts[$i + 7];

	//echo $parts[$i];

	//echo $name." ".$tot." ".$obccount." ".$obcperc;
	/*$j=$i+1;
	echo $parts[$i]." ".$parts[$j];
	$name=$parts[$i];
	$seats=$parts[$j];
	//mysqli_query($connection,"insert into Info values('$name','$seats');");
	$i++;
	*/
	$i=$i+7;
	if(mysqli_query($connection,"insert into $university values('$year','$name','$openperc','$obcperc','$scperc','$stperc','$ncperc','$ntperc','$girls');"))
	{
		//echo "Data for Year ".$year." University ".$university."College ".$name." Uploaded Successfully!<br>";
	}
	//echo "...............".$i."->".$parts[$i]."++++++++++++++++++";

	$count++;

//	echo "Name is ".$name." Seats are ".$seats;
}

$res=mysqli_query($connection,"select * from universities where Name='$university';");
if(mysqli_num_rows($res)==0)
{
	mysqli_query($connection,"insert into universities values('$university','$count');");
}
?>