<!--Contributors-->
<!--Alex Scalamandre-->

<!DOCTYPE html>
<html>
    <head>
        <title>Clear Page</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body class="center" style="text-align: center;">
        <p class="center">
            <h1>Would you like to clear all incidents?</h1>
        </p>
        <br>

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


            $url = "index.html";
            $url2 = "deleteSuccess.html";

            if(isset($_POST['button1'])){
                mysqli_query($conn, "TRUNCATE TABLE incident");
                mysqli_query($conn, "TRUNCATE TABLE comments");
                mysqli_query($conn, "TRUNCATE TABLE person");
                mysqli_query($conn, "TRUNCATE TABLE ip");
                header("Location: $url2");
            }

            if(isset($_POST['button2'])){
                header("Location: $url");
            }
        ?>

        <fieldset>
            <div>
                <form method="post">
                    <input type="submit" name="button1"
                            value="Delete Incidents"/>
                    &emsp;
                    <input type="submit" name="button2"
                            value="Back to Home"/>
                </form>
            </div>
        </fieldset>
    </body>
</html>