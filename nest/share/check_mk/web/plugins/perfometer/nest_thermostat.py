# check

def perfometer_nest_thermostat (row, check_command, perf_data):
    leaf = int(perf_data[0][1])
    if leaf == 1:
        return "Has Leaf", perfometer_linear(50, '#00ff00')
    else:
        return "No Leaf", perfometer_linear(50, '#ff0000')

perfometers['check_mk-nest_thermostat'] = perfometer_nest_thermostat


def perfometer_nest_humidity (row, check_command, perf_data):
    rh = int(perf_data[0][1])
    return "%d%% RH" % rh, perfometer_linear(rh, '#0080ff')

perfometers['check_mk-nest_thermostat'] = perfometer_nest_thermostat
perfometers['check_mk-nest_humidity'] = perfometer_nest_humidity

