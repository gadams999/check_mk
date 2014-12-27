nest
======
These are a series of check_mk checks for the Nest Thermostat. Checks are focused on those
measurements useful to check_mk / Nagios such and temperature, device status, etc.

The *Makefile* is used to develop and push changes to an OMD-specific installation.

The <a href="./nest.mkp">Installable .mkp file</a> file is a complete package that can be imported into a check_mk / OMD installation.

All files are under the share/check_mk directory structure and follow the same structure as those
under OMD (e.g., local/share/...)


## Overview of Use
Coming soon, a link to my blog on design and use. I may copy/pasta some of that over here, or just
leave the github content brief.

## Creation of .mkp
Use the Makefile to deploy to a clean install of omd
$ sudo su - dev
[dev]$ omd start
 
From development directory, issue "make" to install into dev

[dev]$ cmk -P create nest

Edit the manifest file:

[dev]$ vi var/check_mk/packages/nest
````
{'author': 'Gavin Adams (me@gavinadams.org)',
 'description': 'Nest Home Automation checks of thermostat',
 'download_url': 'https://github.com/gadams999/check_mk/',
 'files': {'agents': ['special/agent_nest'],
           'checkman': ['nest_humidity', 'nest_temp', 'nest_thermostat'],
           'checks': ['agent_nest',
                      'nest_humidity',
                      'nest_temp',
                      'nest_thermostat'],
           'doc': [],
           'notifications': [],
           'pnp-templates': ['check_mk-nest_humidity.php',
                             'check_mk-nest_temp.php',
                             'check_mk-nest_thermostat.php'],
           'web': ['plugins/perfometer/nest_thermostat.py',
                   'plugins/wato/check_parameters_nest.py',
                   'plugins/wato/datasource_programs_nest.py']},
 'name': 'nest',
 'title': 'Nest Home Automation',
 'version': '0.91',
 'version.min_required': '1.2.4p5',
 'version.packaged': '1.2.4p5'}
````

Pack package:

[dev]$ cmk -P pack nest
[dev]$ mv nest-x.xx.mkp /tmp/nest.pkg

Replace the current package before tagging

