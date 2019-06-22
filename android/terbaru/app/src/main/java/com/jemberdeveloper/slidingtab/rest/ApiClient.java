package com.jemberdeveloper.slidingtab.rest;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;



public class ApiClient {

	public static final String base_url = "http://192.168.43.2/rest_api/index.php/api/";

	private static Retrofit retrofit;

	public static Retrofit getClient() {
		if (retrofit == null) {
			retrofit = new Retrofit.Builder()
					.baseUrl(base_url)
					.addConverterFactory(GsonConverterFactory.create())
					.build();
		}

		return retrofit;
	}
}
