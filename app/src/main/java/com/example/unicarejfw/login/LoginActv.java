package com.example.unicarejfw.login;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.unicarejfw.MainActivity;
import com.example.unicarejfw.R;
import com.example.unicarejfw.cadastro.CadUserActv;
import com.example.unicarejfw.cadastro.DadosUser;
import com.example.unicarejfw.webservice_connect.GetService;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.concurrent.ExecutionException;

public class LoginActv extends AppCompatActivity {
    EditText etCodAlun;
    EditText etSenha;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login_actv);

        etCodAlun = findViewById(R.id.et_cod_aluno);
        etSenha = findViewById(R.id.et_senha_login);

        Button clickLogar = findViewById(R.id.btn_login);
        clickLogar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                criarWS();
            }
        });
        Button clickCadastrar = findViewById(R.id.btn_cadastro);
        clickCadastrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(getApplicationContext(), CadUserActv.class);
                startActivity(i);
            }
        });
    }
    private void criarWS() {
        String codAluno = etCodAlun.getText().toString().trim();
        String senha = etSenha.getText().toString().trim();
        if (codAluno.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe o Codigo de Aluno para prosseguir!", Toast.LENGTH_LONG).show();
        }else if (senha.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe a senha para prosseguir!", Toast.LENGTH_LONG).show();
        }else{
            try {
                JSONObject jsonParam = new JSONObject();
                jsonParam.put("id", codAluno);
                jsonParam.put("pass_w", senha);
                DadosUser user = new GetService(jsonParam.toString(), "http://localhost:8080/UniCar/webservice/user/user-login.php" ).execute().get();
                if (user.getId()!=codAluno){
                    Toast.makeText(getApplicationContext(), "Não foi possível logar favor verifique o login e senha!", Toast.LENGTH_LONG).show();
                }
                Intent i = new Intent(getApplicationContext(), MainActivity.class);
                startActivity(i);
            } catch (ExecutionException | InterruptedException | JSONException e) {
                e.printStackTrace();
            }
        }
    }
}