<?php
##
## This code is licensed under the GPL-v3
## Belongs to the "encrypt" system that can be found here:
## https://github.com/CaeSpock/encrypt
## Questions and suggestions are always welcomed. Send me an E-Mail at: CAnibarro<at>WhiteSith<dot>com
##

  // Cesar cipher Type 2 - Cesar 1 1st variation
  if ($enckey==0 or !isset($enckey)) {
    echo "<div class=\"alert alert-danger\">\n";
    echo "<strong>$l_alert!</strong> $l_noksent\n";
    echo "</div>\n";
  } else {
    if ($phrase == "" or !isset($phrase)) {
      echo "<div class=\"alert alert-danger\">\n";
      echo "<strong>$l_alert!</strong> $l_nopsent\n";
      echo "</div>\n";
    } else {
      echo "<div class=\"table-responsive\">\n";
      echo "<table class=\"table table-sm\">\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_type:</td>\n";
      echo " <td>$l_caesar2 - K=$enckey</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_alphabet:</td>\n";
      echo " <td><samp>";
      for ($i=65; $i<=90; $i++) {
        echo chr($i);
      }
      echo "</samp></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_newalphabet:</td>\n";
      echo " <td><samp>";
      for ($i=65; $i<=90; $i++) {
        $position=$i;
        if ($i>(90-$enckey)) { $position=($i+$enckey-(26+$enckey)); }
        $letter=$position+$enckey;
        echo chr($letter);
      }
      echo "</samp></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-warning text-right\"><strong>$l_phrase:</strong></td>\n";
      echo " <td><samp>$phrase</samp></td>";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-success text-right\"><strong>$l_newphrase:</strong></td>\n";
      echo " <td><samp>";
      $counter=0;
      $enckeyesimo = 0;
      while ($counter < strlen($phrase)) {
        if ( ($enckeyesimo == $enckey) and ($counter > 0)) { 
          $azar=rand(65,90);
          if ($caesar2_cu==1) {
            echo "<font color=\"#800000\"><u>".chr($azar)."</u></font>";
          } else {
            echo chr($azar);
          }
          $enckeyesimo = 0;
        }
        $position = ord($phrase[$counter]);
        if ($position >=65 and $position<=90) {
          if ($position > (90-$enckey)) {
            $position= $position+$enckey-(26);
          } else {
            $position = $position + $enckey;
          }
        }
        echo chr($position);
        $counter++;
        $enckeyesimo++;
      }
      echo "</samp></td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-danger text-right\"><strong>$l_inverted:</strong></td>\n";
      echo " <td><samp>";
      $counter=0;
      $enckeyesimo = 0;
      while ($counter < strlen($phrase)) {
        if ($enckeyesimo != $enckey) {
          $position = ord($phrase[$counter]);
          if ($position >=65 and $position<=90) {
            if ($position < (65+$enckey)) {
              $position = $position - $enckey +26;
            } else {
              $position = $position - $enckey;
            }
          }
          echo chr($position);
        } else {
          // echo "<font color=\"red\">#</font>";
          $enckeyesimo = -1;
        }
        $counter++;
        $enckeyesimo++;
      }
      echo "</samp></td>\n";
      echo "</tr>\n";
      echo "</table>\n";
      echo "</div>\n";
    }
  }
  echo "<br /><br />";
  echo "<div class=\"text text-center\">\n";
  echo "<a href=\"$phpself\" class=\"btn btn-secondary\" role=\"button\">$l_goback</a>\n";
  echo "</div>";
