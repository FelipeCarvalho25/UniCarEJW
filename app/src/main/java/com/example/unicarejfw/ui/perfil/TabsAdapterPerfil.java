package com.example.unicarejfw.ui.perfil;


import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;


public class TabsAdapterPerfil extends FragmentPagerAdapter {

    private static final int NUM_TABS = 2;

    public TabsAdapterPerfil(FragmentManager fm) {
        super(fm);
    }

    @Override
    public Fragment getItem(int position) {
        switch(position){
            case 0:
                return TabSobreFragment.newInstance();
            default:
                return TabDadosFragment.newInstance();
        }
    }

    @Override
    public int getCount() {
        return NUM_TABS;
    }

    @Override
    public CharSequence getPageTitle(int position) {

        if (position == 0) {
            return "Sobre";
        }else{
            return "Dados";
        }

    }
}