<?php
session_start();
unset($_SESSION['user']);
header('Location: /miraclepaws');
session_destroy();
?> 