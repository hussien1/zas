<?php

unset($_SESSION['username']);
unset($_SESSION['user_role']);
session_destroy();
header('Location: /zas/index.php');