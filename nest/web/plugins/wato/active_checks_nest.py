group = "activechecks"

register_rule(group,
              "active_checks:nest",
              Tuple(
                  title = _("Check NEST"),
                  help = _("Nest Help"),
                  elements = [
                      TextAscii(
                          title = _("Access Token URL"),
                          allow_empty = False,
                          help = _("Access Token URL from Nest Developer page"),
                          ),
                      TextAscii(
                          title = _("Client ID"),
                          allow_empty = False,
                          help = _("Client ID from Nest Developer client page"),
                          ),
                      TextAscii(
                          title = _("Client Secret"),
                          allow_empty = False,
                          help = _("Client Secret from Nest Developer client page"),
                          ),
                      TextAscii(
                          title = _("PIN Code"),
                          allow_empty = False,
                          help = _("PIN Authorization code for authorized Nest account"),
                          ),
                      Dictionary(
                          title = _("Optional arguments"),
                          elements = [
                              ( "description",
                                TextAscii(
                                    title = _("Description"),
                                    default_value = "$USER7$",
                                    )
                                ),
                              ]
                          )
                      ]
                  ),
              match = 'all'
              )
