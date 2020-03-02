#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Fri Dec  6 09:50:29 2019

@author: zaccarellors
"""
import random


def generar_bosque_vacio(tamano_bosque):
    i=0
    bosque_vacio=[]
    while i < tamano_bosque:
        bosque_vacio.append(0)
        i=i+1
    return bosque_vacio

def suceso_aleatorio(probabilidad):
    resultado = random.randint(0,10)
    if resultado < probabilidad*10:
        return True
    
    return False

def brotes(bosque_a_sembrar, probabilidad):
    i=0
    while i< len(bosque_a_sembrar):
        if suceso_aleatorio(probabilidad):
            bosque_a_sembrar[i]=1
        i=i+1
        
def cuantos(bosque, tipo_celda):
    resultado=bosque.count(tipo_celda)
    return resultado

def rayos(bosque, f):
    i=0
    while i < len(bosque):
        resultado = random.random()
        if resultado < f and bosque[i]==1:
            bosque[i]=-1
        i=i+1

def propagacion(bosque):
    i=0
    while i < len(bosque)-1:
        j=i
        if bosque[i]==-1 and bosque[i+1]==1:
            bosque[i+1]=-1
        
        while bosque[j]==-1 and bosque[j-1]==1 and j>0:
            bosque[j-1]=-1
            j=j-1        
        i=i+1
        
        
def limpieza(bosque):
    i=0
    while i < len(bosque):
        if bosque[i]==-1:
            bosque[i]=0
        i=i+1

def animar_etapa(bosque):
    i=0
    bosque_lindo = [0] * len(bosque)
    while i < len(bosque):
        if bosque[i] == 1:
            bosque_lindo[i] = "\U0001F332"
        elif bosque[i] == -1:
            bosque_lindo[i] = "\U0001F525"
        elif bosque[i] == 0:
            bosque_lindo[i] = " "
        i+=1
    return bosque_lindo
       
def implementacion_bosque(bosque, probabilidad_brotes, probabilidad_rayos):
    
    
    brotes(bosque, probabilidad_brotes)
    print("PRIMAVERA!")
    print(animar_etapa(bosque))
    print("")
    rayos(bosque, probabilidad_rayos)
    print("CAIDA DE RAYOS!")
    print(animar_etapa(bosque))
    print("")
    propagacion(bosque)
    print("PROPAGACION!")
    print(animar_etapa(bosque))
    print("")
    limpieza(bosque)
    print("LIMPIEZA!")
    print(animar_etapa(bosque))

  
bosque= generar_bosque_vacio(27)  
i=0
while i<1:
    implementacion_bosque(bosque, 0.6, 0.5)    
    i=i+1


    