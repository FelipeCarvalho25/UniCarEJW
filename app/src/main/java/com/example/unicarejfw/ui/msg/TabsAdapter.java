package com.example.unicarejfw.ui.msg;


import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;



public class TabsAdapter extends FragmentPagerAdapter {

    private static final int NUM_TABS = 2;

    public TabsAdapter(FragmentManager fm) {
        super(fm);
    }

    @Override
    public Fragment getItem(int position) {
        switch(position){
            case 0:
                return Tab1Fragment.newInstance();
            default:
                return Tab2Fragment.newInstance();
        }
    }

    @Override
    public int getCount() {
        return NUM_TABS;
    }

    @Override
    public CharSequence getPageTitle(int position) {

        if (position == 0) {
            return "Chat";
        }else{
            return "Notificações";
        }

    }
}