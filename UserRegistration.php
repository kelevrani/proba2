<?php
     
    
	
    $username = $_REQUEST['user'];
    $password = $_REQUEST['pass'];
	$email= $_REQUEST['email'];

	
	$doubleuser= array('a' => 'False');
	$succed=array ('a' => 'True');
	
	
	
    
     
     
  

   
    if (isset($username) && isset($password)) {
    $dbc = mysqli_connect('mysql3.000webhost.com', 'a9974977_duell', 'Krr2WHsg', 'a9974977_HSDuell') or die('Error connecting to MySQL server.');
	$query="SELECT * FROM usersHS WHERE UsernameHS='$username'";
	$result=mysqli_query($dbc, $query);
	if (mysqli_num_rows($result)>=1) {echo $_GET['callback']."(".json_encode($doubleuser).")";}
	else {
    $query = "INSERT INTO usersHS (UsernameHS, PasswordHS, MailHS) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($dbc, $query) or die('Error querying databese.');
    mysqli_close($dbc);
	
	echo $_GET['callback']."(".json_encode($succed).")";}}
	else echo'Error';
    ?>	