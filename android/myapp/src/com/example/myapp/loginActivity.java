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
import android.widget.RadioButton;
import android.widget.RadioGroup;
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
	 
	 RadioGroup rd;
	 RadioButton radiouser;
	 String un,pwd,usr;
	 int role;
	 
	@Override	
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.login);
		
		
		email = (EditText) findViewById(R.id.edtName);
        passwd = (EditText) findViewById(R.id.edtpd);
        loginbtn=(Button) findViewById(R.id.btnrgstr);
        rd=(RadioGroup) findViewById(R.id.radioGroup1);
        loginbtn.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				// TODO Auto-generated method stub
				 un=email.getText().toString();
				 pwd=passwd.getText().toString();
				 int selectedId = rd.getCheckedRadioButtonId();
				 
					// find the radiobutton by returned id
				        radiouser = (RadioButton) findViewById(selectedId);
				        usr=radiouser.getText().toString();
               LoginAsync ss=new LoginAsync();
               String params = null;
			ss.execute(params);
				
			}
		});
       
	} 

	public class LoginAsync extends AsyncTask<String, Void, JSONObject> {
		@Override
		protected JSONObject doInBackground(String... params) {
			// TODO Auto-generated method stub
			UserFunctions userFunction = new UserFunctions();
			if (usr.equals("Conductor")) {
				jObj = userFunction.loginUser(un, pwd);
				role = 1;
			} else if (usr.equals("Passenger")) {
				jObj = userFunction.loginPassenger(un, pwd);
				role = 2;
			}
			
			return jObj;
		}

		@Override
		protected void onPostExecute(JSONObject jObj) {
			// TODO Auto-generated method stub
			// super.onPostExecute(jObj);
			try {

				String err = jObj.getString(KEY_ERROR);

				if (jObj.getString("success") != null) {
					String res = jObj.getString(KEY_SUCCESS);

					if (Integer.parseInt(res) == 1) {
						if (role == 1) {

							Toast.makeText(getApplicationContext(), "in post",
									Toast.LENGTH_SHORT).show();
							String uname = jObj.getString(KEY_USERNAME);
							String na = jObj.getString(KEY_NAME);
							String uid = jObj.getString(KEY_ID);
							String busid = jObj.getString(KEY_BUSID);
							String busregno = jObj.getString(KEY_BUS_REGNO);

							Toast.makeText(getApplicationContext(), uname,
									Toast.LENGTH_SHORT).show();

							Intent dashboard = new Intent(
									getApplicationContext(), AgentHome.class);

							dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
							dashboard.putExtra("bus_reg_no", busregno);
							dashboard.putExtra("name", uname);
							startActivity(dashboard);

							finish();
						} else if (role == 2) {

							Intent dashboard = new Intent(
									getApplicationContext(), UserHome.class);

							dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);

							startActivity(dashboard);

							finish();

						}
					} else {
						// Error in login
						Toast.makeText(getApplicationContext(),
								"Invalid username or password",
								Toast.LENGTH_LONG).show();
					}
				}
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}
       
}
