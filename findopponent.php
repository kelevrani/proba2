<?php

	$username = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

       $empty= array('gegner1' => 'Empty');
	   $wait =array ('gegner1' => 'Wait');


    $dbc = mysqli_connect('mysql3.000webhost.com', 'a9974977_duell', 'Krr2WHsg', 'a9974977_HSDuell') or die('Error connecting to MySQL server.');
	
	$query="SELECT * FROM usersHS WHERE UsernameHS='$username' AND PasswordHS='$password'";
	$result=mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)==1) {
	
	$query="SELECT * FROM opponentHS WHERE gegner1!='' AND gegner2='' ORDER BY rand() LIMIT 1";
	$result=mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)==1) {
		$row = mysqli_fetch_array($result);
		$gegner=$row['gegner1'];
		if ($username!=$gegner){
		$query="UPDATE opponentHS SET gegner2='$username' WHERE gegner1='$gegner'";
		$result=mysqli_query($dbc, $query);
                echo $_GET['callback']."(".json_encode($row).")";}
		else    echo $_GET['callback']."(".json_encode($wait).")";
	}
	
	else {
	$query="INSERT INTO opponentHS (gegner1) VALUES ('$username')";
	$result=mysqli_query($dbc, $query);
	echo $_GET['callback']."(".json_encode($empty).")";
	
	
	}}
	
	else echo 'Error connecting to MySQL server.';
	
	mysqli_close($dbc);




?>			