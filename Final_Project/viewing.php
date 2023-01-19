<!-- Contributors: -->
<!-- Alex Scalamandre -->
<!-- Christopher Blazak -->

<!doctype HTML>
<html>
    <head>
        <title>Incident Viewing</title>
        <!--Insert Styles-->
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
		//echo "MySQL DB Connected successfully...<br>";
		
		// get variables from form
		$incidentID = $_REQUEST['incidentID'];
		
		// get data from database
		$sql = "SELECT * FROM incident WHERE incidentID='$incidentID'";

		// attempt to send query
		$result = $conn->query($sql);
		
		echo "<h1>Incident Viewing</h1>";
			
		echo "Viewing results for ID:" . $incidentID . "<br>"; //doesn't show ID when there are no rows
			if($result->num_rows > 0){
			//Output table
			echo '<table class="table">
					<tr>
						<th class="th">Incident ID</th>
						<th class="th">Association</th>
						<th class="th">Type</th>
						<th class="th">State</th>
						<th class="th">Date</th>
						<th class="th">IP Address</th>
					</tr>';
			//Output data of rows.
				while($row = $result->fetch_assoc()){
					echo "<tr>
							<td class = td>" . $row["incidentID"] . "</td>
							<td class = td>" . $row["association"] . "</td>
							<td class = td>" . $row["type"] . "</td>
							<td class = td>" . $row["state"] . "</td>
							<td class = td>" . $row["date"] . "</td>
							<td class = td>" . $row["ipAddress"] . "</td>
						</tr>" ;
				}
			echo "</table>";
			
			// people
			echo "<h2>Associated People</h2>";
			
			// get data from database
			$sql = "SELECT * FROM person WHERE incidentID='$incidentID'";
			
			// attempt to send query
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
			//Output table
			echo '<table class="table">
					<tr>
						<th class="th">Person ID</th>
						<th class="th">First Name</th>
						<th class="th">Last Name</th>
						<th class="th">Email</th>
						<th class="th">Job</th>
					</tr>';
			//Output data of rows.
				while($row = $result->fetch_assoc()){
					echo "<tr>
							<td class = td>" . $row["personID"] . "</td>
							<td class = td>" . $row["firstName"] . "</td>
							<td class = td>" . $row["lastName"] . "</td>
							<td class = td>" . $row["emailAddress"] . "</td>
							<td class = td>" . $row["jobTitle"] . "</td>
						</tr>" ;
				}
			echo "</table>";
			} else {
				echo "No associated people.<br>";
			}
			
			// ips
			echo "<h2>Associated IP Addresses</h2>";
			
			// get data from database
			$sql = "SELECT * FROM ip WHERE incidentID='$incidentID'";
			
			// attempt to send query
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
			//Output table
				echo '<table class="table">
						<tr>
							<th class="th">IP Address</th>
						</tr>';
				//Output data of rows.
					while($row = $result->fetch_assoc()){
						echo "<tr>
								<td class = td>" . $row["IPAddress"] . "</td>
							</tr>" ;
					}
			echo "</table>";
			} else {
				echo "No associated IPs.<br>";
			}
			
			// comments
			echo "<h2>Associated Comments</h2>";
			
			// get data from database
			$sql = "SELECT * FROM comments WHERE incidentID='$incidentID' ORDER BY time DESC, date DESC";
			
			// attempt to send query
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
			//Output table
			echo '<table class="table">
					<tr>
						<th class="th">Comment ID</th>
						<th class="th">Comment</th>
						<th class="th">Name</th>
						<th class="th">Date</th>
						<th class="th">Time</th>
					</tr>';
			//Output data of rows.
				while($row = $result->fetch_assoc()){
					echo "<tr>
							<td class = td>" . $row["commentID"] . "</td>
							<td class = td>" . $row["comment"] . "</td>
							<td class = td>" . $row["name"] . "</td>
							<td class = td>" . $row["date"] . "</td>
							<td class = td>" . $row["time"] . "</td>
						</tr>" ;
				}
			echo "</table>";
			} else {
				echo "No associated comments.<br>";
			}
			
			} else {
				echo "No results<br>";
			}
		?>
		
		<?php
		// close connection
		$conn->close();
		//echo "DB disconnected.";
		?>
		<br>
		<a href="./view.html" class="buttonSmall">Back</a>
	</body>
</html>