<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "staff");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
if(isset($POST['submit'])){
	$name=$_POST['first_name'];
	$name=$_POST['last_name'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];

$to='burningdesire43624362@gmail.com';
$subject='Form Submission';
$message="Name: ".$name."\n"."Address: ".$address."\n". "wrote the following: "."\n\n".$email;  
$headers="From: ".$email;

if(mail($to, $subject, $message, $headers)){
	echo "<h1> Sent Succesfully! Thank you"." ".$name.", we will contact you shortly!</h1>";
}
	else{
		echo"Something Went Wrong!";
	}

}



		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$gender = $_REQUEST['gender'];
		$address = $_REQUEST['address'];
		$email = $_REQUEST['email'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO college VALUES ('$first_name',
			'$last_name','$gender','$address','$email')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Thanks For Contacting Me, Will Shortly Call You</h3>";

			echo nl2br("\n$first_name\n $last_name\n "
				. "$gender\n $address\n $email");
		} else{
			echo "ERROR:Hoo gud bar sarie column pat kar submit! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
