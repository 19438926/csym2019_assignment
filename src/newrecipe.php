
<?php
$server = 'db';
$username = 'root';
$password = 'csym019';

$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$stmt= $pdo->prepare('INSERT INTO nutrition  (  title,kcal, fat , saturates,carbs,sugars,fibre,protein,salt)
VALUES (:title,:kcal, :fat, :saturates, :carbs,:sugars,:fibre,:protein,:salt)');

$values = [
'title'=>$_POST['title'],
'kcal' => $_POST['kcal'],
'fat' => $_POST['fat'],
'saturates' => $_POST['sat'],
'carbs' => $_POST['carbs'],
'sugars' => $_POST['sugars'],
'fibre' => $_POST['fibre'],
'protein' => $_POST['protein'],
'salt' => $_POST['salt']

];

 $stmt->execute($values);
 
echo 'Thank you for submiting new recipe';
?>