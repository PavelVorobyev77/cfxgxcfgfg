<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Неудалосьподключитьсяк MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method == 'GET'){
		$a=array();
			$text="select * from films";
		
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result)){
				$b=array("name"=>$row['name'],"id"=>$row['ID']);
				$a[]=$b;
			}
			echo json_encode($a);
			return;
		}
?>
