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
            <h3> Recipe Selection Form</h3>
            <form action="RecipeReport.php"  method="POST">
            
            <?php

$server = 'db';
$username = 'root';
$password = 'csym019';

$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$results = $pdo->query('select distinct(title) ,preptime ,cooktime,complexity,serves,kcal,fat,saturates,carbs,sugars,fibre,protein,salt from recipe natural join nutrition order by title');
echo '<table><tr><th>TICK</th><th>title</th><th>preptime</th><th>cooktime</th><th>complexity</th><th>serves</th><th>kcal</th><th>fat</th><th>saturates</th><th>carbs</th><th>sugars</th><th>fibre</th><th>protein</th><th>salt</th></tr>';
  
foreach ($results as $row) {
    

    echo '<tr><td><input type="checkbox" value="'. $row['title'].'"name="title[]"/></td><td>'.$row['title'].'</td><td>'. $row['preptime'].'</td><td>'.$row['cooktime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td>
    <td>'.$row['kcal'].'</td><td>'.$row['fat'].'</td><td>'.$row['saturates'].'</td><td>'.$row['carbs'].'</td><td>'.$row['sugars'].'</td><td>'.$row['fibre'].'</td><td>'.$row['protein'].'</td><td>'.$row['salt'].'</td></tr>';
}
echo '</table>';

?>
<br></br>
           
            

                <input type="submit" value="Create Recipe Report" />
                               
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>