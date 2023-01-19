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
            $incidentID = $_REQUEST['incidentID'];

            //Create Comment Variables.
            $result = mysqli_query($conn, "SELECT firstName FROM person WHERE personId='$personID'");
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            $firstName = $row[0];

            $result2 = mysqli_query($conn, "SELECT lastName FROM person WHERE personId='$personID'");
            $row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
            $lastName = $row2[0];
           
            $date = $_REQUEST['date'];
            $comment = "$firstName $lastName was removed from the incident.";
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];


            $sql8 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('$commentID', '$comment', '$firstName', '$date', '$time', '$incidentID')";
            $sql7 = "DELETE FROM person WHERE personID='$personID' AND incidentID='$incidentID'";
            $result7 = $conn->query($sql7);
            $result8 = $conn->query($sql8);


        ?>
        <h2>Remove Successful!</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>