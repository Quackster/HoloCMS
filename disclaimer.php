<?php
/*===================================================+
|| # HoloCMS - Website and Content Management System
|+===================================================+
|| # Copyright © 2016 Miguel González Aravena. All rights reserved.
|| # https://github.com/MiguelGonzalezAravena/HoloCMS
|+===================================================+
|| # HoloCMS is provided 'as is" and comes without
|| # warrenty of any kind. HoloCMS is free software!
|+===================================================*/
require_once(dirname(__FILE__) . '/core.php');
require_once(dirname(__FILE__) . '/locale/' . $language . '/login.php');
require_once(dirname(__FILE__) . '/locale/' . $language . '/policies.php');
require_once(dirname(__FILE__) . '/templates/login/subheader.php');
require_once(dirname(__FILE__) . '/templates/login/header.php');
?>
  <div id="process-content">
    <div id="terms" class="box-content">
      <div class="tos-header"><b><?php echo $locale['terms_of_service_title']; ?></b></div>
      <div class="tos-item">
        <?php echo $locale['terms_of_service']; ?>
      </div>
    </div>
<?php require_once(dirname(__FILE__) . '/templates/login/footer.php'); ?>