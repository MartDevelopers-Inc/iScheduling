package com.martdevelopersinc.ischeduling;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class LoginActivity extends AppCompatActivity {
    Button DocLogInButton;
    Button ClientLogInButton;
    Button StaffLogin;
    Button AdminLoginIn;

    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //Log In As Doctor
        DocLogInButton = (Button) findViewById(R.id.doc_login);
        DocLogInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                logInDoctor();
            }
        });

        //Log In As Client
        ClientLogInButton = (Button) findViewById(R.id.client_login);
        ClientLogInButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                logInClient();
            }
        });

        //Login As Staff
        StaffLogin = (Button) findViewById(R.id.staff_login);
        StaffLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                logInStaff();
            }
        });


        //Login As admin
        AdminLoginIn =(Button)

        findViewById(R.id.admin_login);
                AdminLoginIn.setOnClickListener(new View.OnClickListener()

        {
            @Override
            public void onClick (View v){
            logInAdmin();
        }
        });
    }



        public void logInDoctor(){
            Intent intent = new Intent(this, WebViewActivity.class);
            startActivity(intent);
        }

        public void logInClient(){
            Intent intent = new Intent(this, ClientLogin.class);
            startActivity(intent);
        }

        public void logInStaff(){
            Intent intent = new Intent(this, StaffLogin.class);
            startActivity(intent);
        }

        public void logInAdmin(){
            Intent intent = new Intent(this, AdminLogin.class);
            startActivity(intent);
        }

}

