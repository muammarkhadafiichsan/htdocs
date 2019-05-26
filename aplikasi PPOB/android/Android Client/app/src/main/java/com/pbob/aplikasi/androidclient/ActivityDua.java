package com.pbob.aplikasi.androidclient;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class ActivityDua extends AppCompatActivity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_dua);

		TextView txtInfo = this.<TextView>findViewById(R.id.btnpulsa);
		if(getIntent() != null)
		{
			String info = getIntent().getStringExtra("nomer");
			txtInfo.setText(info);
		}
	}
}
