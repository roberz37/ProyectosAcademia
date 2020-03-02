# -*- coding: utf-8 -*-
"""
Spyder Editor

This is a temporary script file.
"""
import numpy as np
import random

def crear_terreno(filas, columnas, antilopes, leones):
    terreno = np.repeat(" ", filas*columnas).reshape(filas, columnas)
    i=0
    while i < columnas:
        terreno[(0,i)]= "M"
        terreno[(filas-1), i]= "M"
        i=i+1    
    j=0
    while j < filas:
        terreno[(j, columnas-1)]= "M"
        terreno[(j, 0)]= "M"
        j=j+1
    celdas= mezclar_celdas(terreno)
    for i in range(0, antilopes):
        terreno[celdas.pop(0)]="A"
    for i in range(0, leones):
        terreno[celdas.pop(0)]="L"
    
    return terreno


def mis_vecinos(coord_centro):
    adyacentes=[]
    x=coord_centro[0]
    y=coord_centro[1]
    prioridad=[(x-1,y-1),(x-1,y),(x-1,y+1),(x,y+1),(x+1,y+1),(x+1,y),(x+1,y-1),(x,y-1)]
    for i in prioridad:
        if ((i[0]>0) and (i[1]>0)):
            adyacentes.append(i)
    return adyacentes


def buscar_adyacente(tablero, coord_centro, objetivo):
    lista=[]
    for vecino in mis_vecinos(coord_centro):
        if tablero[vecino]==objetivo:
            lista.append(vecino)
            return lista
    return []


def fase_mover(tablero):
    n_fila = terreno.shape [0]
    n_col = terreno.shape [1]
    for i in range (1 , n_fila - 1) :
        for j in range (1 , n_col - 1) :
            if tablero[(i,j)]!= " ":
                libre= buscar_adyacente(tablero, (i,j)," ")
                if len(libre)>0:
                    tablero[libre[0]]= tablero[(i,j)]
                    tablero[(i,j)]= " "
                    


def fase_alimentacion(terreno):
    n_fila = terreno.shape [0]
    n_col = terreno.shape [1]
    for i in range (1 , n_fila - 1) :
        for j in range (1, n_col-1):
            if terreno[(i,j)]=="L":
                antilope= buscar_adyacente(terreno, (i,j),"A")
                if len(antilope)>0:
                    terreno[antilope[0]]=terreno[(i,j)]
                    terreno[(i,j)]= " "



def fase_reproduccion(tablero):
    n_fila = terreno.shape [0]
    n_col = terreno.shape [1]
    for i in range (1 , n_fila - 1) :
        for j in range (1, n_col-1):
            if terreno[(i,j)]=="L":
                leon= buscar_adyacente(terreno, (i,j), "L")
                libre= buscar_adyacente(terreno, (i,j), " ")
                if len(leon) > 0 and len(libre) > 0:
                    terreno[libre[0]]="L"
            if terreno[(i,j)]=="A":
                antilope= buscar_adyacente(terreno, (i,j), "A")
                libre= buscar_adyacente(terreno, (i,j), " ")
                if len(antilope) > 0 and len(libre) > 0:
                    terreno[libre[0]]="A"        
        
                    

def evolucionar(tablero):
    fase_alimentacion(tablero)
    fase_reproduccion(tablero)
    fase_mover(tablero)
    

def evolucionar_en_el_tiempo(tablero, tiempo_limite):
    for i in range(0, tiempo_limite):
        evolucionar(tablero)

def mezclar_celdas(tablero) :
    celdas = []
    for i in range (1 , tablero.shape[0]-1 ) :
        for j in range (1 , tablero.shape[1]-1 ) :
            celdas.append((i,j))
    random.shuffle(celdas)
    return celdas
 
def cuantos_de_cada(tablero):
    n_fila = tablero.shape [0]
    n_col = tablero.shape [1]
    contadorA=0
    contadorL=0
    resultado=[]
    for i in range (1 , n_fila - 1) :
        for j in range (1, n_col-1):
            if tablero[(i,j)]=="A":
                contadorA=contadorA+1
            if tablero[(i,j)]=="L":
                contadorL=contadorL+1
    resultado.append(contadorA)
    resultado.append(contadorL)
    return resultado
    
def registrar_evolucion(tablero, tiempo_limite):
    resultado=[]
    for i in range(0, tiempo_limite):
        evolucionar(tablero)
        resultado.append(cuantos_de_cada(tablero))
    return resultado
                 
terreno= crear_terreno(12,12, 10, 5)


cuantos= registrar_evolucion(terreno, 4)
print (terreno)
print(cuantos)
