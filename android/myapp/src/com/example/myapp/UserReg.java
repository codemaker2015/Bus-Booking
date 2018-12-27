package com.example.myapp;

import library.UserFunctions;

import org.json.JSONException;
import org.json.JSONObject;
import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class UserReg extends Activity {
EditText name,pswd,cpwd,email;
Button save,login;
RadioButton m,f;
String gender;
RadioGroup rd;
RadioButton radioSexButton;
JSONObject jObj;
String uname,psd,cpsd,mail;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.userreg);
		name=(EditText) findViewById(R.id.edtName);
		pswd=(EditText) findViewById(R.id.txtseats);
		cpwd=(EditText) findViewById(R.id.edtcnfrm);
		email=(EditText) findViewById(R.id.edtemail);
		save=(Button) findViewById(R.id.btnrgstr);
		login=(Button) findViewById(R.id.btnlgn);
		
		rd = (RadioGroup) findViewById(R.id.radioGroup1);
		save.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				uname=name.getText().toString();
			 psd=pswd.getText().toString();
				 cpsd=cpwd.getText().toString();
			 mail=email.getText().toString();
				int selectedId = rd.getCheckedRadioButtonId();
	 
				// find the radiobutton by returned id
			        radioSexButton = (RadioButton) findViewById(selectedId);
			        gender=radioSexButton.getText().toString();
			      if(psd.equalsIgnoreCase(cpsd)){
			        RegAsync  i=new RegAsync();
			        i.execute();
			      }
			      else{
			    	  
			    	  Toast.makeText(UserReg.this,
			  			"Invalid username or password", Toast.LENGTH_SHORT).show();
			      }
			      
				
			}
		});
		login.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
			Intent v=new Intent(getApplicationContext(), loginActivity.class);
			startActivity(v);
				
			}
		});
		
					
	}
	
	 public class RegAsync extends AsyncTask<String, Void, JSONObject>
     {
			@Override
			protected JSONObject doInBackground(String... params) {
				// TODO Auto-generated method stub
				 UserFunctions userFunction = new UserFunctions();
				  
	             try {
					jObj = userFunction.registerUser(uname,cpsd,mail,gender);
				} catch (JSONException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
	               	     	
		           			
				return jObj ;
			}
			@Override
			protected void onPostExecute(JSONObject jObj) {
			
			try
			{
				
			 String err=jObj.getString("error");
      	 
          if (jObj.getString("success") != null) {
             
              String res = jObj.getString("success");
              if(Integer.parseInt(res) == 1){
            	  Toast.makeText(getApplicationContext(),"Registration success", Toast.LENGTH_SHORT).show();           	
                 
              }
          }
			}
          catch (Exception e) {
				e.printStackTrace();
			}
			}
     	
     
	

     }
}
