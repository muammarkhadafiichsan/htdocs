package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Artikel {

	@SerializedName("name")
	private String name;

	public Artikel(){}

	public Artikel(String nama) {

		this.name = nama;

	}


	public String getNama() {
		return name;
	}

	public void setNama(String nama) {
		this.name = nama;
	}



}
