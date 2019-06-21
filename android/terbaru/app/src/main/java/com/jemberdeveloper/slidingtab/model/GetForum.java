package com.jemberdeveloper.slidingtab.model;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetForum {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	List<Forum> listDataforum;
	@SerializedName("message")
	String message;

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public List<Forum> getListDataforum() {
		return listDataforum;
	}

	public void setListDataforum(List<Forum> listDataforum) {
		this.listDataforum = listDataforum;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}
}
