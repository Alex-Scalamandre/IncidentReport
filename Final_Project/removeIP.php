<!--Contributors-->
<!--Alex Scalamandre-->

<!DOCTYPE html>
<html>
    <head>
        <title>PHP for Remove IP</title>
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
           
            $date = $_REQUEST['date'];
            $comment = "$ipAddress was removed from the incident.";
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];


            $sql8 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$commentID', '$comment', '$ipAddress', '$date', '$time', '$incidentID')";
            $sql7 = "DELETE FROM ip WHERE ipAddress='$ipAddress' AND incidentID='$incidentID'";
            $result7 = $conn->query($sql7);
            $result8 = $conn->query($sql8);


        ?>
        <h2>Remove Successful!</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>