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
            <form action="RecipeReport.php"  method="POST"> <!--create a form tag for posting data -->
            
            <?php
            // i put php code inside form tag to display all the recipe data inside database

$server = 'db';
$username = 'root';
$password = 'csym019';

$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// line 23-29 is to create a object which has constructor of my database

$results = $pdo->query('select distinct(title) ,preptime ,cooktime,complexity,serves,kcal,fat,saturates,carbs,sugars,fibre,protein,salt from recipe natural join nutrition order by title');
//line 32 is to use $pdo to call query function to display all recipe data,coz I have two tables in database so I need to use sql join query
echo '<table><tr><th>TICK</th><th>title</th><th>preptime</th><th>cooktime</th><th>complexity</th><th>serves</th><th>kcal</th><th>fat</th><th>saturates</th><th>carbs</th><th>sugars</th><th>fibre</th><th>protein</th><th>salt</th></tr>';
//line 34 is to create the format and the first row of table(display all recipes data with tick box)
  
foreach ($results as $row) {
    echo '<tr><td><input type="checkbox" value="'. $row['title'].'"name="title[]"/></td><td>'.$row['title'].'</td><td>'. $row['preptime'].'</td><td>'.$row['cooktime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td>
    <td>'.$row['kcal'].'</td><td>'.$row['fat'].'</td><td>'.$row['saturates'].'</td><td>'.$row['carbs'].'</td><td>'.$row['sugars'].'</td><td>'.$row['fibre'].'</td><td>'.$row['protein'].'</td><td>'.$row['salt'].'</td></tr>';
     }
 //line 37 to 40 is to display each row of $results with the table format by using foreach loop , and in the checkbox ,every checkbox has different value according to the recipe title 
echo '</table>';//end the table

?>
<br></br>
           
            

                <input type="submit" value="Create Recipe Report" /> <!-- submit button -->
                               
            </form>
        </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>