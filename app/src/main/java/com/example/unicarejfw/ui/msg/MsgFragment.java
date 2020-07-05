package com.example.unicarejfw.ui.msg;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.lifecycle.ViewModelProviders;
import androidx.viewpager.widget.ViewPager;

import com.example.unicarejfw.R;
import com.google.android.material.tabs.TabLayout;

public class MsgFragment extends Fragment {

    private MsgViewModel msgViewModel;


    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        msgViewModel =
                ViewModelProviders.of(this).get(MsgViewModel.class);
        View root = inflater.inflate(R.layout.fragment_msg, container, false);

        // Tabs
        TabLayout tabs = (TabLayout) root.findViewById(R.id.tabLay);
        ViewPager pager = (ViewPager) root.findViewById(R.id.vpager);
        FragmentManager fragMan = getFragmentManager();
        TabsAdapterMsg adapter = new TabsAdapterMsg(fragMan);

        pager.setAdapter(adapter);
        tabs.setupWithViewPager(pager);

        return root;
    }


}
