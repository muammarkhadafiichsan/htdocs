package com.example.dinaspeternakan;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;

public class MainActivity extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener{

	public static DuaFragment ma;
	private TabAdapter tabAdapter;
	private TabLayout tabLayout;
	private ViewPager viewPager;
	private Toolbar toolbar;
	private int[] tabIcon = {
			R.drawable.ic_berita_24dp,
			R.drawable.ic_layanan_24dp,
			R.drawable.upt,
			R.drawable.kunjungan,
			R.drawable.ic_akun_24dp,
	};

	@SuppressLint("ResourceType")
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);

		// kita set default nya Home Fragment
		loadFragment(new SatuFragment());
		// inisialisasi BottomNavigaionView
		BottomNavigationView bottomNavigationView = findViewById(R.id.bn_main);
		// beri listener pada saat item/menu bottomnavigation terpilih
		bottomNavigationView.setOnNavigationItemSelectedListener(this);
	}

	private boolean loadFragment(Fragment fragment){
		if (fragment != null) {
			getSupportFragmentManager().beginTransaction()
					.replace(R.id.fl_container, fragment)
					.commit();
			return true;
		}
		return false;
	}

	@Override
	public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
		Fragment fragment = null;
		switch (menuItem.getItemId()){
			case R.id.home_menu:
				fragment = new SatuFragment();
				break;
			case R.id.layanan:
				fragment = new DuaFragment();
				break;
			case R.id.galeri:
				fragment = new TigaFragment();
				break;
			case R.id.notif_menu:
				fragment = new EmpatFragment();
				break;
			case R.id.akun_menu:
				fragment = new LimaFragment();
				break;
		}
		return loadFragment(fragment);
	}
}
