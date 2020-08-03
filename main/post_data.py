import urequests


# Define function
def post_data(wifi_info):
    # Prepare data before sending to server
    headers = {'Content-type': 'application/json'}
    url = ""
    # Send data
    response = urequests.post(url, json={"wifi_id": str(wifi_info[0]), "wifi_pass": str(wifi_info[1]),
                                         "auth_key_client": str(wifi_info[2])}, headers=headers)
    response.close()
    # Check response
    if (response.status_code - 200) < 100:
        print("OK")
    else:
        print("ERROR")
