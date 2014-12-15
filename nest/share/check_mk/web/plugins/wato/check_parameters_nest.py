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
                title = _("Critical low value"),
                unit = _("Temperature"),
                default_value = float(11.0),
            ),
            Float(
                title = _("Warning low value"),
                unit = _("Temperature"),
                default_value = 20.0,
            ),
            Float(
                title = _("Warning high value"),
                unit = _("Temperature"),
                default_value = 25.0,
            ),
            Float(
                title = _("Critical High value"),
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
