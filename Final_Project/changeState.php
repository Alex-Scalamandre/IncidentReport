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
            $incidentID = $_REQUEST['incidentID'];

            $state;

            if(isset($_POST['open'])){
                $state = "open";
            }elseif(isset($_POST['closed'])){
                $state = "closed";
            }elseif(isset($_POST['stalled'])){
                $state = "stalled";
            }
           
            $date = $_REQUEST['date'];
            $comment = "State of incident was changed to: $state";
            $time = $_REQUEST['time'];
            $commentID = $_REQUEST['commentID'];


            $sql8 = "INSERT INTO comments (commentID, comment, name, date, time, incidentID) VALUES ('', '$comment', '$state', '$date', '$time', '$incidentID')";
            $sql7 = "UPDATE incident SET state='$state' WHERE incidentID='$incidentID'";
            $result7 = $conn->query($sql7);
            $result8 = $conn->query($sql8);


        ?>
        <h2>State Changed Successfully</h2>
	    <br>
	    <a href="index.html" class="buttonSmall">Return Home</a>
    </body>
</html>