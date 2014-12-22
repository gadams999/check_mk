# check

def perfometer_nest_thermostat (row, check_command, perf_data):
    leaf = int(perf_data[0][1])
    if leaf == 1:
        return "Has Leaf!", perfometer_linear(100, '#00ff00')
    else:
        return "No Leaf", perfometer_linear(100, '#ff0000')

perfometers['check_mk-nest_thermostat'] = perfometer_nest_thermostat
