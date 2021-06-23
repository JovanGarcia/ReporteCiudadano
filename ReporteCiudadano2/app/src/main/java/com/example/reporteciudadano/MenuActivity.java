package com.example.reporteciudadano;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MenuActivity extends AppCompatActivity {

    Button btnform, btnlist;

    int id_user=0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);


        btnform = findViewById(R.id.btn_report);
        btnlist = findViewById(R.id.btn_view);

        id_user=getIntent().getIntExtra("id_usuario",1);


        btnlist.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                botonLista();
            }
        });
        btnform.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                botonReporte();
            }
        });

    }

    private void botonReporte(){
        Intent intent = new Intent(getApplicationContext(), FormActivity.class);
        intent.putExtra("id_usuario", id_user);
        startActivity(intent);
    }

    private void botonLista(){
        Intent intent = new Intent(getApplicationContext(), ListActivity.class);
        intent.putExtra("id_usuario", id_user);
        startActivity(intent);
    }
}
