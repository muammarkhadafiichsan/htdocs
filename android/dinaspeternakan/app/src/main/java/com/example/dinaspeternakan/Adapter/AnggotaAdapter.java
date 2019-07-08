package com.example.dinaspeternakan.Adapter;


import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.dinaspeternakan.DetailAnggota;
import com.example.dinaspeternakan.Model.Anggota;
import com.example.dinaspeternakan.R;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class AnggotaAdapter extends RecyclerView.Adapter<AnggotaAdapter.MyViewHolder>{
	List<Anggota> mAnggotaList;

	public AnggotaAdapter(List <Anggota> AnggotaList) {
		mAnggotaList = AnggotaList;
	}

	@Override
	public MyViewHolder onCreateViewHolder (ViewGroup parent,int viewType){
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.fragment_tiga, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder (MyViewHolder holder,final int position){
		holder.mTextViewName.setText(mAnggotaList.get(position).getId_puskeswan());
		holder.mTextViewName.setText(mAnggotaList.get(position).getNama_kepala());

		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), DetailAnggota.class);
				mIntent.putExtra("id", mAnggotaList.get(position).getId_puskeswan());
				mIntent.putExtra("judul", mAnggotaList.get(position).getNama_kepala());
				mIntent.putExtra("image", mAnggotaList.get(position).getImage());
				mIntent.putExtra("ttl", mAnggotaList.get(position).getTtl());
				mIntent.putExtra("deskripsi", mAnggotaList.get(position).getDeskripsi());
				view.getContext().startActivity(mIntent);
			}
		});
	}

	@Override
	public int getItemCount () { return mAnggotaList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView  mTextViewName;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewName = (TextView) itemView.findViewById(R.id.tvJudul);


		}
	}
}
