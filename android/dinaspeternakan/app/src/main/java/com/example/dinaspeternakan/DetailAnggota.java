package com.example.dinaspeternakan;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;


public class DetailAnggota extends AppCompatActivity implements View.OnClickListener {

	TextView nama_kepala;
	TextView deskripsi;
	ImageView image;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_detail_upt);

		nama_kepala = findViewById(R.id.tvJudul);
		deskripsi = findViewById(R.id.tvdeskripsi);
		image= findViewById(R.id.item);

		Intent mIntent = getIntent();
		nama_kepala.setText(mIntent.getStringExtra("nama_kepala"));
		deskripsi.setText(mIntent.getStringExtra("deskripsi"));

		Picasso.with(DetailAnggota.this).load("http://192.168.43.174/DinasPeternakan/assets/img/profile/"+mIntent.getStringExtra ("image")).into(image);


	}

	@Override
	public void onClick(View v) {



	}


}
