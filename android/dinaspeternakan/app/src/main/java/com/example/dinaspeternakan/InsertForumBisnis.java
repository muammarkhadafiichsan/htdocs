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
	EditText edtId, edtjudul, edtNama, edtNomor, edtalamat, edtdeskripsi;
	Button btnupdate;
	ApiInterface mApiInterface;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.insert_forum_bisnis);
		edtId   = (EditText) findViewById(R.id.edtId);
		edtjudul = (EditText) findViewById(R.id.edtjudul);
		edtNama = (EditText) findViewById(R.id.edtNama);
		edtNomor = (EditText) findViewById(R.id.edtNomor);
		edtalamat = (EditText) findViewById(R.id.edtalamat);
		edtdeskripsi = (EditText) findViewById(R.id.edtdeskripsi);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		btnupdate = (Button) findViewById(R.id.btnupdate);
		btnupdate.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Call<PostPutDelBisnis> postBisnis = mApiInterface.postBisnis(edtId.getText().toString(),(edtNama.getText().toString()),
						edtNomor.getText().toString(), edtjudul.getText().toString(), edtdeskripsi.getText().toString(), edtalamat.getText().toString());
				postBisnis.enqueue(new Callback<PostPutDelBisnis>() {
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
