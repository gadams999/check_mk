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
  $band = ($upper - $lower)/9;
}
else
{
  $tempscale = "Celsius";
  $upper = $CRIT_MAX[1] * 1.1;
  $lower = $CRIT_MIN[1] - ($CRIT_MIN[1] * .1);
  $band = ($upper - $lower)/9;
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
# Color gradient - hardcoded for now....
  $def[1] .= "CDEF:temp101=far,101,LT,far,101,IF ";
  $def[1] .= "CDEF:temp101NoUnk=far,UN,0,temp101,IF ";
  $def[1] .= "AREA:temp101NoUnk#ff0000:\"TEMPERATURE\" ";
  $def[1] .= "CDEF:temp100=far,100,LT,far,100,IF ";
  $def[1] .= "CDEF:temp100NoUnk=far,UN,0,temp100,IF ";
  $def[1] .= "AREA:temp100NoUnk#ff6e00 ";
  $def[1] .= "CDEF:temp90=far,90,LT,far,90,IF ";
  $def[1] .= "CDEF:temp90NoUnk=far,UN,0,temp90,IF ";
  $def[1] .= "AREA:temp90NoUnk#ffd200 ";
  $def[1] .= "CDEF:temp80=far,80,LT,far,80,IF ";
  $def[1] .= "CDEF:temp80NoUnk=far,UN,0,temp80,IF ";
  $def[1] .= "AREA:temp80NoUnk#fdff00 ";
  $def[1] .= "CDEF:temp75=far,75,LT,far,75,IF ";
  $def[1] .= "CDEF:temp75NoUnk=far,UN,0,temp75,IF ";
  $def[1] .= "AREA:temp75NoUnk#8aff00 ";
  $def[1] .= "CDEF:temp65=far,65,LT,far,65,IF ";
  $def[1] .= "CDEF:temp65NoUnk=far,UN,0,temp65,IF ";
  $def[1] .= "AREA:temp65NoUnk#00ff36 ";
  $def[1] .= "CDEF:temp60=far,60,LT,far,60,IF ";
  $def[1] .= "CDEF:temp60NoUnk=far,UN,0,temp60,IF ";
  $def[1] .= "AREA:temp60NoUnk#00ff83 ";
  $def[1] .= "CDEF:temp50=far,50,LT,far,50,IF ";
  $def[1] .= "CDEF:temp50NoUnk=far,UN,0,temp50,IF ";
  $def[1] .= "AREA:temp50NoUnk#00d4ff ";
  $def[1] .= "CDEF:temp40=far,40,LT,far,40,IF ";
  $def[1] .= "CDEF:temp40NoUnk=far,UN,0,temp40,IF ";
  $def[1] .= "AREA:temp40NoUnk#0084ff ";
  $def[1] .= "CDEF:temp30=far,30,LT,far,30,IF ";
  $def[1] .= "CDEF:temp30NoUnk=far,UN,0,temp30,IF ";
  $def[1] .= "AREA:temp30NoUnk#0032ff ";

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
# Color gradient - hardcoded for now
  $def[1] .= "CDEF:temp38=var1,38,LT,var1,38,IF ";
  $def[1] .= "CDEF:temp38NoUnk=var1,UN,0,temp38,IF ";
  $def[1] .= "AREA:temp38NoUnk#ff0000:\"TEMPERATURE\" ";
  $def[1] .= "CDEF:temp37=var1,37,LT,var1,37,IF ";
  $def[1] .= "CDEF:temp37NoUnk=var1,UN,0,temp37,IF ";
  $def[1] .= "AREA:temp37NoUnk#ff6e00 ";
  $def[1] .= "CDEF:temp32=var1,32,LT,var1,32,IF ";
  $def[1] .= "CDEF:temp32NoUnk=var1,UN,0,temp32,IF ";
  $def[1] .= "AREA:temp32NoUnk#ffd200 ";
  $def[1] .= "CDEF:temp27=var1,27,LT,var1,27,IF ";
  $def[1] .= "CDEF:temp27NoUnk=var1,UN,0,temp27,IF ";
  $def[1] .= "AREA:temp27NoUnk#fdff00 ";
  $def[1] .= "CDEF:temp24=var1,24,LT,var1,24,IF ";
  $def[1] .= "CDEF:temp24NoUnk=var1,UN,0,temp24,IF ";
  $def[1] .= "AREA:temp24NoUnk#8aff00 ";
  $def[1] .= "CDEF:temp18=var1,18,LT,var1,18,IF ";
  $def[1] .= "CDEF:temp18NoUnk=var1,UN,0,temp18,IF ";
  $def[1] .= "AREA:temp18NoUnk#00ff36 ";
  $def[1] .= "CDEF:temp16=var1,16,LT,var1,16,IF ";
  $def[1] .= "CDEF:temp16NoUnk=var1,UN,0,temp16,IF ";
  $def[1] .= "AREA:temp16NoUnk#00ff83 ";
  $def[1] .= "CDEF:temp10=var1,10,LT,var1,10,IF ";
  $def[1] .= "CDEF:temp10NoUnk=var1,UN,0,temp10,IF ";
  $def[1] .= "AREA:temp10NoUnk#00d4ff ";
  $def[1] .= "CDEF:temp4=var1,4,LT,var1,4,IF ";
  $def[1] .= "CDEF:temp4NoUnk=var1,UN,0,temp4,IF ";
  $def[1] .= "AREA:temp4NoUnk#0084ff ";
  $def[1] .= "CDEF:temp0=var1,0,LT,var1,0,IF ";
  $def[1] .= "CDEF:temp0NoUnk=var1,UN,0,temp0,IF ";
  $def[1] .= "AREA:temp0NoUnk#0032ff ";


#$def[1] .= "LINE1:var1#0000FF:\"TEMPERATURE\" ";
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
