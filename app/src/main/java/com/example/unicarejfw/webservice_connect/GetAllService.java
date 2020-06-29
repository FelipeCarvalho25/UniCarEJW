package com.example.unicarejfw.webservice_connect;
import android.os.AsyncTask;

import com.example.unicarejfw.cadastro.DadosUser;
import com.google.gson.Gson;

import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Scanner;

public class GetAllService extends AsyncTask<Void, Void, DadosUser[]> {

    private String pagina, numreg, url;
    public GetAllService(String pg, String nr, String url) {
        this.pagina = pg;
        this.numreg = nr;
        this.url = url;
    }

    @Override
    protected DadosUser[] doInBackground(Void... voids) {
        StringBuilder resposta = new StringBuilder();
        try {
            String s_url = this.url + this.pagina + "&numreg=" + this.numreg;
            URL url = new URL(s_url);

            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("GET");
            connection.setRequestProperty("Content-type", "application/json");
            connection.setRequestProperty("Accept", "application/json");
            connection.setDoOutput(false);
            connection.setConnectTimeout(5000);
            connection.connect();

            Scanner scanner = new Scanner(url.openStream());
            while (scanner.hasNext()) {
                resposta.append(scanner.nextLine());
            }
            connection.disconnect();
        } catch (IOException e) {
            e.printStackTrace();
        }
        Gson gson = new Gson();
        return gson.fromJson(resposta.toString(), DadosUser[].class);
    }
}
