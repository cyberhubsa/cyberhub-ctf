#!/bin/bash
 
str="47 72 65 65 61 74 69 6e 67 73 20 79 6f 75 20 67 6f 74 20 74 68 65 20 66 6c 61 67 20 43 59 42 45 52 48 55 42 7b 4e 30 5f 50 61 69 6e 5f 4e 30 5f 47 34 69 6e 7d"
IFS=' ' # space is set as delimiter
read -ra ADDR <<< "$str" # str is read into an array as tokens separated by IFS
for i in "${ADDR[@]}"; do # access each element of array
    echo "$i"
done
