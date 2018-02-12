<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>.: Encriptaci&oacute;n :.</title>
  </head>
  <body>
    <center>
    <font face="Tahoma, Verdana, Arial" size="7">.: Encriptaci&oacute;n :.</font>
    <br />
    <hr width="50%"><br />
    </center>
    </font>
    <font face="Tahoma, Verdana, Arial" size="2">
    <blockquote>
    <?php
$phpself=$_SERVER["PHP_SELF"];
$envio=$_POST["envio"];
$frase=strtoupper($_POST["frase"]);
$tipo=$_POST["tipo"];
$k=$_POST["k"];

if ($envio==1) {
  echo "<b>Frase:</b> $frase<br />\n";
  echo "<b>Tipo:</b> ";
  if ($tipo == 1) {
    echo "Cifrado de Cesar 1 - K=$k<br />\n";
    echo "<pre>\n";
    echo "<b>      Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      echo chr($i);
    }
    echo "\n";
    echo "<b>Nuevo Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      $posicion=$i;
      if ($i>(90-$k)) { $posicion=($i+$k-(26+$k)); }
      $letra=$posicion+$k;
      echo chr($letra);
    }
    echo "\n";
    echo "<b>         Frase:</b> $frase\n";
    echo "<b>   Nueva Frase:</b> ";
    $contador=0;
    while ($contador < strlen($frase)) {
      $posicion = ord($frase[$contador]);
      if ($posicion >=65 and $posicion<=90) {
        if ($posicion > (90-$k)) {
          $posicion= $posicion+$k-(26);
        } else {
          $posicion = $posicion + $k;
        }
      }
      echo chr($posicion);
      $contador++;
    }
    echo "\n";
    echo "<b>     Invertido:</b> ";
    $contador=0;
    while ($contador < strlen($frase)) {
      $posicion = ord($frase[$contador]);
      if ($posicion >=65 and $posicion<=90) {
        if ($posicion < (65+$k)) {
          $posicion = $posicion - $k +26;
        } else {
          $posicion = $posicion - $k;
        }
      }
      echo chr($posicion);
      $contador++;
    }
    echo "\n";
    echo "</pre>\n";
  } elseif ($tipo == 2) {
    echo "Cifrado de Cesar 2 - K=$k<br />\n";
    echo "<pre>\n";
    echo "<b>      Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      echo chr($i);
    }
    echo "\n";
    echo "<b>Nuevo Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      $posicion=$i;
      if ($i>(90-$k)) { $posicion=($i+$k-(26+$k)); }
      $letra=$posicion+$k;
      echo chr($letra);
    }
    echo "\n";
    echo "<b>         Frase:</b> $frase\n";
    echo "<b>   Nueva Frase:</b> ";
    $contador=0;
    $kesimo = 0;
    while ($contador < strlen($frase)) {
      if ( ($kesimo == $k) and ($contador > 0)) { 
        $azar=rand(65,90);
        // echo "<font color=\"#800000\"><u>".chr($azar)."</u></font>";
        echo chr($azar);
        $kesimo = 0;
      }
      $posicion = ord($frase[$contador]);
      if ($posicion >=65 and $posicion<=90) {
        if ($posicion > (90-$k)) {
          $posicion= $posicion+$k-(26);
        } else {
          $posicion = $posicion + $k;
        }
      }
      echo chr($posicion);
      $contador++;
      $kesimo++;
    }
    echo "\n";
    echo "<b>     Invertido:</b> ";
    $contador=0;
    $kesimo = 0;
    while ($contador < strlen($frase)) {
      if ($kesimo != $k) {
        $posicion = ord($frase[$contador]);
        if ($posicion >=65 and $posicion<=90) {
          if ($posicion < (65+$k)) {
            $posicion = $posicion - $k +26;
          } else {
            $posicion = $posicion - $k;
          }
        }
        echo chr($posicion);
      } else {
        // echo "<font color=\"red\">#</font>";
        $kesimo = -1;
      }
      $contador++;
      $kesimo++;
    }
    echo "\n";
    echo "</pre>\n";
  } elseif ($tipo == 3) {
    echo "ROT 13<br />\n";
    echo "<pre>\n";
    echo "<b>      Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      echo chr($i);
    }
    echo "\n";
    echo "<b>Nuevo Alfabeto:</b> ";
    for ($i=65; $i<=90; $i++) {
      $posicion=$i;
      if ($i>65+12) { $posicion=$i-26; }
      $letra=$posicion+13;
      echo chr($letra);
    }
    echo "\n";
    echo "<b>         Frase:</b> $frase\n";
    echo "<b>   Nueva Frase:</b> ";
    $contador=0;
    while ($contador < strlen($frase)) {
      $posicion = ord($frase[$contador]);
      if ($posicion >=65 and $posicion<=90) {
        if ($posicion > 65+12) {
          $posicion=$posicion-13;
        } else {
          $posicion=$posicion+13;
        }
      }
      echo chr($posicion);
      $contador++;
    }
    echo "\n";
    echo "</pre>\n";
  } else {
    echo "Cifrado desconocido<br />\n";
  }

  echo "  <br />\n";
  echo "  <hr width=\"50%\"><br />\n";
  echo "  </center>\n";
} else {
  echo "<form method=\"POST\" action=\"$phpself\">\n";
  echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
  echo "<tr>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">Ingrese frase:</font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\"><input type=\"text\" name=\"frase\"></font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">&nbsp;</font></td>\n";
  echo "</tr>\n";
  echo "<tr>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">Tipo de Encriptaci&oacute;n:</font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">";
  echo "<input type=\"radio\" name=\"tipo\" value=\"1\"> Cifrado de Cesar 1<br />";
  echo "<input type=\"radio\" name=\"tipo\" value=\"2\"> Cifrado de Cesar 2<br />";
  echo "<input type=\"radio\" name=\"tipo\" value=\"3\"> ROT 13<br />";
  echo "</font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">K=<input type=\"text\" name=\"k\" size=\"2\" maxsize=\"2\"></font></td>\n";
  echo "</tr>\n";
  echo "<input type=\"hidden\" name=\"envio\" value=\"1\">\n";
  echo "<tr>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\"><input type=\"reset\" name=\"Reiniciar\" value=\"Reiniciar\"></font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\">&nbsp;</font></td>\n";
  echo "  <td valign=\"top\"><font face=\"Tahoma, Verdana, Arial\" size=\"2\"><input type=\"submit\" name=\"Enviar\" value=\"Enviar\"></font></td>\n";
  echo "</tr>\n";
  echo "</table>\n";
  echo "</form>\n";
}
    ?>
    </blockquote>
    </font>
  </body>
</html>

