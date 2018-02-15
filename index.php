<?php
##
## This code is licensed under the GPL-v3
## Belongs to the "encrypt" system that can be found here:
## https://github.com/CaeSpock/encrypt
## Questions and suggestions are always welcomed. Send me an E-Mail at: CAnibarro<at>WhiteSith<dot>com
##

  // Configuration paths
  $pathinc = "inc";

  // Load configuration and files 
  include_once("$pathinc/conf.php");
  $language = strtolower($language);
  include_once("$pathinc/$language.lang.php");
  include_once("$pathinc/header.php");

  // ####
  // #### Code please do not modify
  // ####
  // Receive external variables
  $phpself=$_SERVER["PHP_SELF"];
  $varsent=(isset($_POST["varsent"]) ? $_POST["varsent"] : null);
  $phrase=(isset($_POST["phrase"]) ? $_POST["phrase"] : null);
  $enctype=(isset($_POST["enctype"]) ? $_POST["enctype"] : null);
  $enckey=(isset($_POST["enckey"]) ? $_POST["enckey"] : null);

  if ($varsent==1) {
    // Eliminating spaces at the begging and at the end
    $phrase = trim($phrase);
    // Changing case to uppercase
    $phrase = strtoupper($phrase);
    // Replacing some latin characters
    $phrase = str_replace("Ñ", "N", $phrase);
    $phrase = str_replace("ñ", "N", $phrase);
    $phrase = str_replace("á", "A", $phrase);
    $phrase = str_replace("Á", "A", $phrase);
    $phrase = str_replace("é", "E", $phrase);
    $phrase = str_replace("É", "E", $phrase);
    $phrase = str_replace("í", "I", $phrase);
    $phrase = str_replace("Í", "I", $phrase);
    $phrase = str_replace("ó", "O", $phrase);
    $phrase = str_replace("Ó", "O", $phrase);
    $phrase = str_replace("ú", "U", $phrase);
    $phrase = str_replace("Ú", "U", $phrase);
    $phrase = str_replace("ü", "U", $phrase);
    $phrase = str_replace("Ü", "U", $phrase);
    // Lets force the key as an integer
    settype($enckey, "integer");
    // Lets force the key is a always a positive number
    $enckey = abs($enckey);
    // Force string to ASCII
    // $phrase = mb_convert_encoding($phrase, "ASCII");
    $phrase = iconv("UTF-8", "ASCII//TRANSLIT", $phrase);
    if ($enctype == 1) {
      include_once("trasposition.php");
    } elseif ($enctype == 2) {
      include_once("caesar1.php");
    } elseif ($enctype == 3) {
      include_once("caesar2.php");
    } elseif ($enctype == 4) {
      include_once("rot13.php");
    } else {
      echo "$l_unknowncypher<br />\n";
    }
    echo "  <br />\n";
    echo "  <hr width=\"50%\"><br />\n";
    echo "  </center>\n";
  } else {
    echo "<form method=\"POST\" action=\"$phpself\">\n";
    
    echo "<div class=\"form-group\">\n";
    echo "  <label for=\"inputPhrase\">$l_enterphrase:</label>\n";
    // echo "  <input type=\"text\" class=\"form-control\" id=\"inputPhrase\" name=\"phrase\" placeholder=\"$l_enterphrase2\">\n";
    echo "  <textarea class=\"form-control\" id=\"inputPhrase\" name=\"phrase\" rows=\"3\" placeholder=\"$l_enterphrase2\"></textarea>";
    echo "</div>\n";

    echo "<div class=\"form-row\">\n";
    echo "  <div class=\"col-xs-2\">";
    echo "    <label for=\"inputRadio\">$l_choosecipher:</label>\n";
    echo "    <div class=\"form-check\">\n";
    echo "      <input class=\"form-check-input\" type=\"radio\" name=\"enctype\" id=\"enctypeRadio\" value=\"1\">\n";
    echo "      <label class=\"form-check-label\" for=\"enctypeRadio\">$l_trasposition</label>\n";
    echo "    </div>\n";
    echo "    <div class=\"form-check\">\n";
    echo "      <input class=\"form-check-input\" type=\"radio\" name=\"enctype\" id=\"enctypeRadio\" value=\"2\">\n";
    echo "      <label class=\"form-check-label\" for=\"enctypeRadio\">$l_caesar1</label>\n";
    echo "    </div>\n";
    echo "    <div class=\"form-check\">\n";
    echo "      <input class=\"form-check-input\" type=\"radio\" name=\"enctype\" id=\"enctypeRadio\" value=\"3\">\n";
    echo "      <label class=\"form-check-label\" for=\"enctypeRadio\">$l_caesar2</label>\n";
    echo "    </div>\n";
    echo "    <div class=\"form-check\">\n";
    echo "      <input class=\"form-check-input\" type=\"radio\" name=\"enctype\" id=\"enctypeRadio\" value=\"4\">\n";
    echo "      <label class=\"form-check-label\" for=\"enctypeRadio\">$l_rot13</label>\n";
    echo "    </div>\n";
    echo "  </div>\n";
    echo "  <div class=\"col-xs-2\">";
    echo "    <label for=\"inputKey\">$l_enterkey:</label>\n";
    echo "    <input type=\"text\" class=\"form-control\" id=\"inputKey\" name=\"enckey\" placeholder=\"\" size=\"2\" maxsize=\"2\">\n";
    echo "  </div>\n";
    echo "  <div class=\"col\">&nbsp;</div>\n";
    // echo "  <div class=\"col\">&nbsp;</div>\n";
    // echo "  <div class=\"col\">&nbsp;</div>\n";
    // echo "  <div class=\"col-xs-2\">&nbsp;</div>\n";
    echo "</div>\n";

    echo "<div class=\"form-row\">\n";
    echo "&nbsp;";
    echo "</div>";

    echo "<div class=\"form-row\">\n";
    echo "<input type=\"hidden\" name=\"varsent\" value=\"1\">\n";
    echo "<button type=\"reset\" class=\"btn btn-danger\">$l_reset</button>\n";
    echo "&nbsp;";
    echo "<button type=\"submit\" class=\"btn btn-primary\">$l_submit</button>\n";
    echo "</div>";

    echo "</form>\n";
  }
  // Load footer and files
  include_once("$pathinc/footer.php");
?>
