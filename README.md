# ESP8266 Micropython web data

Building basic script that will enable esp8266 boards to send data to website.

## Getting Started

Clone this repository

```
git clone https://github.com/nenadfilipovic/esp8266-micropython-web-data
```

### Prerequisites

For this to work you will need to download MicroPython image from http://micropython.org/download and flash it to the ESP8266 board.
You will also need esptool to be able to flash image to board.

```
pip install esptool
```

Then erase your esp8266 board.
Which port you use depends what operating system you are using.

```
MAC OS - esptool.py --port /dev/ttyUSB0 erase_flash
```

or

```
WINDOWS OS - esptool.py --port COM4 erase_flash
```

After you connect board to PC go to 'Device Manager' and under 'Ports' find at which port is your board connected.
If there is no device connected you need to install serial drivers from
https://sparks.gogo.co.nz/assets/_site_/downloads/CH34x_Install_Windows_v3_4.zip.

Then you will be able to deploy firmware to esp8266 board.

```
esptool.py -p COM4 --baud 460800 write_flash --flash_size=detect 0 /Users/You/Downloads/esp8266–20170612-v1.9.1.bin
```

Now connect to your esp8266 board with Putty or some other terminal program and check if board greets you with micropython terminal.

### Installing

First you want to go to phpMyAdmin and create database and save somewhere username, password, database name.

After that edit all php files and change username, password, database name in each file and add auth key in post_data.php file. Be careful to match auth_key_server and auth_key_client or script won't work.

```
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "mydb";
```

```
    $auth_key_server = "1234";
```

Upload all php files to your hosting, run install.php file by navigating to it from your browser. Table should be created and message will show you if you successfully created table.
In main.py it is important to add auth key that needs to be same as in post_data.php, in send_data.py fle you must add your website url.

```
    auth_key_client = "1234";
```

```
    url = "your website url"
```

Now upload main folder and main.py file to your esp8266 board, board will ask you to input your network name and password but you can change that in code to connect automatically after boot.
After connecting to wifi board will send data to display_data.php file into mysql table, if we want to access data just navigate to display_data.php which will present data in form of table.

If board gives you error on starup just hit Ctrl+D to soft reboot board, board gives errors because it waits for user to type in wifi pass and ssid.


## Running the tests

-

### Break down into end to end tests

-

### And coding style tests

-

## Deployment

Upload your PHP files to hosting and upload code to ESP8266 board.

## Built With

* [MicroPython](http://micropython.org/download)
* [PHP](https://www.php.net/)

## Authors

* **Nenad Filipovic** - *Initial work* - [nenadfilipovic](https://github.com/nenadfilipovic)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

-