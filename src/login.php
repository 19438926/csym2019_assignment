<!DOCTYPE html>
<html>
<head>
<title>This is login page</title>
    </head>
    <body>
        <div>
            <h1>LOGIN</h1>
            <form method="POST"> <!-- use form for login which has text and password textfields and submit button for posting data -->
            username: <input type='text' name='username'>    
            password: <input type='password' name='password'>
            <input type='Submit' name='submit' value='OK'>
</form>
</div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $un=$_POST['username'];//set variable to get the data posted by username
        $pw=$_POST['password'];//set variable to get the data posted by password
        if($un=='123'&& $pw=='123'){//set success login information
            echo "<script>location.href='recipeselectionform.php';</script>";//to another page 
        }
        else
            echo 'Sorry. Invalid Number';
            } 
?>