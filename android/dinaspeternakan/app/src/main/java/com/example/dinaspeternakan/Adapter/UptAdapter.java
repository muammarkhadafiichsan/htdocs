package com.example.dinaspeternakan.Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.dinaspeternakan.DetailAnggota;
import com.example.dinaspeternakan.Model.Upt;
import com.example.dinaspeternakan.R;
import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class UptAdapter extends RecyclerView.Adapter<UptAdapter.MyViewHolder> {
	List<Upt> mUptList;
	Context context;

	public UptAdapter(List<Upt> UptList,Context context) {
		mUptList = UptList;
		this.context=context;
	}

	@Override
	public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_upt, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder(MyViewHolder holder, final int position) {
		//holder.mTextViewId.setText("Id = " + mItemList.get(position).getId_item());
		holder.mTextViewNama_kepala.setText(mUptList.get(position).getNama_kepala());
		final String urlGambarBerita = "http://192.168.43.174/DinasPeternakan/assets/img/profile/" + mUptList.get(position).getImage();
		Picasso.with(context).load(urlGambarBerita).into(holder.imageView);

		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), DetailAnggota.class);
				mIntent.putExtra("id_puskeswan", mUptList.get(position).getId_puskeswan());
				mIntent.putExtra("nama_kepala", mUptList.get(position).getNama_kepala());
				mIntent.putExtra("TTL", mUptList.get(position).getTtl());
				mIntent.putExtra("image", mUptList.get(position).getImage());
				mIntent.putExtra("deskripsi", mUptList.get(position).getDeskripsi());



				view.getContext().startActivity(mIntent);
			}
		});

	}


	@Override
	public int getItemCount () { return mUptList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView  mTextViewNama_kepala;
		public ImageView imageView;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewNama_kepala = (TextView) itemView.findViewById(R.id.tvJudul);
			imageView = (ImageView) itemView.findViewById(R.id.item);


		}
	}
}
