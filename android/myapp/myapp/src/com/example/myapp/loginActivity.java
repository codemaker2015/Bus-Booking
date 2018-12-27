package com.example.myapp;
import library.UserFunctions;

import org.json.JSONException;
import org.json.JSONObject;


import com.example.myapp.R;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class loginActivity extends Activity {
	EditText email;
	EditText passwd;
	Button loginbtn;
	 JSONObject jObj;
	 private static String KEY_SUCCESS = "success";
	 private static String KEY_ERROR="error";
	 private static String KEY_USERNAME="username";
	 private static String KEY_NAME="name";
	 private static String KEY_ID="uid";
	 private static String KEY_BUSID="Busid";
	 private static String KEY_BUS_REGNO="Bus_Regno";
	 String un,pwd;
	@Override
	
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.login);
		
		
		email = (EditText) findViewById(R.id.editText1);
        passwd = (EditText) findViewById(R.id.editText2);
        loginbtn=(Button) findViewById(R.id.button1);
        loginbtn.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				 un=email.getText().toString();
				 pwd=passwd.getText().toString();
               LoginAsync ss=new LoginAsync();
               String params = null;
			ss.execute(params);
				
			}
		});
       
	} 
       public class LoginAsync extends AsyncTask<String, Void, JSONObject>
        {
			@Override
			protected JSONObject doInBackground(String... params) {
				// TODO Auto-generated method stub
				 UserFunctions userFunction = new UserFunctions();
				  
	             jObj = userFunction.loginUser(un, pwd);
	                System.out.println("in login activity   :"+jObj.toString());
	                // check for login response
	                System.out.println("in login activity  for first tym :"+jObj.toString());
		          	
		           


					
				return jObj ;
			}
			@Override
			protected void onPostExecute(JSONObject jObj) {
			// TODO Auto-generated method stub
		//	super.onPostExecute(jObj);
			try
			{
				
			 String err=jObj.getString(KEY_ERROR);
         	 
             if (jObj.getString("success") != null) {
            	// System.out.println("in login activity   :"+err);
            	 Toast.makeText(getApplicationContext(),"in post", Toast.LENGTH_SHORT).show();
                 String res = jObj.getString(KEY_SUCCESS);
                 String uname=jObj.getString(KEY_USERNAME);
               	 String na=jObj.getString(KEY_NAME);
               	 String uid=jObj.getString(KEY_ID);
               	 String busid=jObj.getString(KEY_BUSID);
               	 String busregno=jObj.getString(KEY_BUS_REGNO);
            	
                 
                 if(Integer.parseInt(res) == 1){
                     // user successfully logged in
                     // Store user details in SQLite Database
                    
                 //    JSONObject json_user = json.getJSONObject("user");

                     // Clear all previous data in database
                 	 Toast.makeText(getApplicationContext(),uname, Toast.LENGTH_SHORT).show();
                 	 Toast.makeText(getApplicationContext(),na, Toast.LENGTH_SHORT).show();
                 	 Toast.makeText(getApplicationContext(),uid, Toast.LENGTH_SHORT).show();
                 	Toast.makeText(getApplicationContext(),busid, Toast.LENGTH_SHORT).show();                     
                 	Toast.makeText(getApplicationContext(),busregno, Toast.LENGTH_SHORT).show();                     

                     // Launch Dashboard Screen
                     Intent dashboard = new Intent(getApplicationContext(), AgentHome.class);

                     // Close all views before launching Dashboard
                     dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                     dashboard.putExtra("bus_reg_no", busregno);
                     dashboard.putExtra("name", uname);
                     startActivity(dashboard);

                     // Close Login Screen
                     finish();
                 }else{
                     // Error in login
                   Toast.makeText(getApplicationContext(), "Invalid username or password", Toast.LENGTH_LONG).show();
                 }
             }
			}
             catch (Exception e) {
				e.printStackTrace();
			}
			}
        	
        
	

        }}
