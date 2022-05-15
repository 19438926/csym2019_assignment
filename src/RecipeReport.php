
<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="piechart.js"></script>
        
        
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
            <h2> Recipe Reoprt</h2>
            <h3> YOUR CHOSEN RECIPES</h3>
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



file_put_contents('data.json', "[]");
$result1=$pdo->query('select*from nutrition where '.$text);
foreach($result1 as $row1){
    $array= array(
        'title'=>$row1['title'],
        'fat'=>$row1['fat'],
        'sugars'=>$row1['sugars'],
        'saturates'=>$row1['saturates'],
        'salt'=>$row1['salt'],
        'protein'=>$row1['protein'],
        'fibre'=>$row1['fibre'],
        'carbs'=>$row1['carbs']
    );
    
    if(filesize("data.json")==0){
        $first_record=array($array);

        $data_to_save=$first_record;
    }else{

        $old_records=json_decode(file_get_contents("data.json"));
        array_push($old_records,$array);
        $data_to_save=$old_records;
    }
    file_put_contents("data.json",json_encode($data_to_save,JSON_PRETTY_PRINT));
    echo '<h4>'.$row1['title'].'</h4><div style="width:300px;height: 300px;"><canvas id="'.$row1['title'].'" ></canvas><p> kcal = '.$row1['kcal'].'</p></div><br></br>';
}
?>
 </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>