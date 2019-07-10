package com.example.dinaspeternakan.Model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Ujang Wahyu on 04/01/2018.
 */
public class RegisterPost {
	@SerializedName("status")
	Boolean status;

	@SerializedName("message")
	String message;

	@SerializedName("email")
	String email;

	@SerializedName("password")
	String password;

	@SerializedName("name")
	String name;

	@SerializedName("id")
	String id;

	@SerializedName("image")
	String image;

	public RegisterPost(Boolean status, String message, String email, String password, String name, String id, String image) {
		this.status = status;
		this.message = message;
		this.email = email;
		this.password = password;
		this.name = name;
		this.id = id;
		this.image = image;
	}


	public Boolean getStatus() {
		return status;
	}

	public void setStatus(Boolean status) {
		this.status = status;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getImage() {
		return image;
	}

	public void setImage(String image) {
		this.image = image;
	}
}
