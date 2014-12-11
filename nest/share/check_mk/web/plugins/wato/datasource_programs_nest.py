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

group = "checkparams"
subgroup_environment =  _("Temperature, Humidity, Electrical Parameters, etc.")


register_check_params(
    subgroup_environment,
    "nest_temp",
    _("Nest Thermostat Temperature"),
    Tuple(
        title = _("Temperature of Nest Thermostats"),
        elements = [
            Float(
                title = _("Critical low value -- default is in Celcius"),
                unit = _("Temperature"),
                default_value = crtilow,
            ),
            Float(
                title = _("Warning low value -- default is in Celcius"),
                unit = _("Temperature"),
                default_value = crtilow,
            ),
            Float(
                title = _("Warning high value -- default is in Celcius"),
                unit = _("Temperature"),
                default_value = crtilow,
            ),
            Float(
                title = _("Critical High value -- default is in Celcius"),
                unit = _("Temperature"),
                default_value = crtilow,
            ),
