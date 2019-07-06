package com.example.njajal;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.FragmentManager;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;



public class DetailArtikel extends AppCompatActivity implements View.OnClickListener {

	TextView nama;
	ImageView gambar;
	Context context;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.fragment_satu);

		nama = findViewById(R.id.tvJudul);

		Intent mIntent = getIntent();

		nama.setText(mIntent.getStringExtra("Judul"));


	}

	@Override
	public void onClick(View v) {



	}


}
