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
require_once(dirname(__FILE__) . '/../core.php');
($hkzone != true ? header('Location: index.php?throwBack=true') : '');
(!isset($_SESSION['acp']) ? header('Location: index.php?p=login') : '');

$pagename = 'Online Users';

$onlineCutOff = (time() - 601);
$onlineUsers = mysqli_evaluate("SELECT COUNT(*) FROM users WHERE online > {$onlineCutOff}");

require_once(dirname(__FILE__) . '/subheader.php');
require_once(dirname(__FILE__) . '/header.php');
?>
  <table cellpadding="0" cellspacing="8" width="100%" id="tablewrap">
    <tr>
      <td width="22%" valign="top" id="leftblock">
        <div>
          <!-- LEFT CONTEXT SENSITIVE MENU -->
          <?php require_once(dirname(__FILE__) . '/usermenu.php'); ?>
          <!-- / LEFT CONTEXT SENSITIVE MENU -->
        </div>
      </td>
      <td width="78%" valign="top" id="rightblock">
        <div>
          <!-- RIGHT CONTENT BLOCK -->
          <div class="tableborder">
            <div class="tableheaderalt">Online Users (<?php echo $onlineUsers; ?>) [Active in the past 600 seconds]</div>
            <table cellpadding="4" cellspacing="0" width="100%">
              <tr>
                <td class="tablesubheader" width="1%" align="center">ID</td>
                <td class="tablesubheader" width="29%">Name</td>
                <td class="tablesubheader" width="30%" align="center">E-Mail Address</td>
                <td class="tablesubheader" width="20%" align="center">Join date</td>
                <td class="tablesubheader" width="10%" align="center">Last activity</td>
                <td class="tablesubheader" width="10%" align="center">Edit</td>
              </tr>
              <?php
                $get_users = mysqli_query($connection, "SELECT id, name, email, ipaddress_last, hbirth, lastvisit FROM users WHERE online > {$onlineCutOff} ORDER BY online DESC LIMIT {$onlineUsers}") or die(mysqli_error($connection));
                $total = mysqli_num_rows($get_users);

                if($total == 0) {
                  echo '<tr><td class="tablerow1" colspan="6"><center><strong>No users online.</strong></center></td></tr>';
                } else {
                  while($row = mysqli_fetch_assoc($get_users)) {
                    if(empty($row['ipaddress_last'])) { 
                      $row['ipaddress_last'] = 'No IP Found';
                    }
              ?>
                    <tr>
                    <td class="tablerow1" align="center"><?php echo $row['id']; ?></td>
                    <td class="tablerow2"><strong><?php echo $row['name']; ?></strong><div class="desctext"><?php echo $row['ipaddress_last']; ?> [<a href="http://who.is/whois-ip/ip-address/<?php echo $row['ipaddress_last']; ?>/" target="_blank">WHOIS</a>]</div></td>
                    <td class="tablerow2" align="center"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                    <td class="tablerow2" align="center"><?php echo $row['hbirth']; ?></td>
                    <td class="tablerow2" align="center"><?php echo $row['lastvisit']; ?></td>
                    <td class="tablerow2" align="center"><a href="index.php?p=edituser&key=<?php echo $row['id']; ?>"><img src="<?php echo $housekeeping; ?>images/edit.gif" alt="Edit User Data"></a></td>
                    </tr>
              <?php
                  }
                }
              ?>
            </table>
          </div>
        </div>
        <!-- / RIGHT CONTENT BLOCK -->
      </td>
    </tr>
  </table>
</div>
<!-- / OUTERDIV -->
<div align="center">
  <br />
  <?php
    $mtime = explode(' ', microtime());
    $totaltime = $mtime[0] + $mtime[1] - $starttime;
    printf('Time: %.3f', $totaltime);
  ?>
</div>