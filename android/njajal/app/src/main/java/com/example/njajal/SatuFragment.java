package com.example.njajal;


import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import android.util.Log;
import android.view.View;
import android.widget.Button;

import com.example.njajal.Adapter.ArtikelAdapter;
import com.example.njajal.Model.GetArtikel;
import com.example.njajal.Model.Artikel;
import com.example.njajal.Rest.ApiClient;
import com.example.njajal.Rest.ApiInterface;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import java.util.List;

public class SatuFragment extends AppCompatActivity {
	Button btIns;
	ApiInterface mApiInterface;
	private RecyclerView mRecyclerView;
	private RecyclerView.Adapter mAdapter;
	private RecyclerView.LayoutManager mLayoutManager;
	public static SatuFragment ma;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);

		btIns = (Button) findViewById(R.id.btndetail);
		btIns.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				startActivity(new Intent(SatuFragment.this, DetailArtikel.class));
			}
		});
		mRecyclerView = (RecyclerView) findViewById(R.id.recyclerView);
		mLayoutManager = new LinearLayoutManager(this);
		mRecyclerView.setLayoutManager(mLayoutManager);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);
		ma=this;
		refresh();
	}

	public void refresh() {
		Call<GetArtikel> kontakCall = mApiInterface.getArtikel();
		kontakCall.enqueue(new Callback<GetArtikel>() {
			@Override
			public void onResponse(Call<GetArtikel> call, Response<GetArtikel>
					response) {
				List<Artikel> ArtikelkList = response.body().getListDataArtikel();
				Log.d("Retrofit Get", "Jumlah data : " +String.valueOf(ArtikelkList.size()));
				mAdapter = new ArtikelAdapter(ArtikelkList);
				mRecyclerView.setAdapter(mAdapter);
			}

			@Override
			public void onFailure(Call<GetArtikel> call, Throwable t) {
				Log.e("Retrofit Get", t.toString());
			}
		});
	}


}
