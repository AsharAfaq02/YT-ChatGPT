<!DOCTYPE html>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content=
        "width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity=
"sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
        crossorigin="anonymous" />
</head>

<body>
 
<?php

echo "Welcome to Youtube responder";

error_reporting(0);

$rm_file = "prompt_output.json";

$rm_file2 = "info.json";

if (file_exists($rm_file)) {

    unlink($rm_file);
}

if (file_exists($rm_file2)) {

  unlink($rm_file2);
}
?>
<form action="index.php" method="POST">

  <div class="form-group" >

    <label for="id">Enter youtube URL</label>

    <input type="text" class="form-control" name = "id" placeholder="Youtube URL">

  </div>

  <div class="form-group">

    <label for="prompt">Enter ChatGPT prompt</label>

    <input type="text" class="form-control" name = "prompt" id="prompt" placeholder="ChatGPT Prompt">
  
</div>

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

?>

<br>

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

?>

<div class="jumbotron jumbotron-fluid">

  <div class="container">

    <p class="lead"> <?php echo  $formatted_output  ?> </p>

  </div>

  </div>

<?php

if (file_exists($rm_file)) {

  unlink($rm_file);
}

if (file_exists($rm_file2)) {

unlink($rm_file2);
}

?>

</body>

</html>