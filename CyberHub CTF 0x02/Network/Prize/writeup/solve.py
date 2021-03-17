f = open('stream.txt','r').read()

data2 = f.replace('-','0').replace('+','1').replace('\n','')
print data2 

str_data = ''
for i in range(0, len(data2), 8):
    temp_data = int(data2[i:i + 8],2) 
    str_data = str_data + chr(temp_data-3)  
print(str_data)
