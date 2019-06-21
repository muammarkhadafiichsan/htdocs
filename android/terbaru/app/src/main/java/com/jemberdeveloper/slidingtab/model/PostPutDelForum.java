package com.jemberdeveloper.slidingtab.model;
import com.google.gson.annotations.SerializedName;

public class PostPutDelForum {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	Forum mforum;
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

	public Forum getMforum() {
		return mforum;
	}

	public void setMforum(Forum mforum) {
		this.mforum = mforum;
	}
}
