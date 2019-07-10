package com.example.dinaspeternakan;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.dinaspeternakan.Model.PostPutDelBisnis;
import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class InsertForumBisnis extends AppCompatActivity {
	ApiInterface getmApiInterface;
	EditText judul_bisnis, alamat, no_telephon, nama_peternak, diskripsi ;
	Button btnsimpan;
	ApiInterface mApiInterface;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.insert_forum_bisnis);
		judul_bisnis = findViewById(R.id.edtjudul);
		alamat = findViewById(R.id.edtalamat);
		no_telephon = findViewById(R.id.edtNomor);
		nama_peternak = findViewById(R.id.edtNama);
		diskripsi = findViewById(R.id.edtdeskripsi);
		mApiInterface= ApiClient.getClient().create(ApiInterface.class);



		btnsimpan = (Button) findViewById(R.id.btnupdate);
		btnsimpan.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Call<PostPutDelBisnis> updateBisnisCall = mApiInterface.postBisnis(
						judul_bisnis.getText().toString(),
						alamat.getText().toString(),
						no_telephon.getText().toString(),
						nama_peternak.getText().toString(),
						diskripsi.getText().toString());
				updateBisnisCall.enqueue(new Callback<PostPutDelBisnis>() {
					@Override
					public void onResponse(Call<PostPutDelBisnis> call, Response<PostPutDelBisnis> response) {
						//MainActivity.ma.refresh();
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
