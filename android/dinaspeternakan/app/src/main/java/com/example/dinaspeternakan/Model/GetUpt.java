package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class GetUpt {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	List<Upt> listDataUpt;
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

	public List<Upt> getListDataUpt() { return listDataUpt;
	}
	public void setListDataUpt(List<Upt> listDataUpt) {
		this.listDataUpt = listDataUpt;
	}
}
