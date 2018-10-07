<?php
	include('config.php');
	session_start();

	$errors = array(); 

	// connect to database
	$db = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

	$category = mysqli_real_escape_string($db, $_POST['category']);
	$student_name = mysqli_real_escape_string($db, $_POST['student-name']);
	$student_email = mysqli_real_escape_string($db, $_POST['student-email']);
	$rollno = mysqli_real_escape_string($db, $_POST['rollno']);
	$student_mobile = mysqli_real_escape_string($db, $_POST['student-mobile']);
	
	$first_name = mysqli_real_escape_string($db, $_POST['first-name']);
	$last_name = mysqli_real_escape_string($db, $_POST['last-name']);
	$relation = mysqli_real_escape_string($db, $_POST['relation']);
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$address = mysqli_real_escape_string($db, $_POST['address']);

	$duration = mysqli_real_escape_string($db, $_POST['duration']);
	$number = mysqli_real_escape_string($db, $_POST['number']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$address2 = mysqli_real_escape_string($db, $_POST['address2']);

	if (empty($student_name)) { array_push($errors, "Student Name is required"); }
	if (empty($student_email)) { array_push($errors, "Student email is required"); }
	if (empty($rollno)) { array_push($errors, "Roll No. is required"); }
	if (empty($student_mobile)) { array_push($errors, "Student mobile is required"); }
	if (empty($first_name)) { array_push($errors, "First Name is required"); }
	if (empty($last_name)) { array_push($errors, "Last Name is required"); }
	if (empty($relation)) { array_push($errors, "Relation is required"); }
	if (empty($mobile)) { array_push($errors, "Mobile is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($address)) { array_push($errors, "Address is required"); }
	if (empty($duration)) { array_push($errors, "Duration is required"); }

	  
	if (count($errors) == 0) {
	  	$query = "INSERT INTO requests (category, st_name, st_email, rollno, st_mobile, first_name, last_name, relation, mobile, email, address, duration, num, phone, address2) VALUES('$category', '$student_name', '$student_email', '$rollno', '$student_mobile', '$first_name', '$last_name', '$relation', '$mobile', '$email', '$address', '$duration', '$number', '$phone', '$address2')";
	  	mysqli_query($db, $query);

	  	$_SESSION['success'] = "Request Successfully Submitted!";
	    //$query2 = "INSERT INTO events (user) VALUES('$username')";
	    //mysqli_query($db, $query2);
	  	header('location: done.html');
	  	echo "<script>window.location = 'done.html';</script>";
	}
?>