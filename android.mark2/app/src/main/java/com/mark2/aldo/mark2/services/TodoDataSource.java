package com.mark2.aldo.mark2.services;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.provider.BaseColumns;
import android.util.Log;
import android.widget.Toast;

/**
 * Created by aldo on 25/05/15.
 */
public class TodoDataSource {
    //Metainformación de la base de datos
    public static final String TODOS_TABLE_NAME = "Todos";
    public static final String STRING_TYPE = "text";
    public static final String INT_TYPE = "integer";

    private TodoReaderDbHelper openHelper;
    private SQLiteDatabase database;

    //Scripts de inserción por defecto
    public static final String INSERT_QUOTES_SCRIPT =
            "insert into " + TODOS_TABLE_NAME + " values(null, 'Tarea de prueba 1', 0, '2015-05-25')";

    //Script de Creación de la tabla Todos
    public static final String CREATE_TODOS_SCRIPT =
            "create table " + TODOS_TABLE_NAME + "(" +
                    ColumnTodos.ID_TODOS + " " + INT_TYPE + " primary key autoincrement," +
                    ColumnTodos.BODY_TODOS + " " + STRING_TYPE + " not null," +
                    ColumnTodos.STATUS_TODOS + " " + INT_TYPE + " not null," +
                    ColumnTodos.DATE_TODOS + " " + STRING_TYPE + " not null)";

    public void saveTodoRow(String tarea, String fecha, int status) {
        //Nuestro contenedor de valores
        ContentValues values = new ContentValues();

        //Seteando body y author
        values.put(ColumnTodos.BODY_TODOS, tarea);
        values.put(ColumnTodos.DATE_TODOS, fecha);
        values.put(ColumnTodos.STATUS_TODOS, status);

        //Insertando en la base de datos
        database.insert(this.TODOS_TABLE_NAME,null,values);
    }

    public Cursor getAllTodos(){
        //Seleccionamos todas las filas de la tabla Quotes
        return database.rawQuery(
                "select * from " + TODOS_TABLE_NAME, null);
    }

    public Cursor getTodoById(String id){
        //Seleccionamos todas las filas de la tabla Quotes
        return database.rawQuery("select * from " + TODOS_TABLE_NAME + " where _id = "+id, null);
    }

    public void deleteTodo(String id) {
        String selection = ColumnTodos.ID_TODOS + " = ?";
        String[] selectionArgs = { id };

        database.delete("Todos", selection, selectionArgs);
    }

    public void truncateTable() {
        database.rawQuery("delete from todos", null);
    }

    public void updateTodo(String tarea, int status, String fecha, String id) {
        //Nuestro contenedor de valores
        ContentValues values = new ContentValues();

        //Seteando body y author
        values.put(ColumnTodos.BODY_TODOS, tarea);
        values.put(ColumnTodos.DATE_TODOS, fecha);
        values.put(ColumnTodos.STATUS_TODOS, status);

        //Clausula WHERE
        String selection = ColumnTodos.ID_TODOS + " = ?";
        String[] selectionArgs = { id };

        //Actualizando
        database.update(TODOS_TABLE_NAME, values, selection, selectionArgs);
    }

    public void updateTodoStatus(int status, String id) {
        //Nuestro contenedor de valores
        ContentValues values = new ContentValues();

        //Seteando body y author
        values.put(ColumnTodos.STATUS_TODOS, status);

        //Clausula WHERE
        String selection = ColumnTodos.ID_TODOS + " = ?";
        String[] selectionArgs = { id };

        //Actualizando
        database.update(TODOS_TABLE_NAME, values, selection, selectionArgs);
    }

    public TodoDataSource(Context context) {
        //Creando una instancia hacia la base de datos
        openHelper = new TodoReaderDbHelper(context);
        database = openHelper.getWritableDatabase();
    }

    public Cursor getTodosByLike(String text) {
        return database.rawQuery("select * from " + TODOS_TABLE_NAME + " where tarea like '%"+text+"%'", null);
    }

    //Campos de la tabla Todos
    public static class ColumnTodos {
        public static final String ID_TODOS = BaseColumns._ID;
        public static final String BODY_TODOS = "tarea";
        public static final String DATE_TODOS = "fecha";
        public static final String STATUS_TODOS = "status";
    }
}
