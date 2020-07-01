package com.example.unicarejfw.ui.perfil;

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

public class PerfilFragment extends Fragment {

    private PerfilViewModel perfilViewModel;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        perfilViewModel =
                ViewModelProviders.of(this).get(PerfilViewModel.class);
        View root = inflater.inflate(R.layout.fragment_perfil, container, false);

        // Tabs
        TabLayout tabs = (TabLayout) root.findViewById(R.id.tabLay);
        ViewPager pager = (ViewPager) root.findViewById(R.id.vpager);
        FragmentManager fragMan = getFragmentManager();
        TabsAdapterPerfil adapter = new TabsAdapterPerfil(fragMan);

        pager.setAdapter(adapter);
        tabs.setupWithViewPager(pager);
        return root;
    }
}
