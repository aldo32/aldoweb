package com.mark1.aldo.mark1.util;

/**
 * Created by aldo on 25/05/15.
 */
public class Tarea {
    private String nombre;
    private String fecha;
    private int categoria;

    public Tarea(String nombre, String fecha, int categoria){
        this.nombre = nombre;
        this.fecha = fecha;
        this.categoria = categoria;
    }

    public void setNombre(String nombre){
        this.nombre = nombre;
    }

    public void setFecha(String fecha){
        this.fecha = fecha;
    }

    public void setCategoria(int categoria){
        this.categoria=categoria;
    }

    public String getNombre(){return nombre;}
    public String getFecha(){return fecha;}
    public int getCategoria(){return categoria;}
}
