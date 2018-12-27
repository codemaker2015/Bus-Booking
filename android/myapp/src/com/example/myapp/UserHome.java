package com.example.myapp;

import java.util.Calendar;

import org.json.JSONObject;
import org.w3c.dom.Text;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.view.View.OnTouchListener;
import android.widget.DatePicker;
import android.widget.ImageButton;
import android.widget.TextView;

public class UserHome extends Activity{
		
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.main);
		
		final TextView txtsrc=(TextView) findViewById(R.id.txtSrc);
		final TextView txtdest=(TextView) findViewById(R.id.txtDest);
		final TextView txtdate=(TextView) findViewById(R.id.txtDate);
		ImageButton select=(ImageButton) findViewById(R.id.cmdSel);
		
		Calendar c = Calendar.getInstance();
		int year = c.get(Calendar.YEAR);
		int month = c.get(Calendar.MONTH);
		int day = c.get(Calendar.DAY_OF_MONTH);
		
		txtdate.setText(new StringBuilder().append(month + 1).append("/").append(day).append("/").append(year));
		
		select.setOnTouchListener(new OnTouchListener() {
			
			@Override
			public boolean onTouch(View v, MotionEvent event) {
				if(event.getAction() == MotionEvent.ACTION_UP){
					
					String src=txtsrc.getText().toString();
					String dest=txtdest.getText().toString();
					String date=txtdate.getText().toString();
					
					Intent i=new Intent(UserHome.this, SelectBusActivity.class);
					i.putExtra("src", src);
					i.putExtra("dest", dest);
					i.putExtra("date", date);
					startActivity(i);
					
					return true;
				}
					
				return false;
			}
		});
	}
	

}
