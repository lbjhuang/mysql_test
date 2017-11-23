<?php
session_start();
echo $_SESSION['username']."<br>";
echo "Session ID：".session_id()."<br>";