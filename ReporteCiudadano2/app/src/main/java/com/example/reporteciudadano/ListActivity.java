package com.example.reporteciudadano;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.RetryPolicy;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class ListActivity extends AppCompatActivity {

    ListView lista;
    int id_user=0;
    ArrayList<String> reportes;
    ArrayList<String> titulos;
    ArrayList<String> estados;
    ArrayList<String> fechas;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);

        reportes  = new ArrayList<>();
        titulos  = new ArrayList<>();
        estados  = new ArrayList<>();
        fechas  = new ArrayList<>();

        lista = findViewById(R.id.reportes);
        id_user=getIntent().getIntExtra("id_usuario",1);
        listarreportes("https://reporteciudadanovic.000webhostapp.com/get_reportes.php?id="+id_user+"");
    }

    public void listarreportes(String URL){
        RequestQueue requestQueue= Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{


                            //JSONObject objeto = new JSONObject(response);
                            JSONArray array = new JSONArray(response);
                            //cadena= array.getJSONArray(array);

                            //String titulo = objeto.getString("titulo");
                            //Intent intent = new Intent(getApplicationContext(), MenuActivity.class);
                            //Log.e("id", String.valueOf(id));
                            //String cadena;
                            for(int i=0;i<array.length();i++){
                                JSONArray jsonObject1=array.getJSONArray(i);
                                String titulo=jsonObject1.getString(1);
                                String fecha=jsonObject1.getString(4);
                                Log.e("titlo", titulo);
                                String estado=jsonObject1.getString(5);

                                reportes.add(titulo+" - "+estado+ " - " +fecha );
                            }
                            lista.setAdapter(new ArrayAdapter<String>(ListActivity.this, android.R.layout.simple_list_item_1, reportes));
                        }catch (JSONException e){e.printStackTrace();}
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        int socketTimeout = 30000;
        RetryPolicy policy = new DefaultRetryPolicy(socketTimeout, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT);
        stringRequest.setRetryPolicy(policy);
        requestQueue.add(stringRequest);
    }
}
