package com.example.dinaspeternakan.Adapter;


import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.dinaspeternakan.ForumBisnis;
import com.example.dinaspeternakan.Model.Bisnis;
import com.example.dinaspeternakan.R;
import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class BisnisAdapter extends RecyclerView.Adapter<BisnisAdapter.MyViewHolder> {
	List<Bisnis> mBisnisList;
	Context context;

	public BisnisAdapter(List<Bisnis> BisnisList,Context context) {
		mBisnisList = BisnisList;
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
		holder.mTextViewJudul_bisnis.setText(mBisnisList.get(position).getJudul_bisnis());
		final String urlGambarBerita = "http://192.168.43.174/DinasPeternakan/assets/img/profile/" + mBisnisList.get(position).getImage();
		Picasso.with(context).load(urlGambarBerita).into(holder.imageView);

		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), ForumBisnis.class);
				mIntent.putExtra("id", mBisnisList.get(position).getId());
				mIntent.putExtra("judul_bisnis", mBisnisList.get(position).getJudul_bisnis());
				mIntent.putExtra("diskripsi", mBisnisList.get(position).getDiskripsi());
				mIntent.putExtra("image", mBisnisList.get(position).getImage());
				mIntent.putExtra("alamat", mBisnisList.get(position).getAlamat());
				mIntent.putExtra("nama_peternak", mBisnisList.get(position).getNama_peternak());
				mIntent.putExtra("no_telephon", mBisnisList.get(position).getNo_telephon());


				view.getContext().startActivity(mIntent);
			}
		});

	}


	@Override
	public int getItemCount () { return mBisnisList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView  mTextViewJudul_bisnis;
		public ImageView imageView;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewJudul_bisnis = (TextView) itemView.findViewById(R.id.tvJudul);
			imageView = (ImageView) itemView.findViewById(R.id.item);


		}
	}
}
