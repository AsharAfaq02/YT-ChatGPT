<!DOCTYPE html>
<html>
<body>
 
<?php
echo "Welcome to Youtube responder";
error_reporting(0);
?>

<form action="index.php" method="POST">
which YT video? : <input type="text" name="id"><br>
ask chatgpt prompt? : <input type="text" name="prompt"><br>
<input type="submit">
</form>

  id: <?php 

$output_array_url = array("");
parse_str($_POST["id"], $output_array_url);
$output = $output_array_url["https://www_youtube_com/watch?v"];
$output_arr = json_encode(array(
    "video_id" => $output,
    "prompt" => $_POST["prompt"],
    ));
echo $output;

$myfile = fopen("info.json", "w") or die("Unable to open file!");
fwrite($myfile, $output_arr);
fclose($myfile);
?><br>

prompt : <?php echo $_POST["prompt"]; 
$output = shell_exec("python youtube_api.py"); 
header('Refresh: 0');
?>
<br>
<br>

<?php 

$str = file_get_contents('prompt_output.json');
$json = json_decode($str, true);
$output_string = (string)$json;
$formatted_output = chunk_split($output_string, 200);
echo '<h>' . $formatted_output . '<h>';

?>
</body>
</html>