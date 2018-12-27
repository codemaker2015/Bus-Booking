package com.example.myapp;

import library.UserFunctions;

import org.json.JSONObject;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

public class Reservation extends Activity{
	
	private static String loginURL = "http://10.0.2.2/busbk/webservice/json_req.php";
	private static String KEY_SUCCESS = "success";
	private static String KEY_ERROR="error";

	private static String KEY_USERNAME="username";
	 private static String KEY_NAME="name";
	 private static String KEY_ID="uid";
	 private static String KEY_BUSID="Busid";
	 private static String KEY_BUS_REGNO="Bus_Regno";
	 private static String KEY_BUS_FARE="Bus_Fare";
	 
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.reservation);
		
		ImageButton res=(ImageButton) findViewById(R.id.imageButton1);
		
		res.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				EditText seats=(EditText) findViewById(R.id.txtseats);
				EditText name=(EditText) findViewById(R.id.txtname);
				EditText vid=(EditText) findViewById(R.id.txtVid);
				EditText age=(EditText) findViewById(R.id.txtAge);
				EditText credit=(EditText) findViewById(R.id.txtCredNo);
				
				String s,n,vi,a,c;
				
				s=seats.getText().toString();
				n=name.getText().toString();
				vi=vid.getText().toString();
				a=age.getText().toString();
				c=credit.getText().toString();
				
				Intent dashboard = new Intent(getApplicationContext(), Ticket.class);

				dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
				dashboard.putExtra("seats", s);
				dashboard.putExtra("name", n);
				dashboard.putExtra("fare", "45");
				startActivity(dashboard);
								
				//ReserveAsync upload=new ReserveAsync();
				//upload.execute(s, n, vi, a, c);
			}
		});				
	}
	
	public class ReserveAsync extends AsyncTask<String, Void, JSONObject> {
		
		String s,n,vi,a,c;
		@Override
		protected JSONObject doInBackground(String... params) {
			JSONObject jObj=null;		
			
			s=params[0];
			n=params[1];
			vi=params[2];
			a=params[3];
			c=params[4];
			
			//loginURL += "?seats="+s+"&name="+n+"&votersid="+vi+"&age"+a+"&accno="+c;
			
			//UserFunctions userFunction = new UserFunctions();
			//jObj = userFunction.reserve(s,n,vi,a,c);
			
			Intent dashboard = new Intent(getApplicationContext(), Ticket.class);

			dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
			dashboard.putExtra("seats", s);
			dashboard.putExtra("name", n);
			dashboard.putExtra("fare", "45");
			startActivity(dashboard);
			
			//System.out.println("in reservation activity   :" + jObj.toString());

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

							Toast.makeText(getApplicationContext(), "in post", Toast.LENGTH_SHORT).show();
							//String fare = jObj.getString(KEY_BUS_FARE);
							
							Intent dashboard = new Intent(getApplicationContext(), Ticket.class);

							dashboard.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
							dashboard.putExtra("seats", s);
							dashboard.putExtra("name", n);
							dashboard.putExtra("fare", "45");
							startActivity(dashboard);

							finish();
					} else {
						// Error in login
						Toast.makeText(getApplicationContext(), "Invalid username or password", Toast.LENGTH_LONG).show();
					}
				}
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}

}
