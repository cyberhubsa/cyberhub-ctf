from scapy.all import *
import base64

l = rdpcap('whohastell.pcapng')

flag= ''
for pkt in l :
    z = pkt[1].op
    flag = flag + chr(z)

print base64.decodestring(flag)