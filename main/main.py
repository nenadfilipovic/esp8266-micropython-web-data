from main.post_data import post_data
from main.get_credentials import get_credentials
from main.connect_wifi import connect_wifi

# Define authentication key
auth_key_client = "1234"
# Get user data from input function
input_credentials = list(get_credentials())
# Pass that data into function that connects to wifi and logs return data
wifi_info = connect_wifi(input_credentials[0], input_credentials[1])
# Convert returned data to list and add auth key to them
wifi_info = list(wifi_info)
wifi_info.append(auth_key_client)
# Send POST message
post_data(wifi_info)
