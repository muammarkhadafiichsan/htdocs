package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Anggota {
	@SerializedName("id_puskeswan")
	private String id_puskeswan;

	@SerializedName("nama_kepala")
	private String nama_kepala;

	@SerializedName("TTL")
	private String ttl;

	@SerializedName("image")
	private String image;

	@SerializedName("deskripsi")
	private String deskripsi;


	public String getId_puskeswan() {
		return id_puskeswan;
	}

	public void setId_puskeswan(String id_puskeswan) {
		this.id_puskeswan = id_puskeswan;
	}

	public String getNama_kepala() {
		return nama_kepala;
	}

	public void setNama_kepala(String nama_kepala) {
		this.nama_kepala = nama_kepala;
	}

	public String getTtl() {
		return ttl;
	}

	public void setTtl(String ttl) {
		this.ttl = ttl;
	}

	public String getImage() {
		return image;
	}

	public void setImage(String image) {
		this.image = image;
	}

	public String getDeskripsi() {
		return deskripsi;
	}

	public void setDeskripsi(String deskripsi) {
		this.deskripsi = deskripsi;
	}

	public Anggota(String id_puskeswan, String nama_kepala, String ttl, String deskripsi, String image) {

		this.id_puskeswan = id_puskeswan;
		this.nama_kepala = nama_kepala;
		this.ttl = ttl;
		this.deskripsi = deskripsi;
		this.image = image;


	}






}
