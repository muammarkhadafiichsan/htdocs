package com.jemberdeveloper.slidingtab.model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetKunjungan {

	@SerializedName("status")
	String status;
	@SerializedName("result")
	List<Kunjungan> listDatakunjungan;
	@SerializedName("message")
	String message;

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public List<Kunjungan> getListDatakunjungan() {
		return listDatakunjungan;
	}

	public void setListDataforum(List<Kunjungan> listDatakunjungan) {
		this.listDatakunjungan = listDatakunjungan;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}
}



