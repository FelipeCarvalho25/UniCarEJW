package com.example.unicarejfw.ui.finder;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.Observer;
import androidx.lifecycle.ViewModelProviders;

import com.example.unicarejfw.R;

public class FinderFragment extends Fragment {

    private FinderViewModel finderViewModel;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        finderViewModel =
                ViewModelProviders.of(this).get(FinderViewModel.class);
        View root = inflater.inflate(R.layout.fragment_finder, container, false);
        return root;
    }
}
