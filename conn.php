<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
if (!@$conn = mysqli_connect($servername, $username, $password, $database)) {
	echo                      '<script type="text/javascript">
                                window.alert("Server is Down");
                              </script>
                              ';
                              exit();
}



?>