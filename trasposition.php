<?php
##
## This code is licensed under the GPL-v3
## Belongs to the "encrypt" system that can be found here:
## https://github.com/CaeSpock/encrypt
## Questions and suggestions are always welcomed. Send me an E-Mail at: CAnibarro<at>WhiteSith<dot>com
##

  // Trasposition cipher
  // https://en.wikipedia.org/wiki/Transposition_cipher
  if ($enckey==0 || is_null($enckey)) {
    echo "<div class=\"alert alert-danger\">\n";
    echo "<strong>$l_alert!</strong> $l_noksent\n";
    echo "</div>\n";
  } else {
    if ($phrase == "" or is_null($phrase)) {
      echo "<div class=\"alert alert-danger\">\n";
      echo "<strong>$l_alert!</strong> $l_nopsent\n";
      echo "</div>\n";
    } else {
      echo "<div class=\"table-responsive\">\n";
      echo "<table class=\"table table-sm\">\n";
      echo "<tr>\n";
      echo " <td class=\"table-dark text-right\">$l_type:</td>\n";
      echo " <td>$l_trasposition - K=$enckey</td>\n";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-warning text-right\"><strong>$l_phrase:</strong></td>\n";
      echo " <td><samp>$phrase</samp></td>";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-info text-right\"><strong>$l_matrix:</strong></td>\n";
      echo " <td><samp><pre>|";
      $position = 1;
      while ($position <= $enckey) {
        echo "$position|";
        $position++;
      }
      echo "\n-";
      $position = 1;
      while ($position <= $enckey) {
        echo "--";
        $position++;
      }
      echo "\n";
      while ((strlen($phrase) % $enckey) != 0) {
        $phrase .= " ";
      }
      $position = 0;
      $counter = 1;
      $newphrase = array();
      $row = 1;
      while ($position < strlen($phrase)) {
        echo "|".$phrase[$position];
        $column=$counter;
        $prearray = array("row"=>$row,"column"=>$column, "letter"=>$phrase[$position]);
        array_push($newphrase, $prearray);
        $position++;
        $counter++;
        if ($counter > $enckey) {
          echo "|\n";
          $counter = 1;
          $row++;
        }
      }
      echo "</pre></samp></td>";
      echo "</tr>\n";
      echo "<tr>\n";
      echo " <td class=\"bg-success text-right\"><strong>$l_newphrase:</strong></td>\n";
      echo " <td><pre>";
      $columns = $enckey;
      while ($columns >= 1) {
        $rows = 1;
        while ($rows <= $row) {
          $newcounter = 0;
          while ($newcounter <count($newphrase)) {
            if ($newphrase[$newcounter]["row"]==$rows and $newphrase[$newcounter]["column"]==$columns) {
              echo $newphrase[$newcounter]["letter"];
            }
            $newcounter++;
          }
          $rows++;
        }
        $columns--;
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      while ((strlen($phrase) % $enckey) != 0) {
        $phrase .= " ";
      }
      $position = 0;
      $newphrase = array();
      $row = 1;
      $column = $enckey;
      $maxrows = strlen($phrase)/$enckey;
      while ($position < strlen($phrase)) {
        $prearray = array("row"=>$row,"column"=>$column, "letter"=>$phrase[$position]);
        array_push($newphrase, $prearray);
        $row++;
        $position++;
        if ($row>$maxrows) {
          $row=1;
          $column--;
        }
      }
      echo "<tr>\n";
      echo " <td class=\"bg-danger text-right\"><strong>$l_inverted:</strong></td>\n";
      echo " <td><pre>";
      $rows = 1;
      $columns = 1;
      $counter = 0;
      while ($counter < strlen($phrase)) {
        $newcounter = 0;
        while ($newcounter <count($newphrase)) {
          if ($newphrase[$newcounter]["row"]==$rows and $newphrase[$newcounter]["column"]==$columns) {
            echo $newphrase[$newcounter]["letter"];
          }
          $newcounter++;
        }
        $columns++;
        if ($columns>$enckey) {
          $rows++;
          $columns=1;
        }
        $counter++;
      }
      echo "</pre></td>\n";
      echo "</tr>\n";
      echo "</table>\n";
      echo "</div>\n";
    }
  }
  echo "<br /><br />";
  echo "<div class=\"text text-center\">\n";
  echo "<a href=\"$phpself\" class=\"btn btn-secondary\" role=\"button\">$l_goback</a>\n";
  echo "</div>";
