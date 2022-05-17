
<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Report</title>
        <link rel="stylesheet" href="layout.css">
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script><!--script for using J query  -->
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script><!--script for charts  -->
        
        
        <script src="chart.js"></script>
        
        
        
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
            <!-- php started -->
            <?PHP  

$server = 'db';
$username = 'root';
$password = 'csym019';
$schema = 'Recipes';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
// line 34 to 39 is to create a object which has constructor of my database 
$title=$_POST['title'];//set $title to get the post data from form in "recipeselectionform.php"

$text="title = '".$title[0]."'";
for($i=0;$i<count($title)-1;$i++){
 $text .= " or title ='".$title[$i+1]."' ";
}//line 43 to 45 is to add string by using 'for' loop to reach the format of the sql query after "where" clause when you want to select more than more row by differnt title.

echo '<table><tr><th>title</th><th>preptime</th><th>cooktime</th><th>complexity</th><th>serves</th></tr>';//create the format and first row of table to show selected recipes.

$results = $pdo->query('select*from recipe where '.$text);//to use $pdo to call query function to display selected recipes data in recipe table,pass data to $results
foreach($results as $row){
    echo '<tr><td>'.$row['title'].'</td><td>'. $row['preptime'].'</td><td>'.$row['cooktime'].'</td><td>'.$row['complexity'].'</td><td>'.$row['serves'].'</td></tr>';
   
}
// line 50 to 54 is to  display each row of $results with the table format by using foreach loop

echo '</table>';// end table tag


//line 60 to 88 is to show pie charts
file_put_contents('data.json', "[]");//clear previous records inside 'data.json'
$result1=$pdo->query('select*from nutrition where '.$text);//to use $pdo to call query function to display selected recipes data in nutrition table
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
    );//in foreach loop ,ceeate $array which is an array to hold the values we get from $result1
    
    if(filesize("data.json")==0){
        $first_record=array($array);
        $data_to_save=$first_record;
        // check if is the first record ,if is we create an array inside file
    }else{

        $old_records=json_decode(file_get_contents("data.json"));//docode the file and pass to $old_records
        array_push($old_records,$array);//push the $array to the $old_records
        $data_to_save=$old_records;
    }
    file_put_contents("data.json",json_encode($data_to_save,JSON_PRETTY_PRINT));//write $data_to_save to the file in a pretty print way
    echo '<h4>'.$row1['title'].'</h4><div style="width:300px;height: 300px;"><canvas id="'.$row1['title'].'" ></canvas><p> kcal = '.$row1['kcal'].'</p></div><br></br>';
    //display the piechart according to the different ID and the information of kcal
}

    //line 91 to 134 is to show barchart
file_put_contents('data1.json', "[]");//clear previous records
$result2=$pdo->query('select*from nutrition where '.$text);////to use $pdo to call query function to display selected recipes data in nutrition table
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
    );////in foreach loop ,ceeate $array1 which is an array to hold the values we get from $result2 and some default values which is for the barchart dataset
    if(filesize("data1.json")==0){
        $first_record=array($array1);

        $data_to_save=$first_record;//// check if is the first record ,if is we create an array inside file
    }else{

        $old_records=json_decode(file_get_contents("data1.json"));//// decode file and pass values to $old_records
        array_push($old_records,$array1);//push $array1 to $old_records
        $data_to_save=$old_records;
    }
    file_put_contents("data1.json",json_encode($data_to_save,JSON_PRETTY_PRINT));////write $data_to_save to the file in a pretty print way
}

?>
<canvas id="barchart"></canvas><!--show barchart if selected more than one recipe-->

 </main>
        <footer>&copy; CSYM019 2022</footer>
    </body>
</html>