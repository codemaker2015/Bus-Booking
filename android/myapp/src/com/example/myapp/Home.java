package com.example.myapp;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.widget.TextView;

public class Home  extends Activity
{
	
@Override
protected void onCreate(Bundle savedInstanceState) {
	// TODO Auto-generated method stub
	super.onCreate(savedInstanceState); 
	setContentView(R.layout.homepage);
	
	
	new Handler().postDelayed(new Runnable() {
		
		@Override
		public void run() {
			Intent in=new Intent(getApplicationContext(), loginActivity.class);
			startActivity(in);
			
		}
	}, 4000);
}
}
