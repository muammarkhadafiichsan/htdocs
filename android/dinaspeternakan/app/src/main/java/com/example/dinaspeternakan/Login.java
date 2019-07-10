package com.example.dinaspeternakan;


import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiInterface;
import com.example.dinaspeternakan.User.ResponseLogin;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class Login extends AppCompatActivity implements View.OnClickListener {

	SharedPreferences sharedPreferences;
	private Button btn_login;
	private EditText txt_username;
	private EditText txt_password;
	ApiInterface mApiInterface;


	//declate variable

	private ProgressDialog pDialog;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_login);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		btn_login = (Button) findViewById(R.id.btn_login);
		btn_login.setOnClickListener(this);

		txt_username = (EditText) findViewById(R.id.txt_username);
		txt_password = (EditText) findViewById(R.id.txt_password);
//        mContext = this;


		sharedPreferences = Login.this.getSharedPreferences("remember", Context.MODE_PRIVATE);
		String id = sharedPreferences.getString("id", "0");
	}




	public void onClick(View v) {
		if (v == btn_login) {
			pDialog = new ProgressDialog(this);
			//  pDialog.getProgressHelper().setBarColor(Color.parseColor("#A5DC86"));
			pDialog.setMessage("Loading");
			pDialog.setCancelable(false);
			// pDialog.setIndeterminate(false);
			pDialog.show();

			Call<ResponseLogin> user = mApiInterface.login(txt_username.getText().toString(),txt_password.getText().toString());
//        Call<ResponseLogin> user=ApiClient.getApi().auth(txt_username.getText().toString(),txt_password.getText().toString());
			user.enqueue(new Callback<ResponseLogin>() {
				@Override
				public void onResponse(Call<ResponseLogin> call, Response<ResponseLogin> response) {
					pDialog.dismiss();
					String id = response.body().getId();
					String email = response.body().getEmail();
					String name = response.body().getName();
					String password = response.body().getPassword();

					if (TextUtils.isEmpty(id)) {
						Toast.makeText(Login.this, "Username atau Password Salah", Toast.LENGTH_SHORT).show();
						Intent intent= new Intent(Login.this,Login.class);
						startActivity(intent);
					}
					else {
						Toast.makeText(Login.this, "Berhasil  Login", Toast.LENGTH_SHORT).show();
						Intent intent = new Intent(Login.this, MainActivity.class);
						SharedPreferences.Editor editor = sharedPreferences.edit();
						editor.putString("id", id);
						editor.putString("name", name);
						editor.putString("email", email);
						editor.putString("password", password);
						editor.apply();
						startActivity(intent);
						Log.e("Berhasil", "berhasil"+id+name+email+password);

					}
				}

				@Override
				public void onFailure(Call<ResponseLogin> call, Throwable t) {
					pDialog.dismiss();
					Log.e("gagal", "gagal" + t);
					Toast.makeText(Login.this, "Koneksi Gagal", Toast.LENGTH_LONG).show();
				}
			});
		}

		 {

			startActivity(new Intent(Login.this, MainActivity.class)
					.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
			finish();
		}
	}


}
