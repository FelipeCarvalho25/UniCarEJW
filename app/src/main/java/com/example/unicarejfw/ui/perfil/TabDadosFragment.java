package com.example.unicarejfw.ui.perfil;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.fragment.app.Fragment;

import com.example.unicarejfw.R;

public class TabDadosFragment extends Fragment {

    public static TabDadosFragment newInstance() {
        TabDadosFragment fragment = new TabDadosFragment();
        return fragment;
    }

    public TabDadosFragment() {
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
        return inflater.inflate(R.layout.tab_dados_fragment, container, false);
    }

}