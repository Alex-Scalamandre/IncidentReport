<!--Contributors-->
<!--Alex Scalamandre-->

<!DOCTYPE html>
<html>
    <head>
        <title>PHP for Add Person</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "final_project";

            //Create Connection.
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            //Check Connection
            if($conn->connect_error){
                die("<p style='color:red'>" . "Connection failed: " . "</p>");
            }

            //Get Variables.
            $personID = $_REQUEST['personID'];
		    $firstName = $_REQUEST['firstName'];
		    $lastName = $_REQUEST['lastName'];
		    $emailAddress = $_REQUEST['emailAddress'];
		    $jobTitle = $_REQUEST['jobTitle'];
            $incidentID = $_REQUEST['incidentID'];

            //Create Comment Variables.
            $responderName = $_REQUEST['firstName'];
            $date = $_REQUEST['date'];
            $comment = "$firstName $lastName was added to the incident.";
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];

            $sql5 = "INSERT INTO person (personID, firstName, lastName, emailAddress, jobTitle, incidentID) VALUES ('$personID', '$firstName', '$lastName', '$emailAddress', '$jobTitle', '$incidentID')";
            $sql6 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$commentID', '$comment', '$responderName', '$date', '$time', '$incidentID')";

            $result5 = $conn->query($sql5);
            $result6 = $conn->query($sql6);
        ?>
        <h2>Add Successful!</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>