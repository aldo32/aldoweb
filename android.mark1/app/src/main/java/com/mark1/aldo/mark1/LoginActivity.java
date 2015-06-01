package com.mark1.aldo.mark1;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.mark1.aldo.mark1.util.AsyncResponse;
import com.mark1.aldo.mark1.util.InvokeWS;
import com.mark1.aldo.mark1.util.ServiceHandler;

import org.apache.http.HttpResponse;
import org.apache.http.HttpStatus;
import org.apache.http.StatusLine;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.concurrent.ExecutionException;

public class LoginActivity extends Activity implements AsyncResponse {

    EditText usuario, password;
    TextView message;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        usuario = (EditText)findViewById(R.id.editUsuario);
        password = (EditText)findViewById(R.id.editPassword);
        message = (TextView)findViewById(R.id.textMessage);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_login, menu);
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

    public void processFinish(String output, String type) {
        switch (type) {
            case "login":
                String result = null;
                result = checkLogin(output);

                if (!result.equals(""))
                    Toast.makeText(getApplicationContext(), result, Toast.LENGTH_SHORT).show();
                break;
        }
    }

    public void accessLogin(View v) throws JSONException {
        String usr = usuario.getText().toString();
        String pass = password.getText().toString();

        if (!usr.isEmpty() && !pass.isEmpty()) {
            if (isNetworkAvailable()) {
                String url = "http://checador.evolve.com.mx/inicio/insert";
                InvokeWS asyncTask = new InvokeWS(LoginActivity.this, "login");
                asyncTask.delegate = this;
                asyncTask.execute(url);
            }
            else {
                Toast.makeText(getApplicationContext(), "No hay red disponible", Toast.LENGTH_SHORT).show();
            }
        }
        else {
            Toast.makeText(getApplicationContext(), "Debe ingresar un usuario y contraseña", Toast.LENGTH_SHORT).show();
        }
    }

    public String checkLogin(String data) {
        String message = "";
        JSONObject obj = null;
        try {
            obj = new JSONObject(data);

            if (obj.getString("status").equals("ok")) {
                Intent i = new Intent(this, InicioActivity.class);
                startActivity(i);
            }
            else {
                message = "Usuario o contraseña no validos";
            }
        } catch (JSONException e) {
            e.printStackTrace();
            return "fallo";
        }

        return message;
    }

    public void closeActivity(View v) {
        finish();
    }

    private boolean isNetworkAvailable() {
        ConnectivityManager connectivityManager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo activeNetworkInfo = connectivityManager.getActiveNetworkInfo();
        return activeNetworkInfo != null && activeNetworkInfo.isConnected();
    }
}


