package com.example.dinaspeternakan.Rest;

import com.example.dinaspeternakan.Model.GetArtikel;
import com.example.dinaspeternakan.Model.GetBisnis;
import com.example.dinaspeternakan.Model.GetUpt;
import com.example.dinaspeternakan.User.ResponseLogin;
import com.example.dinaspeternakan.User.ResponseRegister;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {

    @GET("Artikel1")
    Call<GetArtikel> getArtikel();

	@GET("UPT_rest_API")
	Call<GetUpt> getUpt();

	@GET("forum_bisnis_API")
	Call<GetBisnis> getBisnis();

	@FormUrlEncoded
	@POST("Login_android")
	Call<ResponseLogin> login(@Field("email") String email,
							  @Field("password") String password);

	@FormUrlEncoded
	@POST("Register_android")
	Call<ResponseRegister> register	(@Field("name") String name,
									  @Field("email") String email,
									  @Field("password") String password,
									  @Field("role_id") String role_id);

}
