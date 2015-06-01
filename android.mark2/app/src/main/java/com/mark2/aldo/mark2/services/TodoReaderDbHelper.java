package com.mark2.aldo.mark2.services;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;


/**
 * Created by aldo on 25/05/15.
 */
public class TodoReaderDbHelper extends SQLiteOpenHelper {

    public static final String DATABASE_NAME = "Todos.db";
    public static final int DATABASE_VERSION = 1;

    public TodoReaderDbHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(TodoDataSource.CREATE_TODOS_SCRIPT);
        db.execSQL(TodoDataSource.INSERT_QUOTES_SCRIPT);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i2) {

    }
}
