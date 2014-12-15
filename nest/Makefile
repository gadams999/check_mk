SITE = dev
COPY_FILES = check/nest

all: 

	@echo "Installing all scripts to site: ${SITE}"

	sudo cp -p share/check_mk/web/plugins/wato/* /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/*

	sudo cp -p share/check_mk/agents/special/agent_nest /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest

	sudo cp -p share/check_mk/checks/* /omd/sites/${SITE}/local/share/check_mk/checks/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/checks/*

	sudo cp -p share/check_mk/pnp-templates/* /omd/sites/${SITE}/local/share/check_mk/pnp-templates/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/pnp-templates/*

#	sudo cp pnp4nagios/check_mk-nest.temp.php /omd/sites/${SITE}/local/share/check_mk/pnp-templates/check_mk-nest.temp.php
