package com.example.unicarejfw.ui.msg;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.fragment.app.Fragment;

import com.example.unicarejfw.R;

public class TabNotificacoesFragment extends Fragment {

    public static TabNotificacoesFragment newInstance() {
        TabNotificacoesFragment fragment = new TabNotificacoesFragment();
        return fragment;
    }

    public TabNotificacoesFragment() {
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
        return inflater.inflate(R.layout.tab2fragment, container, false);
    }

}