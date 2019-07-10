package com.example.dinaspeternakan;


import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.dinaspeternakan.Model.RegisterPost;
import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;



public class Register extends AppCompatActivity {
	EditText EdtNama, EdtEmail, EdtPassword;
	Spinner sp_role_id, sp_is_active;
	Button btn_register;
	ApiInterface mApiInterface;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_register);
		EdtNama = (EditText) findViewById(R.id.EdtNama);
		EdtEmail = (EditText) findViewById(R.id.EdtEmail);
		EdtPassword = (EditText) findViewById(R.id.EdtPassword);

		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		btn_register = (Button) findViewById(R.id.btn_register);
		btn_register.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {

				Call<RegisterPost> postRegister = mApiInterface.RegisterPost(EdtNama.getText().toString(),
						EdtEmail.getText().toString(),EdtPassword.getText().toString(), sp_role_id.getSelectedItem().toString(), sp_is_active.getSelectedItem().toString());
				postRegister.enqueue(new Callback<RegisterPost>() {
					@Override
					public void onResponse(Call<RegisterPost> call, Response<RegisterPost> response) {
						MainActivity.ma.refresh();
						finish();
					}

					@Override
					public void onFailure(Call<RegisterPost> call, Throwable t) {
						Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
					}
				});
			}
		});

	}

}
