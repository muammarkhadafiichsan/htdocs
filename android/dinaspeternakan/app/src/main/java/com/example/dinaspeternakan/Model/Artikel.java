package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Artikel {

	@SerializedName("nama")
	private String nama;

	public Artikel(){}

	public Artikel(String nama) {

		this.nama = nama;

	}


	public String getNama() {
		return nama;
	}

	public void setNama(String nama) {
		this.nama = nama;
	}



}
