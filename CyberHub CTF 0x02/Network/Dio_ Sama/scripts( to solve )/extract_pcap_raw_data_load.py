from scapy.all import * 

scapy_cap = rdpcap('sec.pcapng')
sele = []
for i in scapy_cap:
	try : 
		x = len(i[Raw])
		if x > 1000 and i.dport == 5555 : 
			sele.append((i[Raw].load)[:1024])
	except : 
		s = 0 

f = open('extracted_sec' , 'w+')
	
f.write(''.join(sele))

f.close() 

