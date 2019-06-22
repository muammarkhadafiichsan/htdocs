package com.jemberdeveloper.slidingtab.rest;
import com.jemberdeveloper.slidingtab.model.GetForum;
import com.jemberdeveloper.slidingtab.model.GetKunjungan;
import com.jemberdeveloper.slidingtab.model.PostPutDelForum;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;


	public interface ApiInterface {

		@GET("item")
		Call<GetKunjungan> getkunjungan();

	@FormUrlEncoded
	@POST("kontak")
	Call<PostPutDelForum> postKontak(@Field("nama") String nama,
									 @Field("nomor") String nomor);
	@FormUrlEncoded
	@PUT("kontak")
	Call<PostPutDelForum> putKontak(@Field("id") String id,
									 @Field("nama") String nama,
									 @Field("nomor") String nomor);
	@FormUrlEncoded
	@HTTP(method = "DELETE", path = "kontak", hasBody = true)
	Call<PostPutDelForum> deleteKontak(@Field("id") String id);
}


