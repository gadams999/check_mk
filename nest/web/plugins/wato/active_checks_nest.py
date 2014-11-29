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
                          help = _("access token"),
                          ),
                      TextAscii(
                          title = _("Secret"),
                          allow_empty = False,
                          help = _("Secret"),
                          ),
                      TextAscii(
                          title = _("PIN"),
                          allow_empty = False,
                          help = _("OIN"),
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
