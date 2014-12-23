#!/usr/bin/python
# -*- encoding: utf-8; py-indent-offset: 4 -*-

#
# (c) 2014 Adams Technology Consulting
#          Gavin Adams <me@gavinadams.org>
#

# This is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  This file is distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

def perfometer_nest_thermostat (row, check_command, perf_data):
    leaf = int(perf_data[0][1])
    if leaf == 1:
        return "Has Leaf", perfometer_linear(50, '#00ff00')
    else:
        return "No Leaf", perfometer_linear(50, '#ff0000')

perfometers['check_mk-nest_thermostat'] = perfometer_nest_thermostat


def perfometer_nest_humidity (row, check_command, perf_data):
    rh = int(perf_data[0][1])
    return "%d%% RH" % rh, perfometer_linear(rh, '#0080ff')

perfometers['check_mk-nest_thermostat'] = perfometer_nest_thermostat
perfometers['check_mk-nest_humidity'] = perfometer_nest_humidity

