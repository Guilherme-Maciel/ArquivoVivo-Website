<?php
//Encerra a sessão
session_start();
session_destroy();
header("location: ../View/index.php"); 
