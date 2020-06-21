<?php
// au lieu de crée des variable puisque on va pas changé user name ou database... il suffit de les declare directement dans $con ()
session_start();
// mysqli_connect — Alias of mysqli::__construct() *******Ouvre une nouvelle connexion au serveur MySQL
$con=mysqli_connect('localhost','root','','leave_management_system');
?>