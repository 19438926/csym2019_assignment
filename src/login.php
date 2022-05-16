<!DOCTYPE html>
<html>
<head>
<title>This is login page</title>
    </head>
    <body>
        <div>
            <h1>LOGIN</h1>
            <form method="POST">
            username: <input type='text' name='username'>
            password: <input type='password' name='password'>
            <input type='Submit' name='submit' value='OK'>
</form>
</div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $un=$_POST['username'];
        $pw=$_POST['password'];
        if($un=='123'&& $pw=='123'){
            echo "<script>location.href='recipeselectionform.php';</script>";
        }
        else
            echo 'Sorry. Invalid Number';
            } 
?>