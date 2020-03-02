#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Wed Dec 11 10:53:21 2019

@author: zaccarellors
"""
# =============================================================================
# Valores
# 0: espacio Vacio
# 6: Pacman
# 1: Pared
# 7,8,9: Fantasmas
# 2: Puntitos 
# =============================================================================
import numpy as np
import random as rn
import sys
import select
import termios
import contextlib
from IPython.display import clear_output

def crearTablero(filas, columnas):
    tablero = np.repeat(0, filas*columnas).reshape(filas, columnas)
    i=0
    while i < columnas:
        tablero[(0,i)]= 1
        tablero[(filas-1), i]= 1
        i=i+1    
    j=0
    while j < filas:
        tablero[(j, columnas-1)]= 1
        tablero[(j, 0)]= 1
        j=j+1
    return tablero
    
   
def rellenarTablero(tablero):
    listaParedes=[(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(2,2),(2,3),(2,10),(2,11),(2,18),(2,19),(3,5),(3,7),(3,8),(3,10),(3,11),(3,13),(3,14),(3,16),(4,2),(4,3),(4,4),(4,5),(4,7),(4,8),(4,13),(4,14),(4,16),(4,17),(4,18),(4,19),(5,2),(5,3),(5,4),(5,5),(5,7),(5,8),(5,9),(5,12),(5,13),(5,14),(5,16),(5,17),(5,18),(5,19),(7,1),(7,2),(7,5),(7,8),(7,9),(7,10),(7,11),(7,12),(7,13),(7,16),(7,19),(7,20),(8,1),(8,2),(8,4),(8,5),(8,6),(8,8),(8,9),(8,10),(8,11),(8,12),(8,13),(8,15),(8,16),(8,17),(8,19),(8,20),(9,1),(9,2),(9,4),(9,5),(9,16),(9,17),(9,19),(9,20),(10,1),(10,2),(10,5),(10,6),(10,7),(10,9),(10,10),(10,11),(10,12),(10,14),(10,15),(10,16),(10,19),(10,20),(11,1),(11,2),(11,3),(11,5),(11,6),(11,7),(11,9),(11,10),(11,11),(11,12),(11,14),(11,15),(11,16),(11,18),(11,19),(11,20),(12,1),(12,2),(12,3),(12,5),(12,10),(12,11),(12,16),(12,18),(12,19),(12,20),(13,5),(13,7),(13,8),(13,10),(13,11),(13,13),(13,14),(13,16),(14,2),(14,3),(14,5),(14,16),(14,18),(14,19),(15,2),(15,5),(15,8),(15,9),(15,10),(15,11),(15,12),(15,13),(15,16),(15,19),(17,2),(17,4),(17,5),(17,6),(17,7),(17,8),(17,10),(17,11),(17,13),(17,14),(17,15),(17,16),(17,17),(18,2),(18,8),(18,13),(18,19),(19,2),(19,4),(19,5),(19,6),(19,15),(19,16),(19,17),(19,19),(20,4),(20,5),(20,6),(20,7),(20,8),(20,9),(20,10),(20,11),(20,12),(20,13),(20,14),(20,15),(20,16),(20,17)]
    for i in range(0, len(listaParedes)):
        tablero[(listaParedes[i])]=1
    
        
            
def posicionesIniciales(tablero):
    tablero[(14,10)]=6
    tablero[(6,11)]=7
    tablero[(8,7)]=8
    tablero[(8,14)]=9
    
    
    
def moverPacman(tablero, tecla):
    pacman= buscarPacman(tablero)
    x=pacman[0]
    y=pacman[1]
    if tecla == "w" and tablero[x-1,y]!= 1:
        tablero[x-1,y]= tablero[pacman]
        tablero[pacman]= 0
    if tecla == "a" and tablero[x, y-1] != 1:
        tablero[x,y-1]= tablero[pacman]
        tablero[pacman]= 0
    if tecla == "s" and tablero[x+1,y]!= 1:
                tablero[x+1,y]= tablero[pacman]
                tablero[pacman]= 0
    if tecla == "d" and tablero[x,y+1]!= 1:
                tablero[x,y+1]= tablero[pacman]
                tablero[pacman]= 0

def moverFantasmas(tablero):
    fantasmas= buscarFantasmas(tablero)
    for i in range(0, len(fantasmas)):
        
        comer=buscar_adyacente(tablero, fantasmas[i])
        if 6 in comer:            
            return False
        
        mover=buscar_adyacente(tablero, fantasmas[i])
        if len(mover)>0:
            tablero[mover[0]]= tablero[fantasmas[i]]
            tablero[fantasmas[i]]= 0
    
       
def misVecinos(coord):
    adyacentes=[]
    x=coord[0]
    y=coord[1]
    prioridad=[(x-1,y),(x,y+1),(x+1,y),(x,y-1)]
    for i in prioridad:
        if ((i[0]>0) and (i[1]>0)):
            adyacentes.append(i)
    rn.shuffle(adyacentes)
    return adyacentes
                    
def buscar_adyacente(tablero, coord):
    lista=[]
    for vecino in misVecinos(coord):
        if tablero[vecino]==0 or tablero[vecino]==6:
            lista.append(vecino)
            return lista
    return []

def printTablero(tablero):
    pass

def buscarPacman(tablero):
    n_fila = tablero.shape [0]
    n_col = tablero.shape [1]
    for i in range (1, n_fila-1) :
        for j in range (1, n_col-1):
            if tablero[(i,j)]==6:
                return ((i,j))
                
def buscarFantasmas(tablero):
    fantasmas=[7,8,9]
    coordFantasmas=[]
    n_fila = tablero.shape [0]
    n_col = tablero.shape [1]
    for i in range (1, n_fila-1) :
        for j in range (1, n_col-1):
            if tablero[(i,j)] in fantasmas:
                coordFantasmas.append((i,j))
    return coordFantasmas

def graficar(tablero):         
    k=0
    for i in range(tablero.shape[0]):
        for j in range(tablero.shape[1]):
            if i!=k:
                print()
                k+=1
            if tablero[(i,j)]==0:
                print(chr(0x00002B1C),end="")
            if tablero[(i,j)]==1:
                print(chr(0x00002B1B),end="")
            if tablero[(i,j)]==2:
                print(chr(0x000026AB),end="")
            if tablero[(i,j)]==6:
                print(chr(0x0001F617),end="")
            if tablero[(i,j)]==7 or tablero[(i,j)]==8 or tablero[(i,j)]==9:
                print(chr(0x0001F47B),end="")
    print()
    print()

def TDD_crearTablero(tablero):
    for i in range(0, tablero.shape[0]):
        for j in range(0, tablero.shape[1]):
           assert tablero[(i,0)]==1
           assert tablero[(i,tablero.shape[1]-1)]==1
           assert tablero[(0, j)]==1
           assert tablero[(j, tablero.shape[1]-1)]==1
    for i in range(1, tablero.shape[0]-1):
        for j in range(1, tablero.shape[1]-1):
            assert tablero[(i,j)]==0

# =============================================================================
# def TDD_rellenarTablero(tablero):
#     for i in range(0, tablero.shape[0]):
#         for i in range(0, tablero.shape[1]):
# =============================================================================
            
    


def TDD_misVecinos(vecinos):
    c=(1,1)
    vecinos=misVecinos(c)
    assert len(vecinos)==4
    assert (0,0) in vecinos
    assert (19,19) in vecinos

           
tablero= crearTablero(22,22)
TDD_crearTablero(tablero)
rellenarTablero(tablero)
posicionesIniciales(tablero)
# =============================================================================
# graficar(tablero)
# pacman=(0,0)
# fantasmas=[]
# 
# while 10 not in fantasmas:
#     moverFantasmas(tablero)
#     moverPacman(tablero)
#     graficar(tablero)
#     fantasmas=buscarFantasmas(tablero)
#     pacman=buscarPacman(tablero)
# =============================================================================

@contextlib.contextmanager
def decanonize(fd):
    old_settings = termios.tcgetattr(fd)
    new_settings = old_settings[:]
    new_settings[3] &= ~termios.ICANON
    termios.tcsetattr(fd, termios.TCSAFLUSH, new_settings)
    yield termios.tcsetattr(fd, termios.TCSAFLUSH, old_settings)

with decanonize(sys.stdin.fileno()):
    try:
        while True:
            i,o,e = select.select([sys.stdin],[],[],1)
            if i and i[0] == sys.stdin:
                tecla = sys.stdin.read(1)
                
                
                ###########
                # la variable tecla dice que tecla presionaron
                # completar con la logica de mover el pacman y los fantasmas
                moverPacman(tablero, tecla)
                moverFantasmas(tablero)
                
                ###########
                
                clear_output()
                
                ###########
                # Aca se imprime el tablero
                graficar(tablero)
                ###########
                
    except KeyboardInterrupt:
        pass