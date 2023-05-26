<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "НеудалосьподключитьсякMySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'POST'){
			$a=array();
			$json = json_decode(file_get_contents('php://input'),true);
			
			foreach ($json as $v){
				$text="INSERT INTO `theatre_film`(`theatreID`, `filmID`) VALUES ('".$v['theatreID']."','".$v['filmID']."')";
				$result=$mysqli->query($text);
				$b=array('result'=>$result);
				$a[]=$b;
			};	
			echo json_encode($a);
			return;			
		}
?>

