#!C:Python27/python
print("Content-Type: text/html")
print()
import cgi
import time
import paho.mqtt.client as paho
address = "beta-admin.easy-q.online"
port = 1883
topic = "RTS666/wififire"
clientid = "b535052417f74ca88c2d2568035a6039"
username = "rtsmqtt"
password = "rtsmqttpassword123*#"
#define callback
def on_message(client, userdata, message):
    time.sleep(1)
    print("received message =",str(message.payload.decode("utf-8")))

client= paho.Client("client-001") #create client object client1.on_publish = on_publish #assign function to callback client1.connect(broker,port) #establish connection client1.publish("house/bulb1","on")
######Bind function to callbackexit
client.on_message=on_message
#####
print("connecting to broker ",broker)
client.connect(broker)#connect
client.loop_start() #start loop to process received messages
print("subscribing ")
client.subscribe("RTS666/wififire")#subscribe
time.sleep(2)
client.disconnect() #disconnect
client.loop_stop() #stop loop
