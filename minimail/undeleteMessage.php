<?php
/*===================================================+
|| # HoloCMS - Website and Content Management System
|+===================================================+
|| # Copyright © 2016 Miguel González Aravena. All rights reserved.
|| # https://github.com/MiguelGonzalezAravena/HoloCMS
|+===================================================+
|| # HoloCMS is provided "as is" and comes without
|| # warrenty of any kind. HoloCMS is free software!
|+===================================================*/
require_once(dirname(__FILE__) . '/../core.php');
require_once(dirname(__FILE__) . '/../includes/session.php');

$id = isset($_POST['messageId']) ? (int) $_POST['messageId'] : 0;
$start = isset($_POST['start']) ? (int) $_POST['start'] : 0;
$label = isset($_POST['label']) ? FilterText($_POST['label']) : '';
mysqli_query($connection, "UPDATE cms_minimail SET deleted = '0' WHERE id = '{$id}'");
$bypass = true;
$page = 'inbox';
$message = 'Message undeleted.';
require_once(dirname(__FILE__) . '/loadMessage.php');
?>