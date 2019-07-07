package com.example.dinaspeternakan.Model;


import com.google.gson.annotations.SerializedName;

/**
 * Created by root on 2/3/17.
 */

public class Artikel {
	@SerializedName("product_id")
	private String product_id;

	@SerializedName("name")
	private String name;

	@SerializedName("image")
	private String image;

	@SerializedName("description")
	private String description;


	public Artikel() {
	}

	public Artikel(String product_id, String name, String image, String description) {
		this.product_id = product_id;
		this.name = name;
		this.image = image;
		this.description = description;
	}

	public String getProduct_id() {
		return product_id;
	}

	public void setProduct_id(String product_id) {
		this.product_id = product_id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getImage() {
		return image;
	}

	public void setImage(String image) {
		this.image = image;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}




}
