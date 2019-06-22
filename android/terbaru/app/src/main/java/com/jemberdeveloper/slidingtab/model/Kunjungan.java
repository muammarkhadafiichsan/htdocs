package com.jemberdeveloper.slidingtab.model;

import com.google.gson.annotations.SerializedName;

public class Kunjungan {
	@SerializedName("id_kunjungan")
	private String id_kunjungan;
	@SerializedName("nama_peternak")
	private String nama_peternak;
	@SerializedName("alamat")
	private String alamat;
	@SerializedName("tanggung_jawab")
	private String tanggung_jawab;

	public String getId_kunjungan() {
		return id_kunjungan;
	}

	public void setId_kunjungan(String id_kunjungan) {
		this.id_kunjungan = id_kunjungan;
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

	public String getTanggung_jawab() {
		return tanggung_jawab;
	}

	public void setTanggung_jawab(String tanggung_jawab) {
		this.tanggung_jawab = tanggung_jawab;
	}



}
