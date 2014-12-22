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

# v1.0 prints a Green area for positive (value of 1 indicating we have a leaf)
# and red for negative (value of -1 for no leaf)

$opt[1] = "";
$opt[1] .= "--pango-markup ";
$opt[1] .= "--vertical-label \"Nest Leafs\" ";
$opt[1] .= "--lower -1 --upper 1  --rigid ";
$opt[1] .= "--title '<span fgcolor=\"#00FF00\">Nest Leafs</span> or <span fgcolor=\"#FF0000\">No Leafs</span>' ";

$def[1]  = "DEF:var1=$RRDFILE[1]:$DS[1]:MAX ";
$def[1] .= "CDEF:red=var1,DUP,0,LT,* ";
$def[1] .= "CDEF:green=var1,DUP,0,GT,* ";
$def[1] .= "AREA:red#ff0000 AREA:green#00ff00 ";
#$def[1] .= "GPRINT:var1:LAST:\"Current\: %2.1lfC\" ";
#$def[1] .= "GPRINT:var1:AVERAGE:\"Average\: %2.1lfC\" ";
#$def[1] .= "GPRINT:var1:MAX:\"Maximum\: %2.1lfC\" ";
#$def[1] .= "GPRINT:var1:MIN:\"Minimum\: %2.1lfC\\n\" ";
#$def[1] .= "HRULE:$WARN_MIN[1]#FFFF00:\"Warning (Low)\: " . number_format($WARN_MIN[1], 1, '.', '') . "C\\l\" ";
#$def[1] .= "COMMENT:\\u ";
#$def[1] .= "HRULE:$WARN_MAX[1]#FFFF00:\"Warning (High)\: " . number_format($WARN_MAX[1], 1, '.', '') . "C\\r\" ";
#$def[1] .= "HRULE:$CRIT_MIN[1]#FF0000:\"Critical (Low)\: " . number_format($CRIT_MIN[1], 1, '.', '') . "C\" ";
#$def[1] .= "HRULE:$CRIT_MAX[1]#FF0000:\"Critical (High)\: " . number_format($CRIT_MAX[1], 1, '.', '') . "C\" ";
?>
