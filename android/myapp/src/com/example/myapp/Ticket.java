package com.example.myapp;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ImageButton;
import android.widget.TextView;

public class Ticket extends Activity{
	
	String name= "";
	String seats= "";
	String fare= "";
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.ticket);
		
		name = getIntent().getExtras().getString("name");
		seats = getIntent().getExtras().getString("seats");
		fare = getIntent().getExtras().getString("fare");
		
		Integer total = Integer.parseInt(fare) * Integer.parseInt(seats);
		
		TextView nam=(TextView) findViewById(R.id.txtName);
		nam.setText(name);
		
		TextView tot=(TextView) findViewById(R.id.txttotal);
		tot.setText(total.toString());
		
		ImageButton im=(ImageButton) findViewById(R.id.imageButton1);
		im.setOnClickListener(new OnClickListener() {
			
			@Override
			public void onClick(View v) {
				finish();
			}
		});
	}

}
