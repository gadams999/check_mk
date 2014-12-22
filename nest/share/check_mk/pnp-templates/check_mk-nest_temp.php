<?php
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2013             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#

# CRIT_MIN and CRIT_MAX used as the --lower and --upper value basis

# Based on 2nd series name, first series data is C (Celsius) or F (Fahrenheit)
# Since all values are expressed in celcius, we need to convert if user
# selected Fahrenheit

if ($NAME[2] == "F") {
  $tempscale = "Fahrenheit";
  $upper = (($CRIT_MAX[1] * (9/5)) + 32) * 1.1;
  $lower = ($CRIT_MIN[1] - ($CRIT_MIN[1] * .1)) * (9/5) + 32;
}
else
{
  $tempscale = "Celsius";
  $upper = $CRIT_MAX[1] * 1.1;
  $lower = $CRIT_MIN[1] - ($CRIT_MIN[1] * .1);

}
$opt[1]  = "--pango-markup ";
$opt[1] .= "--vertical-label \"$tempscale\" ";
$opt[1] .= "--lower $lower --upper $upper  --rigid ";
$opt[1] .= "--title \"Nest Temperature $servicedesc\" ";

# For the actual value, if Fahrenheit, need to convert from stored Celsius

if ($NAME[2] == "F") {

  $warn_minf = (($WARN_MIN[1] * (9/5)) + 32);
  $warn_maxf = (($WARN_MAX[1] * (9/5)) + 32);
  $crit_minf = (($CRIT_MIN[1] * (9/5)) + 32);
  $crit_maxf = (($CRIT_MAX[1] * (9/5)) + 32);

  $def[1]  = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
  $def[1] .= "CDEF:far=9,5,/,var1,*,32,+ ";
  $def[1] .= "LINE1:far#0000FF:\"TEMPERATURE\" ";
  $def[1] .= "GPRINT:far:LAST:\"Current\: %2.1lfF\" ";
  $def[1] .= "GPRINT:far:AVERAGE:\"Average\: %2.1lfF\" ";
  $def[1] .= "GPRINT:far:MAX:\"Maximum\: %2.1lfF\" ";
  $def[1] .= "GPRINT:far:MIN:\"Minimum\: %2.1lfF\\n\" ";
  $def[1] .= "HRULE:$warn_minf#FFFF00:\"Warning (Low)\: " . number_format($warn_minf, 1, '.', '') . "F\\l\" ";
  $def[1] .= "COMMENT:\\u ";
  $def[1] .= "HRULE:$warn_maxf#FFFF00:\"Warning (High)\: " . number_format($warn_maxf, 1, '.', '') . "F\\r\" ";
  $def[1] .= "HRULE:$crit_minf#FF0000:\"Critical (Low)\: " . number_format($crit_minf, 1, '.', '') . "F\" ";
  $def[1] .= "HRULE:$crit_maxf#FF0000:\"Critical (High)\: " . number_format($crit_maxf, 1, '.', '') . "F\" ";
}
else
{
$def[1]  = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] .= "LINE1:var1#0000FF:\"TEMPERATURE\" ";
$def[1] .= "GPRINT:var1:LAST:\"Current\: %2.1lfC\" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"Average\: %2.1lfC\" ";
$def[1] .= "GPRINT:var1:MAX:\"Maximum\: %2.1lfC\" ";
$def[1] .= "GPRINT:var1:MIN:\"Minimum\: %2.1lfC\\n\" ";
$def[1] .= "HRULE:$WARN_MIN[1]#FFFF00:\"Warning (Low)\: " . number_format($WARN_MIN[1], 1, '.', '') . "C\\l\" ";
$def[1] .= "COMMENT:\\u ";
$def[1] .= "HRULE:$WARN_MAX[1]#FFFF00:\"Warning (High)\: " . number_format($WARN_MAX[1], 1, '.', '') . "C\\r\" ";
$def[1] .= "HRULE:$CRIT_MIN[1]#FF0000:\"Critical (Low)\: " . number_format($CRIT_MIN[1], 1, '.', '') . "C\" ";
$def[1] .= "HRULE:$CRIT_MAX[1]#FF0000:\"Critical (High)\: " . number_format($CRIT_MAX[1], 1, '.', '') . "C\" ";
}
?>
