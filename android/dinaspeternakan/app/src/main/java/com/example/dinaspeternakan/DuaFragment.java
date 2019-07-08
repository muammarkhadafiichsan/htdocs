package com.example.dinaspeternakan;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;


/**
 * A simple {@link Fragment} subclass.
 */
public class DuaFragment extends Fragment implements View.OnClickListener {

    private LinearLayout forumbisnis;
    private LinearLayout kunjunganternak;
    private CardView jualbeli;
    public DuaFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_dua, container, false);

        forumbisnis = (LinearLayout) view.findViewById(R.id.forumbisnis);
        forumbisnis.setOnClickListener(this);

        kunjunganternak = (LinearLayout) view.findViewById(R.id.kunjunganternak);
        kunjunganternak.setOnClickListener(this);



        return  view;
    }


    @Override
    public void onClick(View view) {
        if(view == forumbisnis){
            Intent intent =new Intent(getActivity(),ForumBisnis.class);
            startActivity(intent);
        }

        if(view == kunjunganternak){
            Intent intent =new Intent(getActivity(),KunjunganTernak.class);
            startActivity(intent);
        }
        if(view == jualbeli){
            Intent intent =new Intent(getActivity(),Labupt.class);
            startActivity(intent);
        }
    }
}
