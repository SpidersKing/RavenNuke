<?php

/********************************************************************/
/* NukeSentinel™                                                    */
/* By: NukeScripts(tm) (https://www.nukescripts.coders.exchange)    */
/* Copyright © 2000-2023 by NukeScripts™                            */
/* See CREDITS.txt for ALL contributors                             */
/********************************************************************/

if(!defined('NUKESENTINEL_ADMIN')) { header("Location: ../../../".$admin_file.".php"); }
$pagetitle = _AB_NUKESENTINEL.": "._AB_CLEARIP;
include("header.php");
OpenTable();
OpenMenu(_AB_CLEARIP);
mastermenu();
CarryMenu();
blockedipmenu();
CloseMenu();
CloseTable();
echo '<br />'."\n";
OpenTable();
echo '<form action="'.$admin_file.'.php" method="post">'."\n";
echo '<input type="hidden" name="op" value="ABBlockedIPClearSave" />'."\n";
echo '<table summary="" border="0" cellpadding="2" cellspacing="2" width="100%">'."\n";
echo '<tr><td align="center" class="content">'._AB_CLEARIPS.'<br />'."\n";
echo '<input type="submit" value="'._AB_CLEARIP.'" /></td></tr>'."\n";
echo '</table>'."\n";
echo '</form>'."\n";
CloseTable();
include("footer.php");

?>