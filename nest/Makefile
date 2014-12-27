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

# Quick way to develop outside of an OMD site
# ASSUMPTIONS: User and Group both dev, user executing make has sudo
#              permissions

SITE = dev
COPY_FILES = check/nest

all: 

	@echo "Installing all scripts to site: ${SITE}"

	sudo cp -p share/check_mk/web/plugins/wato/* /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/web/plugins/wato/*

	sudo cp -p share/check_mk/web/plugins/perfometer/* /omd/sites/${SITE}/local/share/check_mk/web/plugins/perfometer/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/web/plugins/perfometer/*

	sudo mkdir -p /omd/sites/${SITE}/local/share/check_mk/agents/special
	sudo cp -p share/check_mk/agents/special/agent_nest /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/agents/special/agent_nest

	sudo cp -p share/check_mk/checks/* /omd/sites/${SITE}/local/share/check_mk/checks/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/checks/*

	sudo cp -p share/check_mk/pnp-templates/* /omd/sites/${SITE}/local/share/check_mk/pnp-templates/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/pnp-templates/*

	sudo cp -p share/check_mk/checkman/* /omd/sites/${SITE}/local/share/check_mk/checkman/
	sudo chown dev.dev /omd/sites/${SITE}/local/share/check_mk/checkman/*
