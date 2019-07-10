package com.example.dinaspeternakan;

import android.content.Intent;
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

public class EditForumBisnis extends AppCompatActivity {
	EditText edtId, edtjudul, edtNama, edtNomor, edtalamat,edtdeskripsi;
	Button btnupdate, btndelete;
	ApiInterface mApiInterface;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.edit_forum_bisnis);

		edtjudul = (EditText) findViewById(R.id.edtjudul);
		edtNama = (EditText) findViewById(R.id.edtNama);
		edtNomor = (EditText) findViewById(R.id.edtNomor);
		edtalamat = (EditText) findViewById(R.id.edtalamat);
		edtdeskripsi = (EditText) findViewById(R.id.edtdeskripsi);

		Intent mIntent = getIntent();
		edtjudul.setText(mIntent.getStringExtra("Judul"));
		edtNama.setText(mIntent.getStringExtra("Nama"));
		edtalamat.setText(mIntent.getStringExtra("alamat"));
		edtNomor.setText(mIntent.getStringExtra("Nomor"));
		edtdeskripsi.setText(mIntent.getStringExtra("deskripsi"));
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		btnupdate = (Button) findViewById(R.id.btnupdate);
		btnupdate.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Call<PostPutDelBisnis> updateBisnisCall = mApiInterface.putBisnis(
						edtId.getText().toString(),
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
		btndelete = (Button) findViewById(R.id.btndelete);
		btndelete.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				if (edtId.getText().toString().trim().isEmpty()==false){
					Call<PostPutDelBisnis> deleteKontak = mApiInterface.deleteBisnis(edtId.getText().toString());
					deleteKontak.enqueue(new Callback<PostPutDelBisnis>() {
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
				}else{
					Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
				}
			}
		});

	}
}
