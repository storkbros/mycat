<?php
$sql = "SELECT * FROM users WHERE name='".$_SESSION['login_user']."'; ";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
