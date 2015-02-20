<!doctype html>
<!-- Kelvin Gonzales Spring 2015 IAT 352-->
<html lang='en'>

<head>

<title> The Artist Website </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/grid.css">

</head>

<body>

<div class='signup'>
	<a href='signup.html'>Sign up</a>
</div>

<nav>
	<ul>
		<li><a href="../index.html"><b>ConceptuArt</b></a></li>
		<li><a href="search.php" >Artists</a></li>
		<li><a href="searchwork.php">Artwork</a></li>
		<li><a href="about.html">About</a></li>
		</ul>
	</nav>
	
<?php
//Error handling
if($_POST['formSubmit'] == "Submit") 
{
  $errorMessage = "";
 
  if(empty($_POST['username'])) 
  {
    $errorMessage .= "<li>You forgot to enter a username!</li>";
  }
  if(empty($_POST['email'])) 
  {
    $errorMessage .= "<li>You forgot to enter a email!</li>";
  } 
  if(empty($_POST['type'])) 
  {
    $errorMessage .= "<li>You forgot to enter an Art Type!</li>";
  }
 
	//Variables
	$varUsername = $_POST['username'];
	$varEmail = $_POST['email'];
	$varArt = $_POST['type'];
 
	//Check if it was created
  
  if($errorMessage != "") 
{
  echo("<p>There was an error:</p>\n");
  echo("<ul>" . $errorMessage . "</ul>\n");
} 
else
{
	//Write in my main text file to record of all users
  $fs = fopen("mydatabase.csv","a");
  fwrite($fs,$varUsername . ", " . $varEmail . ", " . $varArt ."\n");
  fclose($fs);
  
  //Write its own html page to link
  $handle = fopen("$varUsername.html", "a");
  //content of the html here
    fwrite($handle,
	"
	<!doctype html>
	<html lang='en'>

	<head>
	
	<title> Kelvin's Website </title>
	<link rel='stylesheet' type='text/css' href='../css/main.css'>
	<link rel='stylesheet' type='text/css' href='../css/grid.css'>
	
	</head>

	<body>
	
<div class='signup'>
	<a href='signup.html'>Sign up</a>
</div>

<nav>
	<ul>
		<li><a href='../index.html'><b>ConceptuArt</b></a></li>
		<li><a href='search.php'>Artists</a></li>
		<li><a href='searchwork.php'>Artwork</a></li>
		<li><a href='about.html'>About</a></li>
		</ul>
	</nav>
	
	<div class='grid'><div class='col-1of2'>
	<div class='profilepic'>
	<img src='../images/sampleprofilepic.png' width='250' height='250'>
	</div></div>
	<div class='col-2of2'>
	<div class='udata'>
	<h3>$varUsername</h3>
	<h2>$varEmail<h2>
	<p> Loren Ipsum afnjv adfnob  aewfa ao a aiiasdpo  a awoif iivoio wa adv vppawihf  oiaef ia khhvahsoii qoighvoiav aawefi ha aivha  aihaio  aihv ao oav haoiv  aoivhaova  o avaov a ov aov  av oavhoida  aihvaviowh a oahao</p>
	</div></div>
	
	</body>

	</html>
	"
	);
	fclose($handle);
 
  header("Location: thankyou.html");
  exit;
}
 
}
    
?>

</body>

</html>
