F_half = open('extracted_sec').read()
S_half = open('half').read()

F_buff = []
S_buff = []

for i in range(0 ,len(F_half) , 1024):
	tt = ''
	for j in range(1024):
		if( i+j < len(F_half)):
			tt += F_half[j+i]
	
	F_buff.append(tt)
	  
#print(len(F_buff))


for i in range(0 ,len(S_half) , 1024):
	tt = ''
	for j in range(1024):
		if( i+j < len(S_half)):
			tt += S_half[j+i]
	
	S_buff.append(tt)
	  
#print(len(S_buff))

collected = [] 
F=0
S=0
for i in range(len(F_buff)+len(S_buff)):
	if(i%2 == 0 ):
		collected.append(F_buff[F])
		F +=1
		print(F)
	else :
		collected.append(S_buff[S])
		S += 1 
	

f= open("Collected" ,"w+")
f.write((''.join(collected)))
f.close()
