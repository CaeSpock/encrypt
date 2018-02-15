<?php
  // Encryption Type 3
  // Cesar Type 1 - K=13
  // ROT-13 aka ROT13
  echo "<div class=\"table-responsive\">\n";
  echo "<table class=\"table table-sm\">\n";
  echo "<tr>\n";
  echo " <td class=\"table-dark text-right\">$l_type:</td>\n";
  echo " <td>$l_rot13</td>\n";
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
    if ($i>65+12) { $position=$i-26; }
    $letter=$position+13;
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
  $contador=0;
  while ($contador < strlen($phrase)) {
    $position = ord($phrase[$contador]);
    if ($position >=65 and $position<=90) {
      if ($position > 65+12) {
        $position=$position-13;
      } else {
        $position=$position+13;
      }
    }
    echo chr($position);
    $contador++;
  }
  echo "</samp></td>\n";
  echo "</tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  echo "<br /><br />";
  echo "<div class=\"text text-center\">\n";
  echo "<a href=\"$phpself\" class=\"btn btn-secondary\" role=\"button\">$l_goback</a>\n";
  echo "</div>";
