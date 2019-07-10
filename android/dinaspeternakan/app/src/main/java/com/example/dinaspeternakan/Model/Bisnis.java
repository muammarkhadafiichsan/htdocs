package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Bisnis {
	@SerializedName("id")
	private String id;

	@SerializedName("judul_bisnis")
	private String judul_bisnis;

	@SerializedName("image")
	private String image;

	@SerializedName("diskripsi")
	private String diskripsi;

	@SerializedName("alamat")
	private String alamat;

	@SerializedName("nama_peternak")
	private String nama_peternak;

	@SerializedName("no_telephon")
	private String no_telephon;



	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getJudul_bisnis() {
		return judul_bisnis;
	}

	public void setJudul_bisnis(String judul_bisnis) {
		this.judul_bisnis = judul_bisnis;
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

	public String getAlamat() {
		return alamat;
	}

	public void setAlamat(String alamat) {
		this.alamat = alamat;
	}

	public String getNama_peternak() {
		return nama_peternak;
	}

	public void setNama_peternak(String nama_peternak) {
		this.nama_peternak = nama_peternak;
	}

	public String getNo_telephon() {
		return no_telephon;
	}

	public void setNo_telephon(String no_telephon) {
		this.no_telephon = no_telephon;
	}

	public Bisnis(String id, String judul_bisnis, String image, String diskripsi, String alamat, String nama_peternak, String no_telephon) {
		this.id = id;
		this.judul_bisnis = judul_bisnis;
		this.image = image;
		this.diskripsi = diskripsi;
		this.alamat = alamat;
		this.nama_peternak = nama_peternak;
		this.no_telephon = no_telephon;


	}


}
