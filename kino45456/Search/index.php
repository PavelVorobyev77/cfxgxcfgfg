<?php
	$mysqli=new mysqli('localhost','root','','kino');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$method = $_SERVER['REQUEST_METHOD'];
   
	if ($method == 'GET'){
		$a=array();
			$text="SELECT films.name as tfilm, theatres.name as ttheatres, theatres.address as taddress from films join theatre_film on theatre_film.filmID = films.ID join theatres on theatre_film.theatreID = theatres.ID where films.name like '%".$_GET['name']."%' ";
		
			$result=$mysqli->query($text);
			while ($row = mysqli_fetch_assoc($result)){
				$b=array("ttheatres"=>$row['ttheatres'],"taddress"=>$row['taddress'],"tfilm"=>$row['tfilm']);
				$a[]=$b;
			}
			echo json_encode($a);
			return;
	}
    else{
        echo " не удалось";
    }
    //SELECT films.name, theatres.name, theatres.address FROM films WHERE name like "М%" INNER JOIN theatre_film on films.ID= theatre_film.filmID INNER JOIN 
?>