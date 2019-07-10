package com.example.dinaspeternakan;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.dinaspeternakan.Model.PostPutDelBisnis;
import com.example.dinaspeternakan.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class EditForumBisnis extends AppCompatActivity {
	EditText edtId, edtjudul, edtNama, edtNomor, edtalamat,edtdeskripsi;
	TextView judul_bisnis, alamat, no_telephon, nama_peternak, diskripsi ;
	Button btnsimpan;
	ApiInterface mApiInterface;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.edit_forum_bisnis);
		judul_bisnis = findViewById(R.id.tvJudul);
		alamat = findViewById(R.id.tvalamat);
		no_telephon = findViewById(R.id.tvnomer);
		nama_peternak = findViewById(R.id.tvpeternak);
		diskripsi = findViewById(R.id.tvdeskripsi);

		btnsimpan = (Button) findViewById(R.id.btnupdate);
		btnsimpan.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Call<PostPutDelBisnis> updateBisnisCall = mApiInterface.putBisnis(

						edtjudul.getText().toString(),
						edtNama.getText().toString(),
						edtalamat.getText().toString(),
						edtNomor.getText().toString(),
						edtdeskripsi.getText().toString());
				updateBisnisCall.enqueue(new Callback<PostPutDelBisnis>() {
					@Override
					public void onResponse(Call<PostPutDelBisnis> call, Response<PostPutDelBisnis> response) {
						MainActivity.ma.refresh();
						finish();
					}

					@Override
					public void onFailure(Call<PostPutDelBisnis> call, Throwable t) {
						Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
					}
				});
			}
		});


	}
}
