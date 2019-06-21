package com.jemberdeveloper.slidingtab.adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.text.style.IconMarginSpan;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

/*import com.example.root.kontak.EditActivity;*/
import com.jemberdeveloper.slidingtab.R;
import com.jemberdeveloper.slidingtab.model.Forum;


import java.util.List;

public class ForumAdapter  extends RecyclerView.Adapter<ForumAdapter.MyViewHolder>  {

	List<Forum> mforumList;

	public ForumAdapter(List <Forum> ForumList) {
		mforumList = ForumList;
	}

	@Override
	public MyViewHolder onCreateViewHolder (ViewGroup parent,int viewType){
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_forum, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder (MyViewHolder holder,final int position){
		/*holder.mTextViewId.setText("Id = " + mforumList.get(position).getId_forum());*/
		holder.mTextViewNama.setText("Nama = " + mforumList.get(position).getNama_peternak());
		holder.mTextViewTernak.setText("ternak = " + mforumList.get(position).getTernak());
		holder.mTextViewalamat.setText("Alamat = " + mforumList.get(position).getAlamat());
	/*	holder.mTextViewNomor.setText("ternak_jual = " + mforumList.get(position).getTernak_jual());*/
	/*	holder.mTextViewNomor.setText("harga = " + mforumList.get(position).getHarga());*/
	/*	holder.mTextViewNomor.setText("stok = " + mforumList.get(position).getStok());*/
	/*	holder.mTextViewFoto.setText("foto = " + mforumList.get(position).getFoto());
	/*	holder.mTextViewNomor.setText("detail = " + mforumList.get(position).getDetail());*/
		holder.itemView.setOnClickListener(new View.OnClickListener() {
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
	public int getItemCount () {
		return mforumList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView mTextViewNama, mTextViewTernak, mTextViewalamat  ;
		ImageView mTextViewFoto;

		public MyViewHolder(View itemView) {
			super(itemView);
			//mTextViewFoto = (ImageView) itemView.findViewById(R.id.img_item);
			mTextViewNama = (TextView) itemView.findViewById(R.id.tv_nama_item);
			mTextViewTernak = (TextView) itemView.findViewById(R.id.tv_warna);
			mTextViewalamat = (TextView) itemView.findViewById(R.id.tv_ukuran);
		}
	}


}
