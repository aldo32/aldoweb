package com.mark2.aldo.mark2;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.Cursor;
import android.support.v4.view.MotionEventCompat;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.GestureDetector;
import android.view.Menu;
import android.view.MenuItem;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.mark2.aldo.mark2.services.TodoAdapter;
import com.mark2.aldo.mark2.services.TodoDataSource;


public class DetalleTodoActivity extends Activity {

    TodoDataSource dataSource;
    TodoAdapter todoAdapter;
    String idTodo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detalle_todo);

        dataSource = new TodoDataSource(this);

        Intent intent = getIntent();
        idTodo = intent.getStringExtra("idTodo");

        TextView TVtodo = (TextView)findViewById(R.id.textTodo);
        TextView TVfecha = (TextView)findViewById(R.id.textFecha);
        TextView TVstatus = (TextView)findViewById(R.id.textStatus);
        Button buttonStatus = (Button)findViewById(R.id.buttonStatus);

        Cursor cursor = dataSource.getTodoById(idTodo);

        if (cursor.moveToFirst()) {
            String id = cursor.getString(cursor.getColumnIndex("_id"));
            String todo = cursor.getString(cursor.getColumnIndex("tarea"));
            String fecha = cursor.getString(cursor.getColumnIndex("fecha"));
            String status = cursor.getString(cursor.getColumnIndex("status"));

            buttonStatus.setTag(status);

            if (status.equals("0")) {
                status = "No terminada";
                buttonStatus.setText("Terminada");
                buttonStatus.setTag("0");
            }
            else {
                status = "Terminada";
                buttonStatus.setText("No terminada");
                buttonStatus.setTag("1");
            }

            TVtodo.setText(todo);
            TVfecha.setText(fecha);
            TVstatus.setText(status);
        }

    }

    public void deleteTodo(View v) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle("¿Realmente desea eliminar la tarea?");
        builder.setPositiveButton("Si", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Intent intent = getIntent();
                intent.putExtra("type", "delete");
                intent.putExtra("idTodo", idTodo);
                DetalleTodoActivity.this.setResult(RESULT_OK, intent);
                finish();
            }
        });
        builder.setNegativeButton("Cancelar", new DialogInterface.OnClickListener(){
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.cancel();
            }
        }).show();
    }

    public void finishTodo(View v) {
        Button buttonStatus = (Button)findViewById(R.id.buttonStatus);
        String status = buttonStatus.getTag().toString();
        String statusSend="";
        Log.i("finishTodo", "status: "+status);


        if (status.equals("0")) { statusSend="1"; } else { statusSend="0"; }

        Intent intent = getIntent();
        intent.putExtra("type", "update");
        intent.putExtra("idTodo", idTodo);
        intent.putExtra("status", statusSend);
        this.setResult(RESULT_OK, intent);
        finish();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_detalle_todo, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.back:
                finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);

        }
    }
}
