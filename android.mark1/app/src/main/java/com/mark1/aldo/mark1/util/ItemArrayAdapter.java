package com.mark1.aldo.mark1.util;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.mark1.aldo.mark1.R;

import java.util.List;

/**
 * Created by aldo on 25/05/15.
 */
public class ItemArrayAdapter extends ArrayAdapter<Tarea> {

    public ItemArrayAdapter(Context context, List<Tarea> objects) {
        super(context, 0, objects);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent){

        //Obteniendo una instancia del inflater
        LayoutInflater inflater = (LayoutInflater)getContext()
                .getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        //Salvando la referencia del View de la fila
        View listItemView = convertView;

        //Comprobando si el View no existe
        if (null == convertView) {
            //Si no existe, entonces inflarlo con image_list_view.xml
            listItemView = inflater.inflate(
                    R.layout.image_list_item,
                    parent,
                    false);
        }

        //Obteniendo instancias de los elementos
        TextView titulo = (TextView)listItemView.findViewById(R.id.text1);
        TextView subtitulo = (TextView)listItemView.findViewById(R.id.text2);
        ImageView categoria = (ImageView)listItemView.findViewById(R.id.category);


        //Obteniendo instancia de la Tarea en la posición actual
        Tarea item = getItem(position);

        titulo.setText(item.getNombre());
        subtitulo.setText(item.getFecha());
        categoria.setImageResource(item.getCategoria());

        //Devolver al ListView la fila creada
        return listItemView;
    }
}
