package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class GetArtikel {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	List<Artikel> listDataArtikel;
	@SerializedName("message")
	String message;

	public String getStatus() {
		return status;
	}
	public void setStatus(String status) {
		this.status = status;
	}

	public String getMessage() {
		return message;
	}
	public void setMessage(String message) {
		this.message = message;
	}

	public List<Artikel> getListDataArtikel() {
		return listDataArtikel;
	}
	public void setListDataKontak(List<Artikel> listDataKontak) {
		this.listDataArtikel = listDataArtikel;
	}
}
