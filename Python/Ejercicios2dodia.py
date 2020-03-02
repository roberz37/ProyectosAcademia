#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Tue Dec  3 12:51:07 2019

@author: zaccarellors

"""

#Sumatoria de todos los numeros de la lista
#lista[0]+lista[1]+lista[2]+...
def sumatoria(lista):
    i=0
    resultado=0
    while i< len(lista):
        resultado= resultado+lista[i]
        i=i+1
    return resultado  
        

edades = [22, 24, 44, 33]
print(sumatoria(edades))
# 123


#me devuelve la lista modificada con todos los numeros
#multiplicados por "multiplo"
def duplicar_todo_por(lista, multiplo):
    i=0
    while i < len(lista):
        lista[i] = lista[i]* multiplo
        i=i+1

numeros = [1, 2, 3]
duplicar_todo_por(numeros, 3)
print(numeros)
# [3, 6, 9]


#Te devuelve si numero esta dentro de la lista
def esta_en_lista(lista, numero):
    i=0
    while i < len(lista):
        if (lista[i] == numero):
            return True   
        i=i+1
        
    return False 


codigo_de_cursos = ["aka101", "php", "carpinteria"]

if esta_en_lista(codigo_de_cursos, "carpinteria"):
    print("Genial, existe el curso de carpinteria")
else:
    print("Mmmm, no deberia imprimir esto")

if esta_en_lista(codigo_de_cursos, "cafeteria"):
    print("Mmmm, no deberia imprimir esto")
else:
    print("Claro, no hay curso de cafeteria :( ")
    