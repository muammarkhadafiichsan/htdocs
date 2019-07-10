package com.example.dinaspeternakan;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;


public class ForumBisnis extends AppCompatActivity  {

	TextView judul_bisnis, alamat, no_telephon, nama_peternak, diskripsi ;
	ImageView image;
	Button btninsert, btndelete, btnedit;
	SharedPreferences sharedPreferences;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_forum_bisnis);
		final SharedPreferences mSettings = ForumBisnis.this.getSharedPreferences("remember", Context.MODE_PRIVATE);
		judul_bisnis = findViewById(R.id.tvJudul);
		alamat = findViewById(R.id.tvalamat);
		no_telephon = findViewById(R.id.tvnomer);
		nama_peternak = findViewById(R.id.tvpeternak);
		diskripsi = findViewById(R.id.tvdeskripsi);
		image= findViewById(R.id.item);
		btndelete = findViewById(R.id.btndelete);
		btnedit = findViewById(R.id.btnedit);

		btninsert = findViewById(R.id.btninsert);
		btninsert.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent intent= new Intent(ForumBisnis.this,InsertForumBisnis.class);
				startActivity(intent);
			}
		});

		Intent mIntent = getIntent();
		final String judul= mIntent.getStringExtra("judul_bisnis");

		judul_bisnis.setText(mIntent.getStringExtra("judul_bisnis"));
		alamat.setText(mIntent.getStringExtra("alamat"));
		nama_peternak.setText(mIntent.getStringExtra("nama_peternak"));
		no_telephon.setText(mIntent.getStringExtra("no_telephon"));
		alamat.setText(mIntent.getStringExtra("alamat"));
		diskripsi.setText(mIntent.getStringExtra("diskripsi"));
		Picasso.with(ForumBisnis.this).load("http://192.168.43.174/DinasPeternakan/assets/img/profile/"+mIntent.getStringExtra ("image")).into(image);
		btnedit.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				SharedPreferences.Editor editor = mSettings.edit();
				editor.putString("judul", judul);
				editor.apply();

			}
		});

	}




}
