#!/usr/bin/python
# -*- encoding: utf-8; py-indent-offset: 4 -*-

#
# (c) 2013 Heinlein Support GmbH
#          Robert Sander <r.sander@heinlein-support.de>
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

group = "activechecks"

register_rule(group,
    "active_checks:nest",
    Dictionary(
        title = _("Check Nest services"),
        help = _("Checks Nest (http://www.nest.com) services based on registered Client and API calls"),
        elements = [
            ( "access_token_url",
              TextAscii(
                  title = _("Access Token URL"),
                  help = _("URL from your Nest client application where the PIN+secret "
                             "is sent to get an access token"),
                  allow_empty = False,
               )
            ),
            ( "client_secret",
              TextAscii(
                  title = _("Client Secret"),
                  help = _("Private value from client application"),
                  allow_empty = False,
               )
            ),
            ( "pin_code",
              TextAscii(
                  title = _("PIN Code"),
                  help = _("Value returned from authenticating your personal Nest "
                             "account via the Client Authorization URL"),
                  allow_empty = False,
               )
            ),
        ],
        required_keys = [ "access_token_url", "client_secret", "pin_code" ],
    ),
    match = 'all')
