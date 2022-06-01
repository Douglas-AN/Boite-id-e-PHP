<?php
session_start();
session_destroy(); 

setcookie('pseudo', '', -1, '/', '', true, true);
setcookie('mdp', '', -1, '/', '', true, true);

//header("Location: auth.php");
header("Location: home.php");