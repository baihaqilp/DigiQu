package com.example.digiquapps

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

/**
 * Created by Dumadu on 26-Oct-17.
 */
class RecyclerViewAdapter(var kitabsList: ArrayList<Kitabs>?, var itemClick: kitabClickListener) : RecyclerView.Adapter<RecyclerViewAdapter.RecyclerViewHolder>() {
    override fun getItemCount(): Int {
        return kitabsList!!.size
    }

    interface kitabClickListener {
        fun getItem(position: Int)
    }

    override fun onBindViewHolder(holder: RecyclerViewHolder, position: Int) {
        holder.bindData(kitabsList, position)
    }

    override fun onCreateViewHolder(parent: ViewGroup?, viewType: Int): RecyclerViewHolder {
        var view: View = LayoutInflater.from(parent!!.context).inflate(R.layout.item_list, parent, false)
        return RecyclerViewHolder(view, itemClick)
    }

    class RecyclerViewHolder(itemView: View, var itemClick: kitabClickListener) : RecyclerView.ViewHolder(itemView) {
        //    class RecyclerViewHolder(itemView: View) : RecyclerView.ViewHolder(itemView) {
        var textKategori: TextView = itemView.findViewById(R.id.kategori_name)
        fun bindData(kitabsList: ArrayList<Kitabs>?, position: Int) {
            textKategori.text = kitabsList!!.get(position).KitabName
            itemView.setOnClickListener(View.OnClickListener {
                itemClick.getItem(adapterPosition)
            })
        }
    }
}