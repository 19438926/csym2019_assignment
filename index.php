<form action="index.php" method="GET">
<input type="text" name="input1" />
<input type="text" name="input2" />
<input type="submit" value="Submit" name="submit" />
</form>
<?php
if (isset($_GET['input1'])) {
echo '<p>You entered <strong>' . $_GET['input1'] . '</strong> into text box 1</p>';
}
if (isset($_GET['input2'])) {
echo '<p>You entered <strong>' . $_GET['input2'] . '</strong> into text box 2</p>';
}
?>