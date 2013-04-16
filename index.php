<?php
$conn = mysqli_connect("localhost","root","","myblog");

if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to database: " . mysqli_connect_error();  
}

$result = mysqli_query($conn, "SELECT * FROM users");

while ($row = mysqli_fetch_array($result)) {
    echo "Email = " . $row['Email'];
    echo "<br/>";
}

mysqli_close($conn);
?>