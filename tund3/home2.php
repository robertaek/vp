<?php


  $username = "Roberta Kollo";
  setlocale(LC_TIME, 'et_ET');
  $fulltimenow = date("d. F Y H:i:s");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  
  
  //vaatame, mida vormist serverile saadetakse
  var_dump($_POST);
  
  $weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
 
  //küsime nädalapäeva
  $weekdaynow = date("N");
  //echo $weekdaynow;
  
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
  $semesterdurationdays = $semesterduration->format("%r%a");
  $today = new DateTime("now");
  $fromsemesterstart = $semesterstart->diff($today); 
  //saime aja erinevuse objektina, seda niisama nÃ¤idata ei saa
  $fromsemesterstartdays = $fromsemesterstart->format("%r%a");
  $semesterpercentage = 0;
  
$semesterinfo = "Semester kulgeb vastavalt akadeemilisele kalendrile.";
  if($semesterstart > $today){
	  $semesterinfo = "Semester pole veel alanud!";
  }
  if($fromsemesterstartdays === 0){
	  $semesterinfo = "Semester algab täna!";
  }
  if($fromsemesterstartdays > 0 and $fromsemesterstartdays < $semesterdurationdays){
	  $semesterpercentage = ($fromsemesterstartdays / $semesterdurationdays) * 100;
	  $semesterinfo = "Semester on käimas, kestab juba " .$fromsemesterstartdays ." päeva, läbitud on " .$semesterpercentage ."%.";
  }
  if($fromsemesterstartdays == $semesterdurationdays){
	  $semesterinfo = "Semester lõppeb täna!";
  }
  if($fromsemesterstartdays > $semesterdurationdays){
	  $semesterinfo = "Semester on läbi saanud!";
  }
  
  
  // loen kataloogist piltide nimekirja
  //$allfiles = scandir("../vp_pics/");
  $allfiles = array_slice(scandir("../vp_pics/"), 2);
  // echo $allfiles; //massiivi nii näidata ei saa!!!
  // var_dump($allfiles);
  // $allpicfiles = array_slice($allfiles, 2);
  // var_dump($allpicfiles);
  $allpicfiles = [];
  $picfiletypes = ["image/jpeg", "image/png"];
  //käin kogu massiivi läbi ja kontrollin iga üksikut elementi, kas on sobiv fail ehk pilti
  foreach ($allfiles as $file){
	  $fileinfo = getImagesize("../vp_pics/" .$file);
	  if(in_array($fileinfo["mime"], $picfiletypes) == true){
		  array_push($allpicfiles, $file);
	  }
  }
  
  //paneme kõik pildid järjest ekraanile
  //uurime, mitu pilti on ehk mitu faili on nimekirjas - massiivis
  $piccount = count($allpicfiles);
  //echo $piccount;
  //$i = $i + 1;
  //$i += ;
  //$i ++; i-le liidetakse üks otsa, lühem variant
  $imghtml = "";
  $picnum = mt_rand(0, ($piccount - 1));
  for($i = 0; $i < $piccount; $i ++){
	  //<img src="../img/vp_banner.png" alt="alt tekst">
	  $imghtml .= '<img src="../vp_pics/' .$allpicfiles[$picnum]  .'" ';
	  //$imghtml .= 'alt="Tallinna Ülikool">';
	  
  }
 
  require("header.php");
  ?>
  

  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1><?php echo $username; ?> programmeerib veebi</h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  <p>Lehe avamise aeg: <?php echo $weekdaynameset[$weekdaynow - 1] .", " .$fulltimenow; ?>. 
  <?php echo "Parajasti on " .$partofday ."."; ?></p>
  <p><?php echo $semesterinfo; ?></p>
  <hr>
  <?php echo $imghtml; ?> <hr> <br>
 

 <a href="sisestamote.php">Vajuta siia, et sisestada oma mõttetu mõte</a> <br>
 <a href="motted.php">Vajuta siia, et vaadata sisestatud mõtteid</a>

</body>
</html>