package com.mark2.aldo.mark2;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethod;
import android.view.inputmethod.InputMethodManager;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.mark2.aldo.mark2.services.TodoAdapter;
import com.mark2.aldo.mark2.services.TodoDataSource;


public class InicioActivity extends Activity {

    TodoDataSource dataSource;
    ListView listTodos;
    TodoAdapter todoAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_inicio);

        dataSource = new TodoDataSource(this);

        //set items in lisview
        setListView();
        listTodos.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                String idTodo = view.getTag().toString();

                Intent intent = new Intent(InicioActivity.this, DetalleTodoActivity.class);
                intent.putExtra("idTodo", idTodo);
                startActivityForResult(intent, 1);
            }
        });

    }

    public void setListView() {
        listTodos = (ListView)findViewById(R.id.listTodos);
        todoAdapter = new TodoAdapter(this, dataSource.getAllTodos(), 0);
        listTodos.setAdapter(todoAdapter);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data){
        super.onActivityResult(requestCode, resultCode, data);
        String idTodo = "";
        String type = "";
        String message="ok";
        String status = "";

        if (requestCode == 1 && resultCode == RESULT_OK) {
            idTodo = data.getExtras().getString("idTodo");
            type = data.getExtras().getString("type");

            switch (type) {
                case "delete":
                    dataSource.deleteTodo(idTodo);
                    message = "La tarea se elimino corectamente";
                    break;
                case "update":
                    status = data.getExtras().getString("status");
                    message = "La tarea se cambio de estatus correctamente";
                    dataSource.updateTodoStatus(Integer.parseInt(status), idTodo);
                    break;
                case "insert":
                    String tarea = data.getExtras().getString("tarea");
                    String fecha = data.getExtras().getString("fecha");
                    status = data.getExtras().getString("status");

                    message = "Se creo una nueva tarea";
                    dataSource.saveTodoRow(tarea, fecha, 0);
                    break;
                default:
                    break;
            }
            todoAdapter.changeCursor(dataSource.getAllTodos());
            Toast.makeText(InicioActivity.this, message, Toast.LENGTH_LONG).show();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_inicio, menu);
        //ActionBar actionBar = getActionBar();
        //actionBar.hide();

        View v  = (View)menu.findItem(R.id.search).getActionView();
        final EditText search = (EditText)v.findViewById(R.id.editSearch);

        search.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i2, int i3) {
            }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i2, int i3) {
                String textSearch = charSequence.toString();
                todoAdapter.changeCursor(dataSource.getTodosByLike(textSearch));
            }

            @Override
            public void afterTextChanged(Editable editable) {
            }
        });
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.add:
                Intent intent = new Intent(InicioActivity.this, NuevoTodoActivity.class);
                startActivityForResult(intent, 1);
                return true;
            case R.id.search:
                //Toast.makeText(getApplicationContext(), "Se preciono buscar", Toast.LENGTH_SHORT).show();
                return true;
            /*case R.id.edit:
                Toast.makeText(getApplicationContext(), "Se preciono Editar", Toast.LENGTH_SHORT).show();
                return true;*/
            case R.id.action_settings:
                Toast.makeText(getApplicationContext(), "Se preciono configurar", Toast.LENGTH_SHORT).show();
                return true;
            default:
                return super.onOptionsItemSelected(item);

        }
    }
}
