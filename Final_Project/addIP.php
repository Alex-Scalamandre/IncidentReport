<!--Contributors-->
<!--Alex Scalamandre-->

<!DOCTYPE html>
<html>
    <head>
        <title>PHP for Add IP</title>
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
            $ipAddress = $_REQUEST['ipAddress'];
            $incidentID = $_REQUEST['incidentID'];

            //Create Comment Variables.
            $date = $_REQUEST['date'];
            $comment = "IP Address: $ipAddress was added to the incident.";
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];

            $sql5 = "INSERT INTO ip (IPAddress, incidentID) VALUES ('$ipAddress', '$incidentID')"; 
            $sql6 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$commentID', '$comment', '$ipAddress', '$date', '$time', '$incidentID')";

            $result5 = $conn->query($sql5);
            $result6 = $conn->query($sql6);
        ?>
        <h2>Add Successful!</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>