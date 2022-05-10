
<?php
$server = 'db';
$username = 'root';
$password = 'csym019';
//The name of the schema/database we created earlier in Adminer
//If this schema/database does not exist you will get an error!
$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

/*$stmt= $pdo->prepare('INSERT INTO nutrition  (  title,kcal, fat , saturates,carbs,sugars,fibre,protein,salt)
VALUES (:title,:kcal, :fat, :saturates, :carbs,:sugars,:fibre,:protein,:salt)');
//$stmt = $pdo->prepare('INSERT INTO recipe (title,preptime,cooktime,complexity,serves)VALUES(:title,:preptime,:cooktime,:complexity,:serves)');
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

 $stmt->execute($values);*/
 $stmt = $pdo->prepare('INSERT INTO recipe VALUES(:title,:preptime,:cooktime,:complexity,:serves)');
 $values=[
    'title'=>$_POST['title'],
    'preptime'=>$_POST['preptime'],
    'cooktime'=>$_POST['cooktime'],
    'compexity'=>$_POST['complexity'],
    'serves'=>$_POST['serves']
    ];
$pdo->query('INSERT INTO recipe VALUES(Mini bakewell tarts,1,1,1,1)');
echo 'Thank you for submiting new recipe';
?>