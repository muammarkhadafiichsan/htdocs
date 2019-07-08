package com.example.dinaspeternakan.Adapter;


import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.dinaspeternakan.DetailArtikel;
import com.example.dinaspeternakan.Model.Artikel;
import com.example.dinaspeternakan.R;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class ArtikelAdapter extends RecyclerView.Adapter<ArtikelAdapter.MyViewHolder> {
	List<Artikel> mArtikelList;

	public ArtikelAdapter(List<Artikel> ArtikelList) {
		mArtikelList = ArtikelList;
	}

	@Override
	public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.fragment_satu, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder(MyViewHolder holder, final int position) {
		//holder.mTextViewId.setText("Id = " + mItemList.get(position).getId_item());
		holder.mTextViewNama.setText(mArtikelList.get(position).getName());


		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), DetailArtikel.class);
				mIntent.putExtra("id", mArtikelList.get(position).getProduct_id());
				mIntent.putExtra("name", mArtikelList.get(position).getName());
				mIntent.putExtra("image", mArtikelList.get(position).getImage());
				mIntent.putExtra("deskripsi", mArtikelList.get(position).getDescription());



				view.getContext().startActivity(mIntent);
			}
		});

	}


	@Override
	public int getItemCount () {
		return mArtikelList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView  mTextViewNama	;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewNama = (TextView) itemView.findViewById(R.id.tvJudul);


		}
	}
}
