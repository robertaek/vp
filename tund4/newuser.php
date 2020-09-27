	<?php  //loeme andmebaasi login info muutujad
	  require("../../../config.php");
	  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
	  //$database = "if20_roberta_k_3";
	  //require("fnc_film.php");

	  
	  
	  $username = "Roberta Kollo";
	  
	  require("header.php");
	  
	  
	  $firstnameerror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["firstnameinput"])){
			  $firstnameerror .= "Eesnimi on sisestamata! ";
		  }
	   }
	   
	     $lastnameerror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["lastnameinput"])){
			  $lastnameerror .= "Perekonnanimi on sisestamata! ";
		  }
	   }
	   
	     $gendererror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["genderinput"])){
			  $gendererror .= "Sugu on sisestamata! ";
		  }
	   }
	   
	   
	     $emailerror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["emailinput"])){
			  $emailerror .= "E-posti aadress on sisestamata! ";
		  }
	   }
	   
	       $passworderror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["passwordinput"])){
			  $passworderror .= "Salasõna on sisestamata! ";
		  }
	   }
	   
	       $passwordsecondaryerror="";
	   if(isset($_POST["newusersubmit"])){
		  if(empty($_POST["passwordsecondaryinput"])){
			  $passwordsecondaryerror .= "Salasõna uuesti on sisestamata! ";
		  }
	   }
	   
      		$passwordinputerror="";
	   if(isset($_POST["newusersubmit"])){
		  if(strlen($_POST["passwordinput"]) < 8){
			$passwordinputerror .= "Salasõna liiga lühike! ";
		}
	   }
	  
     $allerrors="";
	 if(isset($_POST["newusersubmit"])){
	   if(empty($_POST["firstnameerror"]) and empty($_POST["lastnameerror"]) and empty($_POST["gendererror"]) and empty($_POST["emailerror"]) and empty($_POST["passworderror"]) and empty($_POST["passwordsecondaryerror"]) and empty($_POST["passwordinputerror"])){
			  $allerrors .= "Kõik vajalik on sisestatud. ";
		  }
	   }
	   
	 
	 
	  ?>
	  
	   <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
	  <h1><?php echo $username; ?> programmeerib veebi</h1>
	  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
	  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
	  
	   <ul>
		<li><a href="home.php">Avalehele</a></li>
	  </ul>
	  
	 <hr>



<form method="POST">
		<label for="firstnameinput">Eesnimi: </label>
		<input type="text" name="firstnameinput" id="firstnameinput" placeholder="Eesnimi" value="<?php echo isset($_POST["firstnameinput"]) ? $_POST["firstnameinput"] : '' ?>"> <span><p><?php echo $firstnameerror; ?></p></span>
		<br>
		<label for="lastnameinput">Perekonnanimi: </label>
		<input type="text" name="lastnameinput" id="lastnameinput" placeholder="Perekonnanimi"value="<?php echo isset($_POST["lastnameinput"]) ? $_POST["lastnameinput"] : '' ?>"><span><p><?php echo $lastnameerror; ?></p></span>
		<br>
		<label for="genderinput">Sugu: </label>
		<input type="radio" name="genderinput" id="gendermale" value="1"<?php if(isset($_POST["genderinput"]) && $_POST["genderinput"] =="1" ){echo "checked";}?>> <label for="gendermale">Mees</label>
		<input type="radio" name="genderinput" id="genderfemale" value="2"<?php if(isset($_POST["genderinput"]) && $_POST["genderinput"] =="2" ){echo "checked";}?>><label for="genderfemale" >Naine</label><span><p><?php echo $gendererror; ?></p></span>
		<br>
		<label for="emailinput">E-posti aadress: </label>
		<input type="email" name="emailinput" id="emailinput" placeholder="E-mail"value="<?php echo isset($_POST["emailinput"]) ? $_POST["emailinput"] : '' ?>"><span><p><?php echo $emailerror; ?></p></span>
		<br>
		<label for="passwordinput">Salasõna: </label>
		<input type="password" name="passwordinput" id="passwordinput" placeholder="Salasõna"><span> <p><?php echo $passworderror; ?></p><p><?php echo $passwordinputerror; ?></p></span>
		<br>
		<label for="passwordsecondaryinput">Salasõna uuesti: </label>
		<input type="password" name="passwordsecondaryinput" id="passwordsecondaryinput" placeholder="Salasõna uuesti"><span> <p><?php echo $passwordsecondaryerror; ?></p></span>
		<br>
		<input type="submit" name="newusersubmit" value="Salvesta uus kasutaja">
	 </form>
	 
	 <p><?php echo $allerrors; ?></p>
	
	 
	 
	
	