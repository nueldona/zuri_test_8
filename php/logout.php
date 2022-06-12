<?php
session_start();
if (isset($_SESSION['username'])) {
    logout();
}
function logout()
{
    session_unset();
    header('Location: /forms/login.html');
}


echo "HANDLE THIS PAGE";
