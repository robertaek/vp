<?php
  $username = "Roberta Kollo";
  $fulltimenow = date("d.m.Y H:i:s");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  if($hournow < 6){
	$partofday = "uneaeg";  
  }
  if($hournow >= 6 and $hournow < 8) {
	  $partofday = "hommikuste protseduuride aeg";
  }
  if($hournow >= 8 and $hournow < 18) {
	  $partofday = "õppimise aeg";
  }
  if($hournow >= 18 and $hournow < 21) {
	  $partofday = "puhkamise aeg";
  }
  if($hournow >= 21 and $hournow < 23) {
	  $partofday = "õhtuste protseduuride aeg";
  }
  
  //jälgime semestri kulgu
  $semesterstart = new DateTime("2020-8-31");
  $semesterend = new DateTime("2020-12-13");
  $customDate = new DateTime("2020-12-31"); //kui tahan kontrollida suva kp, siis panen selle today asemele
  $semesterduration = $semesterstart->diff($semesterend);
  $today = new DateTime("now");
  $fromsemesterstart = $semesterstart->diff($today); //saime aja erinevuse objektina, seda niisama nÃ¤idata ei saa
  $fromsemesterstartdays = $fromsemesterstart->format("%r%a");
  
  if($semesterstart > $today) {
	  $fromsemesterstartdays = ". Semester ei ole veel alanud";
	  $customText = $fromsemesterstartdays;
  }
  
  else if($semesterend < $today) {
	  $fromsemesterstartdays = ". Semester on juba lÃµppenud";
	  $customText = $fromsemesterstartdays;
  }
  
  else
  {
	  $customText = ", semestri algusest on mÃ¶Ã¶dunud " .$fromsemesterstartdays ." pÃ¤eva";
  }
  
  //semestri %
  $customstart = strtotime("2020-8-31");
  $customend = strtotime("2020-12-13");
  
  $semesterpercent = ($fromsemesterstartdays / $semesterduration) * 100;
  
?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>Veebileht</title>

</head>
<body>
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bÃ¤nner">
  <h1><?php echo $username; ?> programmeerib veebi</h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>Lehe avamise aeg: <?php echo $fulltimenow . $customText; ?>. 
  <?php echo "Parajasti on " .$partofday ."."; ?> <?php echo "Semestrist on lÃ¤bitud " .$semesterpercent ."%."; ?> </p>
</body>
</html>
