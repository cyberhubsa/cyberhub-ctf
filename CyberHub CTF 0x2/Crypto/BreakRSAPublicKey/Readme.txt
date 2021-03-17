name: FindPw
flag:CYBERHUB{Short_Prime_iS_Problem}
desc:We found those two files on compromised computer, can you decrypt that file that called Ciphertext
flagformat: CYBERHUB{<ASCII>}
points: level2
time to solve: 7-10 min -- if they knows about OpenSSL 
Subject:Cryptography
Skill to test: How to use OpenSSL and factorize RSA public key



Steps to solve

1- openssl rsa -in file.der -inform DER -text -noout -pubin
2- take the public key and convert this value to decimal
3- factorize the publickey in factordb.com
4- from p,q generate privatekey -- using rsatool
5- openssl rsautl -inkey private.pem -in CipherText -decrypt

Notes
1- they have to identify that file.der is the public key in RSA -- DER format is well knows format for keys, anyway file will have icon of certificate in GUI 
