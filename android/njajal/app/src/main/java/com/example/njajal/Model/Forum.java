package com.example.njajal.Model;
import com.google.gson.annotations.SerializedName;


public class Forum {

	@SerializedName("id_forum")
	private String id_forum;
	@SerializedName("nama_peternak")
	private String nama_peternak;
	@SerializedName("ternak")
	private String ternak;
	@SerializedName("alamat")
	private String alamat;
	@SerializedName("ternak_jual")
	private String ternak_jual;
	@SerializedName("harga")
	private String harga;
	@SerializedName("stok")
	private String stok;
	@SerializedName("foto")
	private String foto;
	@SerializedName("detail")
	private String detail;


	public Forum(){}

	public Forum(String id_forum, String nama_peternak, String ternak, String alamat, String ternak_jual, String harga, String stok, String foto, String detail) {
		this.id_forum = id_forum;
		this.nama_peternak = nama_peternak;
		this.ternak = ternak;
		this.alamat = alamat;
		this.ternak_jual = ternak_jual;
		this.harga = harga;
		this.stok = stok;
		this.foto = foto;
		this.detail = detail;
	}

	public String getId_forum() {
		return id_forum;
	}

	public void setId_forum(String id_forum) {
		this.id_forum = id_forum;
	}

	public String getNama_peternak() {
		return nama_peternak;
	}

	public void setNama_peternak(String nama_peternak) {
		this.nama_peternak = nama_peternak;
	}

	public String getTernak() {
		return ternak;
	}

	public void setTernak(String ternak) {
		this.ternak = ternak;
	}

	public String getAlamat() {
		return alamat;
	}

	public void setAlamat(String alamat) {
		this.alamat = alamat;
	}

	public String getTernak_jual() {
		return ternak_jual;
	}

	public void setTernak_jual(String ternak_jual) {
		this.ternak_jual = ternak_jual;
	}

	public String getHarga() {
		return harga;
	}

	public void setHarga(String harga) {
		this.harga = harga;
	}

	public String getStok() {
		return stok;
	}

	public void setStok(String stok) {
		this.stok = stok;
	}

	public String getFoto() {
		return foto;
	}

	public void setFoto(String foto) {
		this.foto = foto;
	}

	public String getDetail() {
		return detail;
	}

	public void setDetail(String detail) {
		this.detail = detail;
	}
}
