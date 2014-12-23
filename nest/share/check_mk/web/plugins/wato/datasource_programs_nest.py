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

group = "datasource_programs"

register_rule(group,
    "special_agents:nest",
    Tuple(
        title = _("Nest Home Automation Devices "),
        help = _("Enter the Access Token for monitoring Nest devices"),
        elements = [
           TextAscii(
           title = _("Access Token"),
           allow_empty = False,
           help = _("Access Token URL from Nest client application "
                    "and authorization"),
           ),
        ]
    ),
    match = 'all'
    )
