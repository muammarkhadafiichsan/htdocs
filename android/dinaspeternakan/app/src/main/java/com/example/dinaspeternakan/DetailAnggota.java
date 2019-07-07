package com.example.dinaspeternakan;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;


public class DetailAnggota extends AppCompatActivity implements View.OnClickListener {

	TextView name;
	ImageView image;
	Context context;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.fragment_lab_bondowoso);

		name = findViewById(R.id.tvdeskripsi);

		Intent mIntent = getIntent();

		name.setText(mIntent.getStringExtra("judul"));


	}

	@Override
	public void onClick(View v) {



	}


}
