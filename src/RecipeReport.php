
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


file_put_contents('data1.json', "[]");
$result2=$pdo->query('select*from nutrition where '.$text);
foreach($result2 as $row2){
    $array1=array(
        'label'=>$row2['title'],
        'data'=>[$row2['kcal'],$row2['fat'],$row2['saturates'],$row2['carbs'],$row2['sugars'],$row2['fibre'],$row2['protein'],$row2['salt'] ],
        'backgroundColor'=> [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(100, 100, 100, 0.2)',
            'rgba(130, 192, 30, 0.2)'

        ],
        'borderColor'=> [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(100, 100, 100, 1)',
            'rgba(130, 192, 30, 1)'
        ],
        'borderWidth'=> 1
    );
    if(filesize("data1.json")==0){
        $first_record=array($array1);

        $data_to_save=$first_record;
    }else{

        $old_records=json_decode(file_get_contents("data1.json"));
        array_push($old_records,$array1);
        $data_to_save=$old_records;
    }
    file_put_contents("data1.json",json_encode($data_to_save,JSON_PRETTY_PRINT));
}

?>
<canvas id="barchart"></canvas>

 </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>