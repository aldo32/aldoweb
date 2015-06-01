package com.mark1.aldo.mark1;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

//ActionBarActivity
public class InicioActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_inicio);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_inicio, menu);
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

    public void calcular(View v) {
        Context context = getApplicationContext();
        int duration = Toast.LENGTH_SHORT;

        CharSequence text = "";
        EditText n1 = (EditText)findViewById(R.id.numero1);
        EditText n2 = (EditText)findViewById(R.id.numero2);
        TextView res = (TextView)findViewById(R.id.textResult);

        double resultado;
        String number1 = n1.getText().toString();
        String number2 = n2.getText().toString();

        if (!number1.isEmpty() && !number2.isEmpty()) {

            switch (v.getId()) {
                case (R.id.buttomMultiplicar):
                    resultado = ((Double.parseDouble(number1) * Double.parseDouble(number2)));
                    res.setText(String.valueOf(resultado));
                    break;

                case (R.id.buttonDividir):
                    resultado = ((Double.parseDouble(number1) / Double.parseDouble(number2)));
                    res.setText(String.valueOf(resultado));
                    break;

                case (R.id.buttonRestar):
                    resultado = ((Double.parseDouble(number1) - Double.parseDouble(number2)));
                    res.setText(String.valueOf(resultado));
                    break;

                case (R.id.buttonSumar):
                    resultado = ((Double.parseDouble(number1) + Double.parseDouble(number2)));
                    res.setText(String.valueOf(resultado));
                    break;
            }

        }
        else {
            text = "Debe ingresar un numero diferente de cero";
        }

        if (!text.equals("")) {
            Toast toast = Toast.makeText(context, text, duration);
            toast.show();
        }
    }

    public void resetear(View v) {
        EditText n1 = (EditText)findViewById(R.id.numero1);
        EditText n2 = (EditText)findViewById(R.id.numero2);
        TextView result = (TextView)findViewById(R.id.textResult);

        n1.setText(null);
        n2.setText(null);
        result.setText("0");
    }

    public void  showActivity(View v) {
        Intent i = new Intent(this, SegundoEjemploActivity.class);
        startActivity(i);
    }

    public void closeActivity(View v) {
        finish();
    }
}
