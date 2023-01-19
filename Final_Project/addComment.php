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
		    $responderName = $_REQUEST['responderName'];
            $incidentID = $_REQUEST['incidentID'];            
            $date = $_REQUEST['date'];
            $comment = $_REQUEST['comment'];
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];

            $sql6 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$commentID', '$comment', '$responderName', '$date', '$time', '$incidentID')";

            $result6 = $conn->query($sql6);
        ?>
        <h2>Add Successful!</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>