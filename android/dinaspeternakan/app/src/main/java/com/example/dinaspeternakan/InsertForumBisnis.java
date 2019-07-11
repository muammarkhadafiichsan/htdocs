package com.example.dinaspeternakan;

import android.app.ProgressDialog;
import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.dinaspeternakan.Model.PostPutDelBisnis;
import com.example.dinaspeternakan.Model.ServerResponse;
import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiConfig;
import com.example.dinaspeternakan.Rest.ApiInterface;

import java.io.File;

import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class InsertForumBisnis extends AppCompatActivity {
	ApiInterface getmApiInterface;
	EditText judul_bisnis, alamat, no_telephon, nama_peternak, diskripsi;
	TextView image;
	Button btnsimpan,btnupload,btnupdate;
	String mediaPath;
	ApiInterface mApiInterface;
	ProgressDialog progressDialog;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.insert_forum_bisnis);
		judul_bisnis = findViewById(R.id.edtjudul);
		alamat = findViewById(R.id.edtalamat);
		no_telephon = findViewById(R.id.edtNomor);
		nama_peternak = findViewById(R.id.edtNama);
		diskripsi = findViewById(R.id.edtdeskripsi);
		image = findViewById(R.id.id_image);
		btnupload = findViewById(R.id.btnupload);

		mApiInterface= ApiClient.getClient().create(ApiInterface.class);



		btnsimpan = (Button) findViewById(R.id.btnupdate);
		btnupload.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {

				Intent galleryIntent = new Intent(Intent.ACTION_PICK,
						android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
				startActivityForResult(galleryIntent, 0);
			}
		});
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
				uploadFile();
			}
		});
	}

	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		super.onActivityResult(requestCode, resultCode, data);
		try {
			// When an Image is picked
			if (requestCode == 0 && resultCode == RESULT_OK && null != data) {

				// Get the Image from data
				Uri selectedImage = data.getData();
				String[] filePathColumn = {MediaStore.Images.Media.DATA};

				Cursor cursor = getContentResolver().query(selectedImage, filePathColumn, null, null, null);
				assert cursor != null;
				cursor.moveToFirst();

				int columnIndex = cursor.getColumnIndex(filePathColumn[0]);
				mediaPath = cursor.getString(columnIndex);
//                tvfileimage.setText(mediaPath);
				String filename=mediaPath.substring(mediaPath.lastIndexOf("/")+1);
				image.setText(filename);
				// Set the Image in ImageView for Previewing the Media
//                imgView.setImageBitmap(BitmapFactory.decodeFile(mediaPath));
				cursor.close();


			} else {
				Toast.makeText(this, "You haven't picked Image/Video", Toast.LENGTH_LONG).show();
			}
		} catch (Exception e) {
			Toast.makeText(this, "Something went wrong", Toast.LENGTH_LONG).show();
		}

	}
	private void uploadFile() {
		progressDialog.show();

		// Map is used to multipart the file using okhttp3.RequestBody
		File file = new File(mediaPath);

		// Parsing any Media type file
		RequestBody requestBody = RequestBody.create(MediaType.parse("*/*"), file);
		MultipartBody.Part fileToUpload = MultipartBody.Part.createFormData("file", file.getName(), requestBody);
		RequestBody filename = RequestBody.create(MediaType.parse("text/plain"), file.getName());

		ApiConfig getResponse = ApiClient.getRetrofit().create(ApiConfig.class);
		Call<ServerResponse> call = getResponse.uploadFile(fileToUpload, filename);
		call.enqueue(new Callback<ServerResponse>() {
			@Override
			public void onResponse(Call<ServerResponse> call, Response<ServerResponse> response) {
				ServerResponse serverResponse = response.body();
				if (serverResponse != null) {
					if (serverResponse.getSuccess()) {
						Toast.makeText(getApplicationContext(), serverResponse.getMessage(), Toast.LENGTH_SHORT).show();
					} else {
						Toast.makeText(getApplicationContext(), serverResponse.getMessage(), Toast.LENGTH_SHORT).show();
					}
				}
				progressDialog.dismiss();
			}

			@Override
			public void onFailure(Call<ServerResponse> call, Throwable t) {

			}
		});
	}

}
