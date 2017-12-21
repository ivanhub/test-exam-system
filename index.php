<?php
//session_start();
//Getting object from file-test
//require_once('test.php');

//global $max_q;
//How many questions are there
//foreach($obj->biletnum as $key=>$value) if($key > $max_q) $max_q = $key; 
?>
<!DOCTYPE html>
<html>
<head>
<title>Тест система</title>

	<style type="text/css">
	  table.bordered tr th {
	      border-bottom: 1px solid #000;
	      font-weight: normal;
	  }
	  
	  .info {
	      font-size:10pt;
	  }
pre {
    font-family: Times New Roman;
    font-size: 16pt;
}
#idsel2, #idsel3, #idsel4, #idsel5, #idsel6, #idsel7 {
    display:none;
}
span {
	font-size: 16pt;
}


form#submit_answers {
    text-align: center;
    width: 50%;
    display: grid;
    margin-left: auto;
    margin-right: auto;
    margin-top:10%;
}

input[type="submit"] {display:flex; justify-content: center; justify-self: center;}

	</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<!--<p class="quiz-header"> Тест </p>-->


    <FORM ACTION ="exam.php" NAME =  "write_question_form" id ="submit_answers" METHOD ="POST">
  
<table width="100%" cellpadding="5">
<tr>
<td style="width: 350px;">

    <p>Введите ФИО: <br>
      <input type="text" name="fio" size="25">
      <br>
    </p>
</td>
<td >
  <i>Укажите свое фамилию имя и отчество </i>
</td>
</tr>


<tr>
<td style="width: 350px;">
    <p>Организация: <br>
      <input type="text" name="orgname" size="25">
      <br>
    </p>
</td>
<td >
  <i>Укажите название организации </i>
</td>
</tr>

<tr>
<td style="width: 350px;">
   <p>Должность: <br>
      <input type="text" name="occupation" size="25">
      <br>
    </p>
</td>
<td >
  <i>Укажите свою должность </i>
</td>
</tr>



<tr>
<td style="width: 350px;">
    <p>Курс: <br/>
     <select name="coursename" onchange="sel_p()" id="idsel1" style="width:195px;height:22px">
	<option selected value=""></option>
	<option value="ВИК">ВИК</option>
	<option value="МК">МК</option>
	<option value="ПВК">ПВК</option>
	<option value="УЗК">УЗК</option>
	<option value="ПВТ">ПВТ</option>
	<option value="РК">РК</option>
      </select>

      <br>
    </p>
</td>
<td>
  <i>Выберите курс</i>
</td>
</tr>


<tr id="idsel2" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course1" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">ВИК 6.4</option>
	<option value="6.5">ВИК 6.5</option>
	<option value="6.6">ВИК 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>
<tr id="idsel3" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course2" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">МК 6.4</option>
	<option value="6.5">МК 6.5</option>
	<option value="6.6">МК 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>

<tr id="idsel4" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course3" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">ПВК 6.4</option>
	<option value="6.5">ПВК 6.5</option>
	<option value="6.6">ПВК 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>

<tr id="idsel5" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course4" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">УЗК 6.4</option>
	<option value="6.5">УЗК 6.5</option>
	<option value="6.6">УЗК 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>


<tr id="idsel6" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course5" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">ПВТ 6.4</option>
	<option value="6.5">ПВТ 6.5</option>
	<option value="6.6">ПВТ 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>

<tr id="idsel7" class="course_selection">
<td style="width: 450px;" >
    <p>Выбрать раздел: 
     <select name="course6" class="allcourses">
	<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	</option>
	<option value="6.4">РК 6.4</option>
	<option value="6.5">РК 6.5</option>
	<option value="6.6">РК 6.6</option>
      </select>
      <br>
    </p>
</td>
</tr>







</table>
<br>
    <input style="width: 150px; height: 60px; font-size: 16pt;" type="submit" name="generate" value="Начать тест">
      
    </FORM>



<script>

function hide(what) {
[].forEach.call(document.querySelectorAll('.course_selection'), function (el) {
  el.style.display = 'none';

});

[].forEach.call(document.querySelectorAll('.allcourses'), function (el) {
  el.selectedIndex = 0;
});

document.getElementById(what).style.display = "block";
}


function sel_p() {
/*    var which = document.getElementById("idsel1").value;
    switch(which) {
	case 'vik': 	hide("idsel2");
	break;
	case 'mk': 	hide("idsel3");
	break;
	case 'pvk': 	hide("idsel4");
	break;
	case 'uzk': 	hide("idsel5");
	break;
	case 'pvt': 	hide("idsel6");
	break;
	case 'rk': 	hide("idsel7");
	break;
		  }
*/
}

sel_p();
</script>

</body>
</html>

