package com.example.digiquapps

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.telecom.Call
import android.widget.Toast
import androidx.appcompat.app.AlertDialog
import androidx.recyclerview.widget.DividerItemDecoration
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import okhttp3.Response
import javax.security.auth.callback.Callback

class MainActivity : AppCompatActivity(), RecyclerViewAdapter.kitabClickListener {
    var KitabsData: ArrayList<Kitabs> = ArrayList()
    override fun getItem(position: Int) {
        val alertDialog = AlertDialog.Builder(this@MainActivity)
        alertDialog.setTitle(KitabsData.get(position).Kategori)
        alertDialog.setPositiveButton("OK") { dialog, which ->
            Toast.makeText(this@MainActivity, "OK", Toast.LENGTH_SHORT).show()
        }
//        alertDialog.setNegativeButton("No") { dialog, which ->
//            Toast.makeText(this@MainActivity, "No", Toast.LENGTH_SHORT).show()
//        }
        alertDialog.show()
    }
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        var recyclerView: RecyclerView = findViewById(R.id.recyclerview_demo)
        recyclerView.layoutManager = LinearLayoutManager(this)
        recyclerView.addItemDecoration(DividerItemDecoration(this, DividerItemDecoration.VERTICAL))
        var apiInterface: ApiInterface = ApiClient().getApiClient()!!.create(ApiInterface::class.java)
        apiInterface.getKitabsList().enqueue(object : Callback<ArrayList<Kitabs>> {
            override fun onResponse(call: Call<ArrayList<Kitabs>>?, response: Response<ArrayList<Kitabs>>?) {
                KitabsData = response?.body()!!
                recyclerView.adapter = RecyclerViewAdapter(response?.body()!!, this@MainActivity)
            }

            override fun onFailure(call: Call<ArrayList<Kitabs>>?, t: Throwable?) {
            }
        })
    }
}
