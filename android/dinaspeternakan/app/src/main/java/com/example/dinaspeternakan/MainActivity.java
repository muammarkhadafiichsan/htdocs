package com.example.dinaspeternakan;

import android.annotation.SuppressLint;
import android.content.res.ColorStateList;
import android.graphics.drawable.Drawable;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.TabLayout;
import android.support.v4.graphics.drawable.DrawableCompat;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;

public class MainActivity extends AppCompatActivity {

    private TabAdapter tabAdapter;
    private TabLayout tabLayout;
    private ViewPager viewPager;
    private Toolbar toolbar;
    private int[] tabIcon = {
            R.drawable.ic_berita_24dp,
            R.drawable.ic_layanan_24dp,
            R.drawable.ic_galeri_24dp,
            R.drawable.notif,
            R.drawable.ic_akun_24dp,
    };

    @SuppressLint("ResourceType")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        toolbar = findViewById(R.id.main_toolbar);
        tabLayout = findViewById(R.id.tabLayout);
        viewPager = findViewById(R.id.viewPager);
        setSupportActionBar(toolbar);

        tabAdapter = new TabAdapter(getSupportFragmentManager());
        tabAdapter.addFragment(new SatuFragment(), "Tab 1");
        tabAdapter.addFragment(new DuaFragment(), "Tab 2");
		tabAdapter.addFragment(new TigaFragment(), "Tab 3");
        tabAdapter.addFragment(new EmpatFragment(), "Tab 4");
        tabAdapter.addFragment(new LimaFragment(), "Tab 5");


        viewPager.setAdapter(tabAdapter);
        tabLayout.setupWithViewPager(viewPager);

        tabLayout.getTabAt(0).setIcon(tabIcon[0]);
        tabLayout.getTabAt(1).setIcon(tabIcon[1]);
        tabLayout.getTabAt(2).setIcon(tabIcon[2]);
		tabLayout.getTabAt(3).setIcon(tabIcon[3]);
        tabLayout.getTabAt(4).setIcon(tabIcon[4]);



        ColorStateList colors;
        if (Build.VERSION.SDK_INT >= 28) {
            colors = getResources().getColorStateList(R.drawable.tab_icon, getTheme());
        }
        else {
            colors = getResources().getColorStateList(R.drawable.tab_icon);
        }

        for (int i = 0; i < tabLayout.getTabCount(); i++) {
            TabLayout.Tab tab = tabLayout.getTabAt(i);
            Drawable icon = tab.getIcon();

            if (icon != null) {
                icon = DrawableCompat.wrap(icon);
                DrawableCompat.setTintList(icon, colors);
            }
        }

    }
}
