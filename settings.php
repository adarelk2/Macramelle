<?php
$mysqli = new mysqli("127.0.0.1", "adarelk2", "VgLfA6.o3UQ}", "macrame");
/* check connection */
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
