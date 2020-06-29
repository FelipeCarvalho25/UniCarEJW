package com.example.unicarejfw.cadastro;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.unicarejfw.R;
import com.example.unicarejfw.login.LoginActv;
import com.example.unicarejfw.webservice_connect.PostService;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.concurrent.ExecutionException;

public class CadUserActv extends AppCompatActivity {
    EditText etCodigo;
    EditText etNome;
    EditText etEmail;
    EditText etCelular;
    EditText etSenha;
    EditText etConfirmSenha;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.cadastro_actv);

        etNome = findViewById(R.id.et_nome);
        etCodigo = findViewById(R.id.codigo_aluno);
        etEmail = findViewById(R.id.et_email);
        etCelular = findViewById(R.id.et_numero);
        etSenha = findViewById(R.id.et_senha);
        etConfirmSenha = findViewById(R.id.et_confirm_senha);


        Button clickCriar = findViewById(R.id.btncaduser);
        clickCriar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                criarWS();
            }
        });
    }
    private void criarWS() {
        String nome = etNome.getText().toString().trim();
        String codAluno = etCodigo.getText().toString().trim();
        String email = etEmail.getText().toString().trim();
        String celular = etCelular.getText().toString().trim();
        String senha = etSenha.getText().toString().trim();
        String confirmSenha = etConfirmSenha.getText().toString().trim();
        if(nome.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe o nome!", Toast.LENGTH_LONG).show();
        } else if (codAluno.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe o logradouro!", Toast.LENGTH_LONG).show();
        } else if (email.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe um email!", Toast.LENGTH_LONG).show();
        } else if (senha.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe a cidade!", Toast.LENGTH_LONG).show();
        } else if (celular.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, informe o celular!", Toast.LENGTH_LONG).show();
        } else if (confirmSenha.equals("")) {
            Toast.makeText(getApplicationContext(), "Por favor, confirme a senha!", Toast.LENGTH_LONG).show();
        /*}else if (senha!=confirmSenha) {
            Toast.makeText(getApplicationContext(), "As senhas devem ser iguais!", Toast.LENGTH_LONG).show();*/
        }else{
            try {
                JSONObject jsonParam = new JSONObject();
                jsonParam.put("id", codAluno);
                jsonParam.put("nome", nome);
                jsonParam.put("email", email);
                jsonParam.put("numero_telefone", celular);
                jsonParam.put("pass_w", senha);
                String retorno = new PostService(jsonParam.toString(), "http://localhost:8080/UniCar/webservice/user/user-register.php").execute().get();
                if (!retorno.equals("false")) {
                    Toast.makeText(getApplicationContext(), "Usuário cadastrado!", Toast.LENGTH_LONG).show();
                    Intent i = new Intent(getApplicationContext(), LoginActv.class);
                    startActivity(i);
                }
            } catch (InterruptedException | ExecutionException | JSONException e) {
                e.printStackTrace();
            }
        }
    }
}
