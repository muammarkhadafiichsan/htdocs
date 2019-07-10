package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class GetBisnis {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	List<Bisnis> listDataBisnis;
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

	public List<Bisnis> getListDataBisnis() {
		return listDataBisnis;
	}
	public void setListDataBisnis(List<Bisnis> listDataBisnis) {
		this.listDataBisnis = listDataBisnis;
	}
}
