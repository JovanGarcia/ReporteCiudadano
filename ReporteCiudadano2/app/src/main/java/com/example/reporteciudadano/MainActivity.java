package com.example.reporteciudadano;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    EditText etUser, etPassword;
    Button btnlog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        etUser = findViewById(R.id.input_email);
        etPassword = findViewById(R.id.input_password);
        btnlog = findViewById(R.id.btn_login);


        btnlog.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                validarUsuario("https://reporteciudadanovic.000webhostapp.com/validar_user.php");
            }
        });
    }

    private void validarUsuario(String URL){
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                //Si la respuesta no es vacia Se realizara el intent a la siguiente activity
                if (!response.isEmpty()){
                    int id=0;
                    try {
                        //JSONObject
                        //JSONArray jsonArray= new JSONArray(response);
                        JSONObject objeto = new JSONObject(response);
                        id = objeto.getInt("id");
                        Intent intent = new Intent(getApplicationContext(), MenuActivity.class);
                        Log.e("id", String.valueOf(id));
                        intent.putExtra("id_usuario", id);
                        startActivity(intent);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }else{
                    //Si no mostrara un Toast (mensaje) que dirá que los datos son invalidos
                    Toast.makeText(MainActivity.this, "Email o contraseña incorrecta", Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(MainActivity.this,error.toString(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> parametros = new HashMap<String, String>();
                parametros.put("usuario", etUser.getText().toString());
                parametros.put("password", etPassword.getText().toString());
                return parametros;
            }
        };

        RequestQueue requestQueue= Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
