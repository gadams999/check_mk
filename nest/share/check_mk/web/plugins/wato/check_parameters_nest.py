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

#### Sections commented out for reference of where these are placed
#### within the default check_mk / wato structure

#register_rulegroup("checkparams", _("Parameters for Inventorized Checks"),
#    _("Levels and other parameters for checks found by the Check_MK inventory.\n"
#      "Use these rules in order to define parameters like filesystem levels, "
#      "levels for CPU load and other things for services that have been found "
#      "by the automatic service detection (inventory) of Check_MK."))

#group = "checkparams"
#subgroup_environment =  _("Temperature, Humidity, Electrical Parameters, etc.")

register_check_parameters(
    subgroup_environment,
    "nest_temp",
    _("Nest Thermostat Temperature"),
    Tuple(
        title = _("Temperature of Nest Thermostats"),
        elements = [
            Float(
                title = _("Critical at or below"),
                unit = _("Temperature"),
                default_value = float(11.0),
            ),
            Float(
                title = _("Warning at or below"),
                unit = _("Temperature"),
                default_value = 20.0,
            ),
            Float(
                title = _("Warning at or above"),
                unit = _("Temperature"),
                default_value = 25.0,
            ),
            Float(
                title = _("Critical at or above"),
                unit = _("Temperature"),
                default_value = 35.0,
            ),
            DropdownChoice(
                title = _("Temperature Scale"),
                choices = [
                    ('C', _('Celsius')),
                    ('F', _('Fahrenheit')),
                ],
            ),
        ]
    ),
    TextAscii(
        title = _("Thermostat"),
        allow_empty = False),
    "first"
)

register_check_parameters(
    subgroup_environment,
    "nest_humidity",
    _("Nest Thermostat Humidity"),
    Tuple(
        title = _("Humidity of Nest Thermostats"),
        elements = [
            Integer(
                title = _("Critical at or below"),
                unit = _("% RH"),
                default_value = 30,
            ),
            Integer(
                title = _("Warning at or below"),
                unit = _("% RH"),
                default_value = 40,
            ),
            Integer(
                title = _("Warning at or above"),
                unit = _("% RH"),
                default_value = 60,
            ),
            Integer(
                title = _("Critical at or above"),
                unit = _("% RH"),
                default_value = 70,
            ),
        ]
    ),
    TextAscii(
        title = _("Thermostat"),
        allow_empty = False),
    "first"
)



