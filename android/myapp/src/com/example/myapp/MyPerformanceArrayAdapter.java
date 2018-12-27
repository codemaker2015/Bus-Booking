package com.example.myapp;

import java.util.List;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class MyPerformanceArrayAdapter extends ArrayAdapter<String> {
	private final Context context;
	
	private final String[] model;
	private final String[] type;
	private final String[] start;
	private final String[] seat;
	
	static class ViewHolder {
		
		public TextView busmodel;
		public TextView bustype;
		public TextView busstarttime;	
		public TextView seats;
	
		public ImageView image;
	}

	public MyPerformanceArrayAdapter(Context context, int textid, String[] busmodel, String[] bustype, String[] busstarttime, String[] seats) {
		//super(context, textid);//, busmodel, bustype, busstarttime, seats);
		//super(context, R.layout.single, busmodel);
		super(context, textid);
		this.context = context;
		this.type = bustype;
		this.start = busstarttime;
		this.seat = seats;
		this.model = busmodel;
	}


	@Override
	public View getView(int position, View convertView, ViewGroup parent) {
		
		View rowView = convertView;
		if (rowView == null) {
			LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
			rowView = inflater.inflate(R.layout.single, null);
			ViewHolder viewHolder = new ViewHolder();
			
			viewHolder.busmodel = (TextView) rowView.findViewById(R.id.bmodel);
			viewHolder.bustype=(TextView) rowView.findViewById(R.id.btype);
			viewHolder.busstarttime=(TextView) rowView.findViewById(R.id.sttime);
			viewHolder.seats=(TextView) rowView.findViewById(R.id.seat);
			
			viewHolder.image = (ImageView) rowView.findViewById(R.id.cmdSel);
			rowView.setTag(viewHolder);
		}

		ViewHolder holder = (ViewHolder) rowView.getTag();
	
		holder.busmodel.setText(model[position]);
		holder.bustype.setText(type[position]);
		holder.busstarttime.setText(start[position]);
		holder.seats.setText(seat[position]);
		
		holder.image.setImageResource(R.drawable.logo_new);

		return rowView;
	}
}