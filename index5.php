<?php

//create variable for connection
//$dsn = "mysql:host = localhost; dbname = registrationform";
//$username = "root";
//$password = "";
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "test";

 
//create connection with exceptional handling

try{
	//$conn = new PDO($dsn,"root","");
	$conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);


	//set error mode

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "connection ok! <hr><br>" ;


	//insert data
	if(isset($_REQUEST['submit'])){

		//checking for empty field

		//if(($_REQUEST['name']=="") || ($_REQUEST['surname']=="") ||($_REQUEST['email ']=="") ||($_REQUEST['mobile ']=="") ||($_REQUEST['gender']=="") ){
		if(isset($_POST['name']) =="" ||isset($_POST['surname']) ==""||isset($_POST['email'])==""||isset($_POST['mobile'])==""||isset($_POST['gender'])==""){
			echo "<small >  Fill all field  </small><hr>";
		



		}else{
			$name = $_REQUEST['name'];
			$surname = $_REQUEST['surname'];
			$email = $_REQUEST['email'];
			$mobile = $_REQUEST['mobile'];
			$gender = $_REQUEST['gender'];

			// $name = (isset($_POST['name']) ? $_POST['name'] : '');
             //$surname = (isset($_POST['surname']) ? $_POST['surname'] : '');
            // $email = (isset($_POST['email']) ? $_POST['email'] : '');
             //$mobile = (isset($_POST['mobile']) ? $_POST['mobile'] : '');
             //$gender = (isset($_POST['gender']) ? $_POST['gender'] : '');


			$sql ="INSERT INTO registration(name, surname, email, mobile, gender) VALUES ('$name','$surname','$email','$mobile','$gender')";

			$affected_row = $conn->exec($sql);

			echo $affected_row."Row inserted <br>";

		}
	}
}
catch(PDOException $e){
	echo "connection failed ".$e->getMessage();
}

//var_dump($dsn);    // gives : object(PDO)#1 (0) { }

//$res=$dsn->query('SELECT * FROM test.registration');



?>