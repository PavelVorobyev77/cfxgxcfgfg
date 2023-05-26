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
$text="SELECT films.name as fname, theatres.name as tname, theatres.address as taddress FROM films join theatres_films on films.id=theatres_films.filmID JOIN theatres on theatres.id=theatres_films.theatreID WHERE films.name LIKE '%".$_GET['name']."%'";

$result=$mysqli->query($text);
while ($row = mysqli_fetch_assoc($result)){
$b=array("fname"=>$row['fname'],"tname"=>$row['tname'],"taddress"=>$row['taddress']);
$a[]=$b;
}

echo json_encode($a);
return;
}
?>