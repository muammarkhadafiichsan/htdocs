package com.jemberdeveloper.slidingtab.model;

import com.google.gson.annotations.SerializedName;

public class PostPutDelKunjungan {

	@SerializedName("status")
	String status;
	@SerializedName("result")
	Kunjungan mkunjungan;
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

	public Kunjungan getMkunjungan() {
		return mkunjungan;
	}

	public void setMforum(Kunjungan mkunjungan) {
		this.mkunjungan = mkunjungan;
	}
}



