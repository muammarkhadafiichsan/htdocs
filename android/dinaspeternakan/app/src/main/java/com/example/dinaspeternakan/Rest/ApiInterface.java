package com.example.dinaspeternakan.Rest;

import com.example.dinaspeternakan.Model.GetArtikel;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ApiInterface {

    @GET("Artikel1")
    Call<GetArtikel> getArtikel();

}
