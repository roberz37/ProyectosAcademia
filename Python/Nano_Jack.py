#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Wed Dec  4 11:22:51 2019

@author: zaccarellors
"""
import random

def generar_mazos(cantidad_mazos):
    i=0
    mazos_mezclados=[]
    while i < 4*cantidad_mazos:
        j=1
        while j <= 13:
            mazos_mezclados.append(j)
            j=j+1
        i=i+1
    random.shuffle(mazos_mezclados)
    
    return mazos_mezclados



def jugar(un_mazo):
    resultado=0
    while resultado < 21 and len(un_mazo) > 0:
        resultado=resultado+un_mazo[0]
        un_mazo.pop(0)
        if len(un_mazo)-1==0:
            resultado=0
    return resultado




def jugar_varios(un_mazo, cantidad_jugadores):
    i=0
    resultados=[]
    while i < cantidad_jugadores:
        resultados.append(jugar(un_mazo))
        i=i+1
    return resultados

def quien_gano(una_lista):
    i=0
    resultados=[]
    while i< len(una_lista):
        if una_lista[i]==21:
            resultados.append(1)
        else:
            resultados.append(0)
        i=i+1
    return resultados

def experimentar(repeticiones, cant_jugadores):
    j=0
    i=0
    mazo=[]
    cantidad_ganados=[]
    while j< cant_jugadores:
        cantidad_ganados.append(0)
        j=j+1    
    while i < repeticiones:
        mazo=generar_mazos(1)    
        resultados_primarios=jugar_varios(mazo, cant_jugadores)
        resultados = quien_gano(resultados_primarios)    
        k=0
        while k < cant_jugadores:
            if resultados[k] == 1:
                cantidad_ganados[k]=cantidad_ganados[k]+1
                
            k=k+1
        i=i+1
    return cantidad_ganados

print(experimentar(5, 6))