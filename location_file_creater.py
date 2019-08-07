import paho.mqtt.client as mqttClient
import time
import json
import webbrowser

def on_connect(client, userdata, flags, rc):

    if rc == 0:

        print("Connected to broker")

        global Connected                #Use global variable
        Connected = True                #Signal connection

    else:

        print("Connection failed")


def on_message(client, userdata, message):
	if(message.payload):
            with open("location.json", 'w') as json_file:
                    #dict = JSONEncoder().encode(message.payload)
                    json.dumps(message.payload, json_file)
            print "Message received: "  + message.payload
            webbrowser.open('http://localhost:88/php-mqtt-osm/noob.php') #vayen nice
            #webbrowser.open('C:\xampp\htdocs\php-mqtt-osm\map.php')
            #webbrowser.open('http://www.google.com') #opens webpage




Connected = False   #global variable for the state of the connection

broker_address= "beta-admin.easy-q.online"
port = 1883
user = "rtsmqtt"
password = "rtsmqttpassword123*#"           #Connection password


client = mqttClient.Client("RTS666")          #create new instance
client.username_pw_set(user, password=password)    #set username and password
client.on_connect= on_connect                      #attach function to callback
client.on_message= on_message                      #attach function to callback

client.connect(broker_address, port=port)          #connect to broker

client.loop_start()        #start the loop

while Connected != True:    #Wait for connection
    time.sleep(0.1)

client.subscribe("RTS666/wififire") #RTS666/wififire??

try:
    while True:
        time.sleep(1)

except KeyboardInterrupt:
    print "exiting"
    client.disconnect()
    client.loop_stop()
