#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Dec  5 10:31:28 2019

@author: zaccarellors
"""

import random
import numpy as np

def esta_en (lista, elemento):
    i=0
    while i < len(lista):
        if lista[i]==elemento:
            return True
        i=i+1
    return False


   

def comprar_figurita(cant_fig_album):
    figurita = random.randint(0, cant_fig_album-1)
    return figurita

def cuantas_figuritas(cantidad_fig_album):
    i=0
    album=[]
    while i< cantidad_fig_album:
        album.append(0)
        i=i+1
    contador=0    
    while esta_en(album, 0):
       album[comprar_figurita(cantidad_fig_album)]=1
       contador=contador+1
    return contador




def n_repeticiones(numero_repeticiones, figus_totales):
    i=0
    lista=[]
    while i < numero_repeticiones:
        lista.append(cuantas_figuritas(figus_totales))
        i=i+1
    promedio = np.mean(lista)
    return promedio



def generar_paquete(figus_total,figus_paquete):
    i=0
    paquete=[]
    while i < figus_paquete:
        paquete.append(comprar_figurita(figus_total))
        i=i+1
    return paquete
    
    
def cuantos_paquetes(figus_total, figus_paquete):
    i=0
    album=[]
    contador=0
    while i < figus_total:
        album.append(0)
        i=i+1
    while esta_en(album, 0):
        paquete=generar_paquete(figus_total, figus_paquete)
        j=0
        while j < figus_paquete:
            album[paquete[j]]=1
            j=j+1
        contador=contador+1
    return contador
 
  

def n_repeticiones_paquetes(numero_repeticiones, figus_totales):
    i=0
    lista=[]
    while i < numero_repeticiones:
        auxiliar= cuantos_paquetes(figus_totales, 5)
        lista.append(auxiliar)
        i=i+1
        
    promedio = np.mean(lista)
    return promedio    

print(n_repeticiones_paquetes(6, 266))  





        
        