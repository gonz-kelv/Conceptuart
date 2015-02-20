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

$userDatabase = 'mydatabase.csv';

//check if file exists
if(file_exists($userDatabase))
{
//Read created csv file from user sign up
$CSVfp = fopen("mydatabase.csv", "r");

	if($CSVfp !== FALSE) 
	{

		echo "<div class='grid'><div class='col-1of1'>";
		echo "<h2>Artwork</h2>";
		while(! feof($CSVfp)) 
		{
	
			$data = fgetcsv($CSVfp, 1000, ","); 
			$udatalink = $data[0];
			if( $data == ""){
			//first data was blank so this clears it
			}
			else{
			//use the string to link to the webpage
			echo "<div class='grid'><div class='layout1'><a href='$udatalink.html'>$data[2]</a></div>";
			echo "<div class='layout2'><a href='$udatalink.html'>$udatalink</a></div></div>"; 
			}
		}

		echo "<br /> </div></div>"; 
	
		fclose($CSVfp);
	}


}

//if it doesnt respond with error message
else
{
	echo "<div class='grid'><div class='col-1of1'><h3> No Users Registered </h3></div></div>";
}

?>

</body>

</html>