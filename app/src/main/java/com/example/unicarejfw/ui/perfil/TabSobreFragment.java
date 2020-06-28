package com.example.unicarejfw.ui.perfil;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.fragment.app.Fragment;

import com.example.unicarejfw.R;

public class TabSobreFragment extends Fragment {

    public static TabSobreFragment newInstance() {
        TabSobreFragment fragment = new TabSobreFragment();
        return fragment;
    }

    public TabSobreFragment() {
        // Deve existir um construtor vazio
        // na classe que estende um Fragment
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.tab_sobre_fragment, container, false);
    }

}