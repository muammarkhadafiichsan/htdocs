package com.example.dinaspeternakan;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dinaspeternakan.Adapter.UptAdapter;
import com.example.dinaspeternakan.Model.GetUpt;
import com.example.dinaspeternakan.Model.Upt;
import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class TigaFragment extends Fragment {

	ApiInterface mApiInterface;
	private RecyclerView mRecyclerView;
	private RecyclerView.Adapter mAdapter;
	private RecyclerView.LayoutManager mLayoutManager;
	public static TigaFragment ma;
	public TigaFragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		View myFragmentView = inflater.inflate(R.layout.fragment_tiga, container, false);

		mRecyclerView = (RecyclerView) myFragmentView.findViewById(R.id.recyclerView);
		mLayoutManager = new GridLayoutManager(getActivity(),2);
		mRecyclerView.setLayoutManager(mLayoutManager);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);

		refresh();
		return myFragmentView;
	}

	public void refresh() {
		Call<GetUpt> UptCall = mApiInterface.getUpt();
		UptCall.enqueue(new Callback<GetUpt>() {
			@Override
			public void onResponse(Call<GetUpt> call, Response<GetUpt>
					response) {
				List<Upt> UptList = response.body().getListDataUpt();
				Log.d("Retrofit Get", "Jumlah : " +String.valueOf (UptList.size()));
				mAdapter = new UptAdapter(UptList,getContext());
				mRecyclerView.setAdapter(mAdapter);
			}

			@Override
			public void onFailure(Call<GetUpt> call, Throwable t) {
				Log.e("Retrofit Get", t.toString());
			}
		});
	}

}
