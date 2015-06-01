package com.mark2.aldo.mark2;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.DatePicker;
import android.widget.TextView;
import android.widget.Toast;


public class NuevoTodoActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nuevo_todo);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_nuevo_todo, menu);
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

    public void saveTodo(View v) {
        TextView tarea = (TextView)findViewById(R.id.textTarea);
        DatePicker fecha = (DatePicker)findViewById(R.id.textFecha);

        String day  = checkDigit(fecha.getDayOfMonth());
        String month= checkDigit(fecha.getMonth()+1);
        String year = checkDigit(fecha.getYear());

        String TVtarea = tarea.getText().toString();
        String TVfecha = year+"-"+month+"-"+day;

        if (!TVtarea.isEmpty() && !TVfecha.isEmpty()) {
            Intent intent = getIntent();
            intent.putExtra("type", "insert");
            intent.putExtra("idTodo", "");
            intent.putExtra("status", 0);
            intent.putExtra("tarea", TVtarea);
            intent.putExtra("fecha", TVfecha);

            this.setResult(RESULT_OK, intent);
            finish();
        }
        else {
            Toast.makeText(this, "Todos los campos son obligatorios", Toast.LENGTH_SHORT).show();
        }
    }

    public void closeActivity(View v) {
        finish();
    }

    public String checkDigit(int number) {
        return number<=9?"0"+number:String.valueOf(number);
    }
}
