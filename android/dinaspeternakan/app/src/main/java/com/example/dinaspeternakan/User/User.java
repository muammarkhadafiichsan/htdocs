package com.example.dinaspeternakan.User;


import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class User {


	@SerializedName("id")
	@Expose
	private String id;

	@SerializedName("name")
	@Expose
	private String name;

	@SerializedName("image")
	@Expose
	private String image;


	@SerializedName("email")
	@Expose
	private String email;


	@SerializedName("password")
	@Expose
	private String password;

	public User(String id, String nama, String image, String email, String password) {
		this.id = id;
		this.name = name;
		this.image = image;
		this.email = email;
		this.password = password;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getNama() {
		return name;
	}

	public void setNama(String nama) {
		this.name = name;
	}

	public String getImage() {
		return image;
	}

	public void setImage(String image) {
		this.image = image;
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

}
