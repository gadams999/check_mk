SITE = dev
COPY_FILES = check/nest

all: 

	@echo "Installing all scripts to site: ${SITE}"
#	sudo cp -p checks/check_nest /omd/sites/${SITE}/local/share/check_mk/checks/check_nest
#	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/checks/check_nest

	sudo cp -p share/check_mk/web/plugins/wato/datasource_programs_nest.py /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/datasource_programs_nest.py
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/datasource_programs_nest.py

	sudo cp -p share/check_mk/agents/special/agent_nest /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest

	sudo cp -p share/check_mk/checks/* /omd/sites/${SITE}/local/share/check_mk/checks/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/checks/*
#	sudo cp -p nagios/plugins/check_nest /omd/sites/${SITE}/local/lib/nagios/plugins/check_nest
#	sudo chown dev.dev /omd/sites/${SITE}/local/lib/nagios/plugins/check_nest

#	sudo cp pnp4nagios/check_mk-nest.temp.php /omd/sites/${SITE}/local/share/check_mk/pnp-templates/check_mk-nest.temp.php
