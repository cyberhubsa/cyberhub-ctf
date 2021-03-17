def enc(x):
    bin = ''.join(format(ord(i)+Digit, '08b') for i in x)
    return bin.replace('0','-').replace('1','+')