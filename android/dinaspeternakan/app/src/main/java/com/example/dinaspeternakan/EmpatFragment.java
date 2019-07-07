package com.example.dinaspeternakan;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;


public class EmpatFragment extends Fragment implements View.OnClickListener{
	private LinearLayout kerjasama;
	private LinearLayout keranjang;

	public EmpatFragment() {


	}
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		View view = inflater.inflate(R.layout.fragment_empat, container, false);

		kerjasama = (LinearLayout) view.findViewById(R.id.kerjasama);
		kerjasama.setOnClickListener(this);

		keranjang = (LinearLayout) view.findViewById(R.id.keranjang);
		keranjang.setOnClickListener(this);

		return  view;
	}


	@Override
	public void onClick(View v) {

	}
}