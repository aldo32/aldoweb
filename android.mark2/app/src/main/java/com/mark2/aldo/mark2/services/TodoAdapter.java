package com.mark2.aldo.mark2.services;

import android.content.Context;
import android.database.Cursor;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CursorAdapter;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.mark2.aldo.mark2.R;

/**
 * Created by aldo on 27/05/15.
 */
public class TodoAdapter extends CursorAdapter {

    public TodoAdapter (Context context, Cursor cursor, int flags) {
        super(context, cursor, flags);
    }

    public View newView(Context context, Cursor cursor, ViewGroup view) {
        LayoutInflater inflater = LayoutInflater.from(view.getContext());
        View inflateView = inflater.inflate(R.layout.todo_list_item, null, false);

        return inflateView;
    }

    public void bindView(View view, Context context, Cursor cursor) {
        String idTodo = cursor.getString(cursor.getColumnIndex("_id"));
        view.setTag(idTodo);

        TextView tarea = (TextView)view.findViewById(R.id.text1);
        tarea.setText(cursor.getString(cursor.getColumnIndex("tarea")));

        TextView fecha = (TextView)view.findViewById(R.id.text2);
        fecha.setText(cursor.getString(cursor.getColumnIndex("fecha"))+ "  -  "+idTodo);

        ImageView image = (ImageView)view.findViewById(R.id.category);
        String status = cursor.getString(cursor.getColumnIndex("status"));

        if (status.equals("0")) {
            image.setImageResource(R.drawable.no_terminado);
        }
        else {
            image.setImageResource(R.drawable.terminado);
        }
    }
}
