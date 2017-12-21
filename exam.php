<?php
session_start();
//Getting object from file-test
require_once('test.php');
global $max_q;
if (!empty($_POST['fio'])) $_SESSION['fio']=$_POST['fio']; 
if (!empty($_POST['coursename'])) $_SESSION['coursename']=$_POST['coursename']; 
if (!empty($_POST['orgname'])) $_SESSION['orgname']=$_POST['orgname']; 
if (!empty($_POST['occupation'])) $_SESSION['occupation']=$_POST['occupation']; 
//How many questions are there
foreach($obj->biletnum as $key=>$value) if($key > $max_q) $max_q = $key; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Тест система</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>

    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #A1A3A2), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #A1A3A2 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#A1A3A2', endColorstr='#7D7D7D');background-color:#A1A3A2; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #605f5f; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #605f5f; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
    .datagrid-wrapper {width:60%;}
    .datagrid-wrapper {
	    width: 60%;
	    margin-left: auto;
	    margin-right: auto;
     }
    table .alt{background-color:#EBEBEB;}
    table#altertable td:last-child {
        text-align: center;
    }
    table#first { margin-left:auto;margin-right:auto; padding:40px 0;}
    table#first tr td:first-child { padding:0 55px; }
</style>
</head>

<body>
<!--<p class="quiz-header"> Тест </p>-->

<?php
//Output the form

include('grade.php');

?>
<script>
function alternate(id){
	if(document.getElementById){						//check that browser has capabilities
		var table = document.getElementById(id);		//get just the selected table not all of them
		var rows = table.getElementsByTagName("tr");	//get all table rows
		for(i = 0; i < rows.length; i++){				//alternate styles			
			//manipulate rows	
		doAlternate(rows[i], i);
		}
	}
}

/****************************************************************************************/
function doAlternate(row, i){
	if(i % 2 == 0){
			row.className = "alt";
	}
}
alternate('altertable')	
</script>
</body>
</html>
