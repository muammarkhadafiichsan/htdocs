package com.example.dinaspeternakan.Rest;

import com.example.dinaspeternakan.Model.GetArtikel;
import com.example.dinaspeternakan.Model.GetBisnis;
import com.example.dinaspeternakan.Model.GetUpt;
import com.example.dinaspeternakan.Model.PostPutDelBisnis;
import com.example.dinaspeternakan.Model.RegisterPost;
import com.example.dinaspeternakan.User.ResponseLogin;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {

    @GET("Artikel1")
    Call<GetArtikel> getArtikel();

	@GET("UPT_rest_API")
	Call<GetUpt> getUpt();

	@GET("forum_bisnis_API")
	Call<GetBisnis> getBisnis();

	@FormUrlEncoded
	@POST("Forum_bisnis_API")
	Call<PostPutDelBisnis> postBisnis(
									  @Field("judul_bisnis") String judul_bisnis,
									  @Field("nama_peternak") String nama,
									  @Field("no_telephon") String nomor,
									  @Field("alamat") String provider,
									  @Field("diskripsi") String harga);

	@FormUrlEncoded
	@PUT("Bisnis")
	Call<PostPutDelBisnis> putBisnis(
									 @Field("jusul_bisnis") String judul_bisnis,
									@Field("nama_peternak") String nama,
									@Field("no_telephon") String nomor,
									@Field("alamat") String provider,
									@Field("diskripsi") String harga);

	@FormUrlEncoded
	@HTTP(method = "DELETE", path = "kontak", hasBody = true)
	Call<PostPutDelBisnis> deleteBisnis(@Field("id") String id);

	@FormUrlEncoded
	@POST("Login_android")
	Call<ResponseLogin> login(@Field("email") String email,
							  @Field("password") String password);

	@FormUrlEncoded
	@POST("Register_android")
	Call<RegisterPost> RegisterPost	 (@Field("name") String name,
									 @Field("email") String email,
										 @Field("role_id") String role_id,
										 @Field("is_active") String is_active,
									 @Field("password") String password);


}
