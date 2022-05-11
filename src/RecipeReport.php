
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
                <li><a href="recipeselectionform.php">Recipe Report</a></li>
                <li><a href="addnewRecipe.php">New Recipe</a></li>
            </ul>
        </nav>
        <main>
            <h3> Recipe Reoprt</h3>
            <h4> Selected Recipes</h4>
            <?PHP

$server = 'db';
$username = 'root';
$password = 'csym019';

$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$title=$_POST['title'];
$text="title = '".$title[0]."'";
for($i=0;$i<count($title)-1;$i++){
 $text .= " or title ='".$title[$i+1]."' ";

}

$results = $pdo->query('select*from recipe where '.$text);
echo '<table><tr><th>title</th><th>preptime</th><th>cooktime</th><th>complexity</th><th>serves</th></tr>';
foreach($results as $row){
    echo '<tr><td>'.$row['title'].'</td><td>'. $row['preptime'].'</td><td>'.$row['cooktime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td></tr>';
   
}
echo '</table>';
?>
            
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>