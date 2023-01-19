<!--Contributors-->
<!--Alex Scalamandre-->

<!DOCTYPE html>
<html>

<head>
    <title>Make a Report</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php
        // log in info
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "final_project";
		
		// log in
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// attempt connect
		if($conn->connect_error) {
			die("<p style='color:red'>" . "Connection failed: " . $conn->connect_error . "</p>");
		}
		
		// Get variables from form.
		$responderName = $_REQUEST['firstName'];
		$personID = $_REQUEST['personID'];
		$firstName = $_REQUEST['firstName'];
		$lastName = $_REQUEST['lastName'];
		$emailAddress = $_REQUEST['emailAddress'];
		$jobTitle = $_REQUEST['jobTitle'];
		$association = $_REQUEST['association'];
		$ipAddress = $_REQUEST['ipAddress'];
		$incidentID = $_REQUEST['incidentID'];
		$type = $_REQUEST['type'];
		$date = $_REQUEST['date'];
		$comment = $_REQUEST['comment'];
		$time = $_REQUEST['time'];
		$state;

		if(isset($_POST['open'])){
			$state = "open";
		}elseif(isset($_POST['closed'])){
			$state = "closed";
		}elseif(isset($_POST['stalled'])){
			$state = "stalled";
		}

		$sql = "INSERT INTO incident (incidentID, association, type, state, date, ipAddress) VALUES ('$incidentID', '$association', '$type', '$state', '$date', '$ipAddress')";
		$sql2 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$incidentID', '$comment', '$responderName', '$date', '$time', '$incidentID')";
		$sql3 = "INSERT INTO person (personID, firstName, lastName, emailAddress, jobTitle, incidentID) VALUES ('$personID', '$firstName', '$lastName', '$emailAddress', '$jobTitle', '$incidentID')";
		$sql4 = "INSERT INTO ip (IPAddress, incidentID) VALUES ('$ipAddress', '$incidentID')";
		$sql5 = "DELETE FROM ip WHERE IPAddress=0";

		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		$result3 = $conn->query($sql3);
		$result4 = $conn->query($sql4);
		$result5 = $conn->query($sql5);
    ?>
	<h2>Add Successful!</h2>
	<br>
	<a href="index.html" class="buttonSmall">Return Home</a>
</body>
</html>