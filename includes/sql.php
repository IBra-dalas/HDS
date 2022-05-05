<?php
    session_start();
    global $bdd;
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=helpdesk;charset=utf8', 'root', '');
        $bdd->exec('SET NAMES utf8');
    }
    catch(Exception $e)
    {
        die('Erreur '.$e->getMessage());
    }
?>