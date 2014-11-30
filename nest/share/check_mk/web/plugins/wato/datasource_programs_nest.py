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
