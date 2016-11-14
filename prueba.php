<!DOCTYPE html>
<html>
<body>

<?php
echo readfile("./file/Cancun.txt");

echo '<br><br><br><br>';
$stirng = file_get_contents("./file/Cancun.txt");
print($stirng);

$ciudad = fopen("./file/Cancun.txt", "r");
while(!feof($ciudad)){
    echo fgets($ciudad);
    echo "<br>";
}
fclose($ciudad);
?>

</body>
</html>