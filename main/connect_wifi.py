import network


# Define function
def connect_wifi(wifi_name, wifi_password):
    # Define wifi objects
    station_mode = network.WLAN(network.STA_IF)
    ap_mode = network.WLAN(network.AP_IF)
    # Disable access point
    ap_mode.active(False)
    # Connect to selected network
    if not station_mode.isconnected():
        print("Connecting to network...")
        station_mode.active(True)
        station_mode.connect(wifi_name, wifi_password)
        while not station_mode.isconnected():
            pass
    # Print ip address and other data after connecting to network
    print("Connected to network:", wifi_name)
    print("Network config:", station_mode.ifconfig())
    return wifi_name, wifi_password
