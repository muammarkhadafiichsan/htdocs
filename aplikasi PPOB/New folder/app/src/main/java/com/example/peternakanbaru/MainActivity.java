package com.example.peternakanbaru;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TabHost;
public class MainActivity extends AppCompatActivity {
    /** Called when the activity is first created. */
    TabHost tabs;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tabs = (TabHost)findViewById(R.id.tabhost);
        tabs.setup();
        TabHost.TabSpec spec = tabs.newTabSpec("Tag1");
        //Kita akan mendeklarasikan tab 1
        spec.setContent(R.id.tab1);
        spec.setIndicator("Berita");
        tabs.addTab(spec);
        //tab 2
        spec = tabs.newTabSpec("Tag 2");
        spec.setContent(R.id.tab2);
        spec.setIndicator("Layanan");
        tabs.addTab(spec);
        tabs.setCurrentTab(0);
        //tab 3
        spec = tabs.newTabSpec("Tag 3");
        spec.setContent(R.id.tab3);
        spec.setIndicator("Galeri");
        tabs.addTab(spec);
        tabs.setCurrentTab(0);
    }
}