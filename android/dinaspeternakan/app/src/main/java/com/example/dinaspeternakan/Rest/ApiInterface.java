package com.example.dinaspeternakan.Rest;

import com.example.dinaspeternakan.Model.GetAnggota;
import com.example.dinaspeternakan.Model.GetArtikel;
import com.example.dinaspeternakan.User.ResponseLogin;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {

    @GET("Artikel1")
    Call<GetArtikel> getArtikel();

	@GET("Anggota")
	Call<GetAnggota> getAnggota();

	@FormUrlEncoded
	@POST("Login_android")
	Call<ResponseLogin> login(@Field("email") String email,
							  @Field("password") String password);

}
