package com.example.njajal.Adapter;

import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.njajal.Model.Kunjungan;
import com.example.njajal.R;


import java.util.List;

public class KunjunganAdapter extends RecyclerView.Adapter<KunjunganAdapter.MyViewHolder> {
	@NonNull
    List<Kunjungan> mkunjunganList;

	public KunjunganAdapter(List<Kunjungan> kunjunganList) {
		mkunjunganList = kunjunganList;
	}

	@Override
	public MyViewHolder onCreateViewHolder (ViewGroup parent, int viewType){
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.listkunjungan, parent, false);
		KunjunganAdapter.MyViewHolder mViewHolder = new KunjunganAdapter.MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder(MyViewHolder holder, int position) {

		holder.mTextViewnamapeternak.setText("nama_peternak = " + mkunjunganList.get(position).getNama_peternak());
		holder.itemView.setOnClickListener(new View.OnClickListener(){
			@Override
			public void onClick(View view) {
				/*Intent mIntent = new Intent(view.getContext(), EditActivity.class);
				mIntent.putExtra("Id", mforumList.get(position).getId());
				mIntent.putExtra("Nama", mforumList.get(position).getNama());
				mIntent.putExtra("Nomor", mforumList.get(position).getNomor());
				view.getContext().startActivity(mIntent);*/
			}
		});

	}

	@Override
	public int getItemCount() {
		return mkunjunganList.size();
	}

		public class MyViewHolder extends RecyclerView.ViewHolder {
			public TextView mTextViewnamapeternak ;
			public MyViewHolder(View itemView) {
				super(itemView);
				mTextViewnamapeternak = (TextView) itemView.findViewById(R.id.nama_peternak);
	}
}
}
