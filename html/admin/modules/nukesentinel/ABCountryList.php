<?php

/********************************************************************/
/* NukeSentinel™                                                    */
/* By: NukeScripts(tm) (https://www.nukescripts.coders.exchange)    */
/* Copyright © 2000-2023 by NukeScripts™                            */
/* See CREDITS.txt for ALL contributors                             */
/********************************************************************/

if(!defined('NUKESENTINEL_ADMIN')) { header("Location: ../../../".$admin_file.".php"); }
$pagetitle = _AB_NUKESENTINEL.": "._AB_COUNTRYLISTING;
include("header.php");
OpenTable();
OpenMenu(_AB_COUNTRYLISTING);
mastermenu();
CarryMenu();
blankmenu();
CloseMenu();
CloseTable();
echo '<br />'."\n";
OpenTable();
$perpage = $ab_config['block_perpage'];
if($perpage == 0) { $perpage = 25; }
if(!isset($min)) $min=0;
if(!isset($max)) $max=$min+$perpage;
if(!isset($column) or !$column or $column=="") $column = "country";
if(!isset($direction) or !$direction or $direction=="") $direction = "asc";
$totalselected = $db->sql_numrows($db->sql_query("SELECT * FROM `".$prefix."_nsnst_countries`"));
if($totalselected > 0) {
  $selcolumn1=$selcolumn2='';
  $seldirection1=$seldirection2='';
  // Page Sorting
  echo '<table summary="" align="center" border="0" cellpadding="2" cellspacing="2" width="100%">'."\n";
  echo '<tr><td align="right" nowrap="nowrap">'."\n";
  echo '<form action="'.$admin_file.'.php?op=ABCountryList" method="post" style="padding: 0px; margin: 0px;">'."\n";
  echo '<input type="hidden" name="min" value="'.$min.'" />'."\n";
  echo '<strong>'._AB_SORT.':</strong> <select name="column">'."\n";
  if($column == "c2c") $selcolumn1 = ' selected="selected"';
  echo '<option value="c2c"'.$selcolumn1.'>'._AB_C2CODE.'</option>'."\n";
  if($column == "country") $selcolumn2 = ' selected="selected"';
  echo '<option value="country"'.$selcolumn2.'>'._AB_COUNTRY.'</option>'."\n";
  echo '</select> <select name="direction">'."\n";
  if($direction == "asc") $seldirection1 = ' selected="selected"';
  echo '<option value="asc"'.$seldirection1.'>'._AB_ASC.'</option>'."\n";
  if($direction == "desc") $seldirection2 = ' selected="selected"';
  echo '<option value="desc"'.$seldirection2.'>'._AB_DESC.'</option>'."\n";
  echo '</select> <input type="submit" value="'._AB_SORT.'" />'."\n";
  echo '</form>'."\n";
  echo '</td></tr>'."\n";
  echo '</table>'."\n";
  // Page Sorting
  echo '<table summary="" align="center" border="0" cellpadding="2" cellspacing="2" bgcolor="'.$bgcolor2.'" width="100%">'."\n";
  echo '<tr bgcolor="'.$bgcolor2.'">'."\n";
  echo '<td align="center" width="10%"><strong>'._AB_FLAG.'</strong></td>'."\n";
  echo '<td align="center" width="10%"><strong>'._AB_C2CODE.'</strong></td>'."\n";
  echo '<td width="80%"><strong>'._AB_COUNTRY.'</strong></td>'."\n";
  echo '</tr>'."\n";
  $result = $db->sql_query("SELECT * FROM `".$prefix."_nsnst_countries` ORDER BY $column $direction LIMIT $min,$perpage");
  while($getIPs = $db->sql_fetchrow($result)) {
    $getIPs['flag'] = flag_img($getIPs['c2c']);
    $getIPs['c2c'] = strtoupper($getIPs['c2c']);
    echo '<tr onmouseover="this.style.backgroundColor=\''.$bgcolor2.'\'" onmouseout="this.style.backgroundColor=\''.$bgcolor1.'\'" bgcolor="'.$bgcolor1.'">'."\n";
    echo '<td align="center">'.$getIPs['flag'].'</td>'."\n";
    echo '<td align="center">'.strtoupper($getIPs['c2c']).'</td>'."\n";
    echo '<td>'.$getIPs['country'].'</td>'."\n";
    echo '</tr>'."\n";
  }
  echo '</table>'."\n";
  abadminpagenums($op, $totalselected, $perpage, $max, $column, $direction);
} else {
  echo '<div class="text-center"><strong>'._AB_NOCOUNTRIES.'</strong></div>'."\n";
}
CloseTable();
include("footer.php");

?>