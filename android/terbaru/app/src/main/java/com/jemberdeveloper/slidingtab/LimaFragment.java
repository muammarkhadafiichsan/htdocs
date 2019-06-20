package com.jemberdeveloper.slidingtab;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;


public class LimaFragment extends Fragment implements View.OnClickListener {
	private LinearLayout login;
	private LinearLayout register;
    public LimaFragment() {
        // Required empty public constructor
    }

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
							 Bundle savedInstanceState) {
		// Inflate the layout for this fragment
		View view = inflater.inflate(R.layout.fragment_lima, container, false);

		login = (LinearLayout) view.findViewById(R.id.login);
		login.setOnClickListener(this);

		register = (LinearLayout) view.findViewById(R.id.register);
		register.setOnClickListener(this);

		return  view;
	}
	public void onClick(View view) {
		if(view == login){
			Intent intent =new Intent(getActivity(),Login.class);
			startActivity(intent);
		}

		if(view == register){
			Intent intent =new Intent(getActivity(),Register.class);
			startActivity(intent);
		}

	}

}
