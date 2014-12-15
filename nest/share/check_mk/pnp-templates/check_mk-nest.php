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
$upper = $CRIT_MAX[1] * 1.1;
$lower = $CRIT_MIN[1] - ($CRIT_MIN[1] * .1);
if ($UNIT[1] == "F") {
  $tempscale = "Fahrenheit";
}
else
{
  $tempscale = "Celsius";
}
$opt[1]  = "--pango-markup ";
$opt[1] .= "--vertical-label \"$tempscale\" ";
$opt[1] .= "--lower $lower --upper $upper  --rigid ";
$opt[1] .= "--title \"Nest Temperature $servicedesc\" ";

$def[1]  = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] .= "LINE1:var1#0000FF:\"TEMPERATURE\" ";
$def[1] .= "GPRINT:var1:LAST:\"Current\: %2.1lfF\" ";
$def[1] .= "GPRINT:var1:AVERAGE:\"Average\: %2.1lfF\" ";
$def[1] .= "GPRINT:var1:MAX:\"Maximum\: %2.1lfF\" ";
$def[1] .= "GPRINT:var1:MIN:\"Minimum\: %2.1lfF\\n\" ";
$def[1] .= "HRULE:$WARN_MIN[1]#FFFF00:\"Warning (Low)\: $WARN_MIN[1]F\\l\" ";
$def[1] .= "COMMENT:\\u ";
$def[1] .= "HRULE:$WARN_MAX[1]#FFFF00:\"Warning (High)\: $WARN_MAX[1]F\\r\" ";
$def[1] .= "HRULE:$CRIT_MIN[1]#FF0000:\"Critical (Low)\: $CRIT_MIN[1]F\" ";
$def[1] .= "HRULE:$CRIT_MAX[1]#FF0000:\"Critical (High)\: $CRIT_MAX[1]F\" ";
?>
