package com.example.reporteciudadano;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
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

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Hashtable;
import java.util.Map;

public class FormActivity extends AppCompatActivity implements View.OnClickListener {

    //variables para formulario de imgagen
    Button btnBuscar;
    ImageView imageView;
    EditText editTextName;
    Bitmap bitmap;
    int PICK_IMAGE_REQUEST = 1;
    String UPLOAD_URL ="https://reporteciudadanovic.000webhostapp.com/upload.php";
    String KEY_IMAGEN = "foto";
    String KEY_NOMBRE = "nombre";
    String KEY_TITULO = "titulo";
    String KEY_DESCRIPCION = "descripcion";
    String KEY_DIR = "direccion";
    String KEY_DEPT = "departamento";
    String KEY_FECHA = "fecha";
    String KEY_UBICACION = "ubicacion";
    String KEY_ID_USER = "iduser";


    int id_user=0;
    //variables de formularios
    EditText etTitulo, etDescripcion, etUbicacion;
    Button btnsend;
    Spinner dir, dept;
    DatePicker fecha;

    ArrayList<String> direcciones;
    ArrayList<Integer> ids;
    ArrayList<String> departamentos;
    int e=0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form);

        direcciones  = new ArrayList<>();
        departamentos = new ArrayList<>();
        ids = new ArrayList<Integer>();
        dir = (Spinner) findViewById(R.id.dir);
        dept = (Spinner) findViewById(R.id.dept);
        btnBuscar = (Button) findViewById(R.id.btnBuscar);
        btnsend = (Button) findViewById(R.id.send);

        id_user=getIntent().getIntExtra("id_usuario",1);
        editTextName = (EditText) findViewById(R.id.editText);
        etTitulo = (EditText) findViewById(R.id.title);
        etDescripcion = (EditText) findViewById(R.id.desc);
        etUbicacion = (EditText) findViewById(R.id.ubicacion);
        fecha = findViewById(R.id.date);

        imageView  = (ImageView) findViewById(R.id.imageView);

        btnBuscar.setOnClickListener(this);
        btnsend.setOnClickListener(this);
        listardirecciones("https://reporteciudadanovic.000webhostapp.com/listar-direcciones.php");
        Hilo miHilo = new Hilo();
        miHilo.start();
        //Listener del spinner de direcciones
        dir.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                String direccion= dir.getItemAtPosition(dir.getSelectedItemPosition()).toString();
                Toast.makeText(getApplicationContext(),direccion,Toast.LENGTH_LONG).show();
                //usa el metodo buscaridDept con la direccion seleccionada
                Log.e("direccion: ", direccion);
                //ids.clear();

                buscaridDept("https://reporteciudadanovic.000webhostapp.com/get-idDep.php?dir="+direccion+"");
                //Log.e("array de ids", String.valueOf(ids));
                //usa el metodo para listar departamentos usando el servicio y enviando como parametro el arrat de identificadores
                //Integer[] arr = new Integer[ids.size()];
                //if(!ids.isEmpty()){
                  //  listardepartamentos("https://reporteciudadanovic.000webhostapp.com/listar-departamentos.php?idsdep="+ids+"");
                //}
                //Log.e("array de departamentos", String.valueOf(departamentos));
            }
            @Override
            public void onNothingSelected(AdapterView<?> adapterView) {
                // DO Nothing here
            }
        });

        
    }

    //Hilo (thread) para llenar el spinner de departamentos
    private class Hilo extends Thread{
        public void run(){
            while(e==0){
                if(!ids.isEmpty()){
                    departamentos.clear();
                    for (int i=0;i<ids.size();i++){
                        listardepartamentos("https://reporteciudadanovic.000webhostapp.com/listar-departamentos.php?idsdep="+ids.get(i)+"");
                    }
                    ids.clear();
                    //e=1;
                }
            }

        }
    }


    public void listardirecciones(String URL){
        RequestQueue requestQueue= Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject=new JSONObject(response);
                            JSONArray jsonArray=jsonObject.getJSONArray("direcciones");
                            for(int i=0;i<jsonArray.length();i++){
                                JSONObject jsonObject1=jsonArray.getJSONObject(i);
                                String nombre=jsonObject1.getString("nombre_direccion");
                                direcciones.add(nombre);
                            }
                            dir.setAdapter(new ArrayAdapter<String>(FormActivity.this, android.R.layout.simple_spinner_dropdown_item, direcciones));
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

    public void listardepartamentos(String URL){
        RequestQueue requestQueue= Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject=new JSONObject(response);
                            JSONArray jsonArray=jsonObject.getJSONArray("departamentos");
                            for(int i=0;i<jsonArray.length();i++){
                                JSONObject jsonObject1=jsonArray.getJSONObject(i);
                                String nombre=jsonObject1.getString("nombre_dpto");
                                Log.e("depa", nombre);
                                departamentos.add(nombre);
                            }
                            Log.e("dept", String.valueOf(departamentos));
                            dept.setAdapter(new ArrayAdapter<String>(FormActivity.this, android.R.layout.simple_spinner_dropdown_item, departamentos));
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

    public void buscaridDept(String URL){
        RequestQueue requestQueue= Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject=new JSONObject(response);
                            JSONArray jsonArray=jsonObject.getJSONArray("ids");
                            for(int i=0;i<jsonArray.length();i++){
                                JSONObject jsonObject1=jsonArray.getJSONObject(i);
                                String id=jsonObject1.getString("id_departamento");
                                Log.e("ids: ", id);
                                ids.add(Integer.valueOf(id));
                            }

                            //dir.setAdapter(new ArrayAdapter<String>(FormActivity.this, android.R.layout.simple_spinner_dropdown_item, direcciones));
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

    //metodos para eligir/subir imagen:

    //Obtiene cadena de la imagen
    public String getStringImagen(Bitmap bmp){
        ByteArrayOutputStream baos = new ByteArrayOutputStream();
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, baos);
        byte[] imageBytes = baos.toByteArray();
        String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
        return encodedImage;
    }

    private void uploadImage(){
        //Mostrar el diálogo de progreso
        final ProgressDialog loading = ProgressDialog.show(this,"Subiendo...","Espere por favor...",false,false);
        StringRequest stringRequest = new StringRequest(Request.Method.POST, UPLOAD_URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String s) {
                        //Descartar el diálogo de progreso
                        loading.dismiss();
                        //Mostrando el mensaje de la respuesta
                        Toast.makeText(FormActivity.this, s , Toast.LENGTH_LONG).show();
                        Intent intent = new Intent(getApplicationContext(), MenuActivity.class);
                        intent.putExtra("id_usuario", id_user);
                        startActivity(intent);
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        //Descartar el diálogo de progreso
                        loading.dismiss();

                        //Showing toast
                        Toast.makeText(FormActivity.this, volleyError.getMessage().toString(), Toast.LENGTH_LONG).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                //Convertir bits a cadena
                String imagen = getStringImagen(bitmap);

                //Obtener el nombre de la imagen y de los demas formularios
                String nombre = editTextName.getText().toString().trim();
                String titulo = etTitulo.getText().toString();
                String descripcion = etDescripcion.getText().toString();
                String direccion = dir.getSelectedItem().toString();
                String departamento = dept.getSelectedItem().toString();

                String fechacadena = fecha.getYear()+"-"+fecha.getMonth()+"-"+fecha.getDayOfMonth();
                String ubicacion = etUbicacion.getText().toString();


                //Creación de parámetros
                Map<String,String> params = new Hashtable<String, String>();

                //Agregando de parámetros
                params.put(KEY_IMAGEN, imagen);
                params.put(KEY_NOMBRE, nombre);
                params.put(KEY_TITULO, titulo);
                params.put(KEY_DESCRIPCION, descripcion);
                params.put(KEY_DIR, direccion);
                params.put(KEY_DEPT, departamento);
                params.put(KEY_FECHA, fechacadena);
                params.put(KEY_UBICACION, ubicacion);
                params.put(KEY_ID_USER, String.valueOf(id_user));



                //Parámetros de retorno
                return params;
            }
        };

        //Creación de una cola de solicitudes
        RequestQueue requestQueue = Volley.newRequestQueue(this);

        //Agregar solicitud a la cola
        requestQueue.add(stringRequest);
    }

    private void showFileChooser() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Imagen"), PICK_IMAGE_REQUEST);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {
                //Cómo obtener el mapa de bits de la Galería
                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                //Configuración del mapa de bits en ImageView
                imageView.setImageBitmap(bitmap);
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

    @Override
    public void onClick(View v) {

        if(v == btnBuscar){
            showFileChooser();
        }

        if(v == btnsend){
            uploadImage();
        }
    }
}
