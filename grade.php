<?php
session_start();
$debug = 1;
global $obj2;
//$obj2 = (object)[];


//    if (isset($_POST['Submit'])) {
//        if ($_POST['Submit'] == "Результаты") { }
//	}


if ($_SESSION['result']) {       
    $right = $_SESSION['right'];
    $res_percent = floor((int)$right*100/$max_q); 

echo "<table id='first'><tbody><tr><td>Студент: </td><td>";
echo $_SESSION['fio'];
echo "</td></tr><tr><td>Организация: </td><td>";
echo $_SESSION['orgname'];
echo "</td></tr><tr><td>Должность: </td><td>";
echo$_SESSION['occupation'];
echo "</td></tr><tr><td>Курс: </td><td>";
echo $_SESSION['coursename'];
echo "</td></tr><tr><td>Всего вопросов: </td><td>";
echo $max_q;
echo "</td></tr><tr><td>Верных: </td><td>";
echo ($right) ? $right : '0';
echo "</td></tr><tr><td>Неверных: </td><td>";
echo $max_q-$_SESSION['right'];
echo "</td></tr><tr><td>Всего правильных: </td><td>";
echo $res_percent." %";
echo "</td></tr></tbody></table>";

echo "<p style='text-align:center'>Результат экзамена: <u>";
echo ($res_percent > 80) ? "<u>СДАН</u>" : "<u>НЕ СДАН</u>";
echo "</u></p><br/>";


echo '<div class="datagrid-wrapper">
<div class="datagrid">
    <table id ="altertable">
        <thead>
            <tr>
                <th width="60%">Вопрос</th>
                <th width="25%">Вы ответили</th>
                <th width="15%">Результат</th>
            </tr>
        </thead>
        <tbody>';

for ($i = 1; $i <= $max_q; $i++) { 

echo "<tr><td>".$obj->biletnum->{$i}{'vopros'}."</td>";
echo "<td>".$_SESSION['yourvar']{$i}."</td><td>";
echo ($_SESSION['good']{$i} == 1) ? 'Верно' : 'Неверно';
echo "</td></tr>"; 
} 


echo "</tbody>
    </table>
</div><br/><br/>";

//foreach($obj->biletnum->vopros as $key) print_r($key);

//print_r($obj->biletnum->{$c-1}{'otvecheno'});


    session_destroy();
}

if ((!$_SESSION['result'])) {
   
    $c = $_SESSION['count'];
    if (!isset($_SESSION['count']))
        $c = $_SESSION['count'] = 1;
    if (isset($_POST['Submit'])) {
        if ($_POST['Submit'] == "Далее") {
            $_SESSION['count']++;
            $c = $_SESSION['count'];
           
    //print_r($_SESSION['count']);
    $cmp = (int) $obj->biletnum->{$c - 1}{'otvet'};
    $ans = (int) $_POST['answer'];
    $_SESSION['ans']{$c-1}= $ans;
    $_SESSION['yourvar']{$c-1}=$obj->biletnum->{$c - 1}{'varik'}->{$obj->biletnum->{$c - 1}{'otvet'}};
    if (($cmp == $ans) && (!empty($cmp)) && (!empty($ans))) 
	{	
		$_SESSION['right']++; 
	        $_SESSION['good']{$c-1} = 1;
	}
if ($debug) {
    echo "Подсчет по предыдущему билету / Previous question data: <br/>";
    echo "Realniy otvet bil / Right answer is: ";
    print_r($obj->biletnum->{$c - 1}{'otvet'});
    echo "<br/>Pravilnih / Right answers (in total): ";
    echo $_SESSION['right'];
    echo "<br/>Vvedenniy otvet bil / You've answered: ";
    print_r((int) $_POST['answer']);
    echo "<br/>";
}

        }
    }
    
?>

<p class="quiz-question" style="font-weight:600"><?= $obj->biletnum->{$c}{'vopros'} ?></p>
<form action="" method="post">
<input type="hidden" name="next_question" value="<?php
?>">
<?php
    
    foreach ($obj->biletnum->{$c}{'varik'} as $key => $value) {
        echo '<input type="radio" name="answer" id="a' . $key . '" value="' . $key . '"><label for="1">' . $obj->biletnum->{$c}{'varik'}->{$key} . '</label><br>';
        if ($key > $max)
            $max = $key;
    }

//Remove this line    
    echo "Здесь ответ / Right answer: ";
    print_r($obj->biletnum->{$c}{'otvet'});
    
?>
<br>         
<?php
    if (($c-1) == $max_q) {
	echo "Тест окончен</br>";
        echo '<input type="submit" name="Results" value="Посмотреть результаты">';
        $_SESSION['result'] = true;
        unset($_SESSION['count']);
        unset($_POST);
    } else
        echo '<input type="Submit" name="Submit" value="Далее">';
    
}
?>
         </form>