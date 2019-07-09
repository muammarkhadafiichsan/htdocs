package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class PostPutDelArtikel {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	Artikel mArtikel;
	@SerializedName("message")
	String message;

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public Artikel getmArtikel() {
		return mArtikel;
	}

	public void setmArtikel(Artikel mArtikel) {
		this.mArtikel = mArtikel;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}
}
