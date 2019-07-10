package com.example.dinaspeternakan;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.dinaspeternakan.Adapter.BisnisAdapter;
import com.example.dinaspeternakan.Model.GetBisnis;
import com.example.dinaspeternakan.Model.Bisnis;
import com.example.dinaspeternakan.Rest.ApiClient;
import com.example.dinaspeternakan.Rest.ApiInterface;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DuaFragment extends Fragment {

	ApiInterface mApiInterface;
	private RecyclerView mRecyclerView;
	private RecyclerView.Adapter mAdapter;
	private RecyclerView.LayoutManager mLayoutManager;
	public static SatuFragment ma;
	public DuaFragment() {
		// Required empty public constructor
	}


	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		View myFragmentView = inflater.inflate(R.layout.fragment_dua, container, false);

		mRecyclerView = (RecyclerView) myFragmentView.findViewById(R.id.recyclerView);
		mLayoutManager = new GridLayoutManager(getActivity(),2);
		mRecyclerView.setLayoutManager(mLayoutManager);
		mApiInterface = ApiClient.getClient().create(ApiInterface.class);

		refresh();
		return myFragmentView;
	}

	public void refresh() {
		Call<GetBisnis> UptCall = mApiInterface.getBisnis();
		UptCall.enqueue(new Callback<GetBisnis>() {
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
