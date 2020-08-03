# Define function
def get_credentials():
    # Ask user to enter network name
    print("Please enter network name:")
    input_name = input()
    print("Please enter password for selected network:")
    input_password = input()
    return input_name, input_password
