<?php
$page_no_redirection = '1';
include ('includes/header.php');

if($_SESSION['login'] == TRUE && $_SESSION['role'] == 1){
    include ('tableau_ticket.php');
}

include ('includes/footer.php');
?>