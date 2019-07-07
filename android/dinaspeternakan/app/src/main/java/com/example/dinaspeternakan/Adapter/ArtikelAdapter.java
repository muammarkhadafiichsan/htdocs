package com.example.dinaspeternakan.Adapter;


import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.dinaspeternakan.Model.Artikel;
import com.example.dinaspeternakan.R;
import com.example.dinaspeternakan.SatuFragment;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class ArtikelAdapter extends RecyclerView.Adapter<ArtikelAdapter.MyViewHolder>{
	List<Artikel> mArtikelList;

	public ArtikelAdapter(List <Artikel> KontakList) {
		mArtikelList = KontakList;
	}

	@Override
	public MyViewHolder onCreateViewHolder (ViewGroup parent,int viewType){
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.fragment_satu, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder (MyViewHolder holder,final int position){
		holder.mTextViewName.setText("Nama = " + mArtikelList.get(position).getNama());

		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), SatuFragment.class);
				mIntent.putExtra("Nama", mArtikelList.get(position).getNama());
				view.getContext().startActivity(mIntent);
			}
		});
	}

	@Override
	public int getItemCount () {
		return mArtikelList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView  mTextViewName;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewName = (TextView) itemView.findViewById(R.id.tvJudul);

		}
	}
}
