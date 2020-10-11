 <?php  
  session_start();
  
  //kui pole sisseloginud
  if(!isset($_SESSION["userid"])){
	  //jõuga sisselogimise lehele
	  header("Location: page.php");
  }
  
  //VÄLJALOGIMINE
  if(isset($_GET["logout"])){
	  session_destroy();
	  header("Location: page.php");
	  exit();
	  
  }

 
 //loeme andmebaasi login info muutujad
  require("../../../config.php");
  //kui kasutaja on vormis andmeid saatnud, siis salvestame andmebaasi
  $database = "if20_roberta_k_3";
  

   //loeme andmebaasist
  $nonsenshtml = "";
  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
  //valmistame ette SQL käsu
  $stmt = $conn->prepare("SELECT nonsensidea FROM nonsens");
  echo $conn->error;
  //seome tulemuse mingi muutujaga
  $stmt->bind_result($nonsensfromdb);
  $stmt->execute();
  //võtan, kuni on
  while($stmt->fetch()){
	  //<p>suvaline mõte </p>
	  $nonsenshtml .= "<p>" .$nonsensfromdb ."</p>";
  }
  $stmt->close();
  $conn->close();
  //ongi andmebaasist loetud
  
  //$username = "Roberta Kollo";
  
  require("header.php");
  ?>
  
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
   <h1><?php echo $_SESSION["userfirstname"] ." " .$_SESSION["userlastname"]; ?> programmeerib veebi</h1>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
    
  <ul>
	<li><a href="home.php">Avalehele</a></li>
	<li><a href="?logout=1">Logi välja</a>!</li>
  </ul>
  
  <hr>
  <?php echo $nonsenshtml; ?>  
  <hr>
  
  </body>
  </html>
  
  