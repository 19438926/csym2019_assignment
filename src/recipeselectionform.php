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
                <li><a href="./recipeSelectionForm.html">Recipe Report</a></li>
                <li><a href="./addnewrecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3> Recipe Selection Form</h3>
            <?php

$server = 'db';
$username = 'root';
$password = 'csym019';

$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$results = $pdo->query('SELECT * FROM recipe order by title');
echo '<table><tr><th>title</th><th>preptime</th><th>cooktime</th><th>complexity</th><th>serves</th></tr>';
  
foreach ($results as $row) {

    echo '<tr><td>'.$row['title'].'</td><td>'. $row['preptime'].'</td><td>'.$row['cooktime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td></tr>';
}
echo '</table>';

?>
<br></br>
           
            <form action="./SampleRecipeReport.html" class="addmore">
                
                <input type="submit" value="Create Recipe Report" />
                <!--input type="reset" value="Cancel" /-->                
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>