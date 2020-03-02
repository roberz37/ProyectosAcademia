#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Tue Dec  3 10:38:04 2019

@author: zaccarellors


lista_de_100 = []
def llenar_lista(una_lista):
    i=0
    while i< 100:
        una_lista.append(1+i)
        i=i+1
        
def imprimir_inverso(una_lista):
    i=len(una_lista)-1
    while i>=0:
        print(una_lista[i])
        i=i-1

def imprimir_cada_dos(una_lista):
    i=0
    while i< len(una_lista):
        print(una_lista[i])
        i=i+2

llenar_lista(lista_de_100)
imprimir_inverso(lista_de_100)
imprimir_cada_dos(lista_de_100)
"""
lista_de_10 = [1,2,3,4,5,6,7,8,9,3]

def imprimir_numero_cant_veces(una_lista):
    i=0
    while i<len(una_lista):
        j=0
        while j< una_lista[i]:
            print(una_lista[i])
            j=j+1
        i=i+1
imprimir_numero_cant_veces(lista_de_10)