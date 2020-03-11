package com.example.digiquapps

import retrofit2.Call
import retrofit2.http.POST

/**
 * Created by Dumadu on 26-Oct-17.
 */
public interface ApiInterface {

    @POST("E1Pn7khWG")
    fun getKitabsList(): Call<ArrayList<Kitabs>>
}