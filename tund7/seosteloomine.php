<?php 
 require("../../../config.php");
 require("fnc_common.php");
 require("fnc_user.php");
 $database = "if20_roberta_k_3";
 require("header.php");
 $username = "Roberta Kollo";
?>

<img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
<h1><?php echo $username; ?> programmeerib veebi</h1>
<p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
<p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
	  
<ul>
<li><a href="home.php">Avalehele</a></li>
</ul>
	  
<hr>

<label for="filminput">Film: </label>
<select name="filminput" id="filminput">
	<option value="" selected disabled>Vali film</option>
	<option value="1">1</option> 
	<option value="2">2</option>
	<option value="3">3</option> 
	<option value="4">4</option>
</select>

<label for="genreinput">Žanr: </label>
<select name="genreinput" id="genreinput">
	<option value="" selected disabled>Vali žanr</option>
	<option value="1">üks</option> 
	<option value="2">kaks</option>
	<option value="3">kolm</option> 
	<option value="4">neli</option>
</select>

<input name="submitfilmdata" type="submit" value="Salvesta seos">