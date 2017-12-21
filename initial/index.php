<?php
session_start();
//Getting object from file-test
include('test.php');
global $max_q;
//How many questions are there
foreach($obj->biletnum as $key=>$value) if($key > $max_q) $max_q = $key; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Тест система</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<!--<p class="quiz-header"> Тест </p>-->

<?php
//Output the form

include('grade.php');

?>
</body>
</html>
