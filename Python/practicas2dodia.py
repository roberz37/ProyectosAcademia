#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Tue Dec  3 13:53:49 2019

@author: zaccarellors


def mas_larga (l1,l2) :
    
    if len(l1) > len(l2):
        res = l1
    else:
        res = l2
    return res

print (mas_larga("pepe","chirizo"))


def cant_e(una_lista):
    i=0
    count=0
    while i< len(una_lista):
        if una_lista[i]== 'e':
            count = count+1
        i=i+1
    return count
print(cant_e("holeeee"))
"""
 
lista=["perro,gato,cocodrilo,leon"]

def esta_en(una_lista, elemento):
    i=0
    while i<len(una_lista):
        if una_lista[i]==elemento:
            return True
        i=i+1
    return False


def cambiar_las_vocales(lista):
    lst=list(lista)
    i=0
    while i< len(lst):
        if esta_en(["a","e","i","o","u"], lst[i]):
            lst[i]="-"
        i=i+1
    return lst

print(cambiar_las_vocales(lista))