package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class PostPutDelBisnis {
	@SerializedName("status")
	String status;
	@SerializedName("result")
	Bisnis mBisnis;
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

	public Bisnis getBisnis() {
		return mBisnis;
	}

	public void setmBisnis(Bisnis Bisnis) {
		mBisnis = Bisnis;
	}

}
