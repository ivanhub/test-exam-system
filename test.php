
<?php      

$i = 1;
$start_otvety = 0;  

$fp=fopen('1.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);
    //process line however you like
    $line=trim($line);

    if ($line == "ОТВЕТЫ") $start_otvety = 1;  
    if ($start_otvety == 1 ) {

    preg_match('/^[\d.]+/', $line, $otvety);
    preg_match('/(\d+)(?!.*\d)/', $line, $res);
    $realotvety->biletnum->{$otvety[0]}=$res[0];
}
}


$fp=fopen('1.txt', 'r');
while (!feof($fp))
{
    $line=fgets($fp);
    $line=trim($line);

    if ($line == "ОТВЕТЫ") $line = "";

    $ifnum = preg_match('/^\d*[\.]/', $line, $there);
    if(1 === $ifnum){    
    $obj->biletnum->$i{'vorpos'}=$line; 
    $realnum = str_replace(".", "", $whichnum);
    $obj->biletnum->$i{'vorpos'}=$line; 
    $obj->biletnum->$i{'otvet'}=$realotvety->biletnum->{$i};
    $i++; $j=1;
    }
    if(1 === preg_match('/^\d[\)]/', $line)){  
    $obj->biletnum->{$i-1}{'varik'}->$j=$line; 

    if ($j == $obj->biletnum->{$i-1}{'otvet'}) {
    $obj->biletnum->{$i-1}{'varik'}->$j=$line; 
    $line = "+".$line."\n"; 
    } else     $line = "-".$line."\n"; 
    $j++;
}

    //add to array
    $lines[]=$line;
}

fclose($fp);
?>
