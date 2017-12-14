<?php
session_start();
$debug = 1;

if ($_SESSION['result']) {
    echo "Правильных ответов: " . $_SESSION['right'];
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
    if (($cmp == $ans) && (!empty($cmp)) && (!empty($ans))) $_SESSION['right']++; 
if ($debug) {
    echo "Подсчет по предыдущему билету / Previous question data: <br/>";
    echo "Realniy otvet bil / You've answered: ";
    print_r($obj->biletnum->{$c - 1}{'otvet'});
    echo "<br/>Pravilnih / Right answers (in total): ";
    echo $_SESSION['right'];
    echo "<br/>Vvedenniy otvet bil / Right answer is: ";
    print_r((int) $_POST['answer']);
    echo "<br/>";
}

        }
    }
    
?>

<p class="quiz-question" style="font-weight:600"><?= $obj->biletnum->{$c}{'vorpos'} ?></p>
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
    if ($c == $max_q) {
        echo '<input type="submit" name="Results" value="Результаты">';
        $_SESSION['result'] = true;
        unset($_SESSION['count']);
        unset($_POST);
    } else
        echo '<input type="Submit" name="Submit" value="Далее">';
    
}
?>
         </form>