<?php
     
    
	
	$username = $_REQUEST['user'];
    $password = hash('md5', $_REQUEST['pass']);
	
    $incorrect= array('state' => 'False');
	
     
     
    if (isset($username)&&isset($password)){
    $dbc = mysqli_connect('mysql3.000webhost.com', 'a9974977_duell', 'Krr2WHsg', 'a9974977_HSDuell') or die('Error connecting to MySQL server.');
    $query = "SELECT * FROM usersHS WHERE UsernameHS='$username' AND PasswordHS='$password'";
    $result = mysqli_query($dbc, $query) or die('Error connecting to MySQL server.');
	if (mysqli_num_rows($result) == 1) {

   $succed=array ('state' => 'True', 'user' => $username, 'pass'=>$password);
   
   echo $_GET['callback']."(".json_encode($succed).")";
   mysqli_close($dbc);
   
} 

else echo $_GET['callback']."(".json_encode($incorrect).")";
	
}
else {

echo $_GET['callback']."(".json_encode($incorrect).")";}
   
   
	
	
    ?>