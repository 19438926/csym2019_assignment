<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
        <header>
            <h3>CSYM019 - BBC GOOD FOOD RECIPES</h3>
        </header>
        <nav>
            <ul>
                <li><a href="./recipeselectionform.php">Recipe Report</a></li>
                <li><a href="./addnewrecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3> New Recipe Entery Form</h3>
<?php
            if(isset($_POST['submit'])){
                
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
 
  echo '<h4>'.'Thank you for submiting new recipe'.'</h4>';

            }
            ?>
            <form action="addnewrecipe.php" method="POST">
                title:<p><input type="text" name="title"/> 
                </p>
                kcal:<p><input type="text" name="kcal"/></p>
                fat(g):<p><input type="text" name="fat"/></p>
                saturates(g):<p><input type="text" name="sat"/></p>
                carbs(g):<p><input type="text" name="carbs"/></p>
                sugars(g):<p><input type="text" name="sugars"/></p>
                fibre(g):<p><input type="text" name="fibre"/></p>
                protein(g):<p><input type="text" name="protein"/></p>
                salt(g):<p><input type="text" name="salt"/></p>
                
                    
                
                <input type="submit" value="Add Recipe" name="submit" />
                                   
                
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>