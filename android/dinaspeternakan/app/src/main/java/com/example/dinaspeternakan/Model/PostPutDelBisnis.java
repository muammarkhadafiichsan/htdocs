package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class PostPutDelBisnis {
		@SerializedName("status")
		Boolean status;

		@SerializedName("judul_bisnis")
		String judul_bisnis;

		@SerializedName("nama_peternak")
		String nama_peternak;

		@SerializedName("alamat")
		String alamat;

		@SerializedName("id")
		String id;

		@SerializedName("image")
		String image;

		@SerializedName("diskripsi")
		String diskripsi;

		@SerializedName("no_telephon")
		String no_telephon;

		@SerializedName("message")
		String message;


	public Boolean getStatus() {
		return status;
	}

	public void setStatus(Boolean status) {
		this.status = status;
	}

	public String getJudul_bisnis() {
		return judul_bisnis;
	}

	public void setJudul_bisnis(String judul_bisnis) {
		this.judul_bisnis = judul_bisnis;
	}

	public String getNama_peternak() {
		return nama_peternak;
	}

	public void setNama_peternak(String nama_peternak) {
		this.nama_peternak = nama_peternak;
	}

	public String getAlamat() {
		return alamat;
	}

	public void setAlamat(String alamat) {
		this.alamat = alamat;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getImage() {
		return image;
	}

	public void setImage(String image) {
		this.image = image;
	}

	public String getDiskripsi() {
		return diskripsi;
	}

	public void setDiskripsi(String diskripsi) {
		this.diskripsi = diskripsi;
	}

	public String getNo_telephon() {
		return no_telephon;
	}

	public void setNo_telephon(String no_telephon) {
		this.no_telephon = no_telephon;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}
}
