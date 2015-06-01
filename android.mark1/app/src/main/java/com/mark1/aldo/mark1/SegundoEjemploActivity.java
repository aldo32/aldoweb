package com.mark1.aldo.mark1;

import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.mark1.aldo.mark1.util.AsyncResponse;
import com.mark1.aldo.mark1.util.InvokeWS;
import com.mark1.aldo.mark1.util.Tarea;
import com.mark1.aldo.mark1.util.ItemArrayAdapter;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.ArrayList;
import java.util.List;

public class SegundoEjemploActivity extends Activity implements AsyncResponse {

    ListView listView;
    ArrayAdapter<Tarea> adaptador;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_segundo_ejemplo);

        String url = "http://checador.evolve.com.mx/inicio/json";
        InvokeWS asyncTask = new InvokeWS(SegundoEjemploActivity.this, "listexample");
        asyncTask.delegate = this;
        asyncTask.execute(url);
    }

    @Override
    public void processFinish(String output, String type) {
        listView = (ListView)findViewById(R.id.list);
        List items = new ArrayList<Tarea>();

        try {
            JSONArray arr = new JSONArray(output);
            for (int i=0; i<arr.length(); i++) {
                String nombre = arr.getJSONObject(i).getString("nombre");
                String fecha = arr.getJSONObject(i).getString("fecha");
                items.add(new Tarea(nombre, fecha, R.drawable.ic_carreer));
            }

            adaptador = new ItemArrayAdapter(this, items);
            listView.setAdapter(adaptador);

            Log.i("processFinish", output);
        } catch (JSONException e) {
            e.printStackTrace();
        }

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Tarea tareaActual = (Tarea)adaptador.getItem(i);
                String msg = "Elegiste la tarea:n"+tareaActual.getNombre()+"-"+tareaActual.getFecha();
                Toast.makeText(getApplicationContext(), msg, Toast.LENGTH_SHORT).show();
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_segundo_ejemplo, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    public void closeActivity(View v) {
        finish();
    }

    public void clearList(View v) {
        adaptador.clear();
    }
}
