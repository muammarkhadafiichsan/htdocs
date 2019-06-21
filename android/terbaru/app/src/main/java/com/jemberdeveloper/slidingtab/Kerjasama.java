package com.jemberdeveloper.slidingtab;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.jemberdeveloper.slidingtab.adapter.KunjunganAdapter;
import com.jemberdeveloper.slidingtab.model.Kunjungan;
import com.jemberdeveloper.slidingtab.model.GetKunjungan;
import com.jemberdeveloper.slidingtab.rest.ApiClient;
import com.jemberdeveloper.slidingtab.rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Kerjasama extends AppCompatActivity {
	Button btIns;
	ApiInterface mApiInterface;
	private RecyclerView mRecyclerView;
	private RecyclerView.Adapter mAdapter;
	private RecyclerView.LayoutManager mLayoutManager;
	public static Kerjasama ma;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_kerjasama);
		mRecyclerView = (RecyclerView) findViewById(R.id.forumbisnis);
		mLayoutManager = new LinearLayoutManager(Kerjasama.this);
		mRecyclerView.setLayoutManager(mLayoutManager);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		ma = this;
		refresh();
	}


	public void refresh() {
		Call<GetKunjungan> kunjunganCall = mApiInterface.getkunjungan();
		kunjunganCall.enqueue(new Callback<GetKunjungan>() {
			@Override
			public void onResponse(Call<GetKunjungan> call, Response<GetKunjungan>
					response) {
				List<Kunjungan> kunjunganList = response.body().getListDatakunjungan();
				Log.d("Retrofit Get", "Jumlah data Kontak: " +
						String.valueOf(kunjunganList.size()));
				mAdapter = new KunjunganAdapter(kunjunganList);
				mRecyclerView.setAdapter(mAdapter);
			}

			@Override
			public void onFailure(Call<GetKunjungan> call, Throwable t) {
				Toast.makeText(Kerjasama.this,"Gagal",Toast.LENGTH_LONG).show();
				Log.e("Retrofit Get", t.toString());
			}
		});
	}
}
