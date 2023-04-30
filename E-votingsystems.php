<?php
 
 
 
 $lastname = $_POST['lastname'];
 $idstudent = $_POST['idstudent'];
 $sex = filter_input(INPUT_POST, "sex", FILTER_VALIDATE_INT);

 if ( ! $lastname) {
	 
    die("<script>alert('ENTER THE LAST NAME');</script>");
	 
	}
	
 if ( ! $idstudent) {
    die("<script>alert('ENTER THE ID');</script>");
}  

 if ( ! $sex) {
    die("<script>alert('CHOOSE GENDER');</script>");
 }
 



$host = "localhost";
$dbname = "votingsystems";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
        
    if (mysqli_connect_errno()) {
         die("Connection error: " . mysqli_connect_error());
		 
}           
        
$sql = "INSERT INTO votingform (lastname,idstudent, sex)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
         die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssi",
                       $lastname,
                       $idstudent,
                       $sex);

mysqli_stmt_execute($stmt);

    echo ("<script>alert('Record saved')</script>");
	 header("location: secondvotingpage.html");
	 
	 exit;
	
	
