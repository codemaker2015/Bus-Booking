package com.example.myapp;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

public class SelectBusActivity extends Activity implements OnItemClickListener {

	private static String loginURL = "http://10.0.2.2/busbk/webservice/json_req.php";
	LayoutInflater inflater;

	String src= "";
	String dest= "";
	String date= "";
	String json = "";

	ArrayList<String> aList;	
	ArrayList<String> busid;
	ArrayList<String> busmodel;
	ArrayList<String> bustype;
	ArrayList<String> busstarttime;
	ArrayList<String> seats;
	Context c;
	
	ListView lv;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.selectbus);

		c=getApplicationContext();
        src = getIntent().getExtras().getString("src");
		dest = getIntent().getExtras().getString("dest");
		date = getIntent().getExtras().getString("date");

		aList = new ArrayList<String>();

		busid = new ArrayList<String>();
		busmodel = new ArrayList<String>();
		bustype = new ArrayList<String>();
		busstarttime = new ArrayList<String>();
		seats = new ArrayList<String>();

		inflater = (LayoutInflater) getSystemService(Context.LAYOUT_INFLATER_SERVICE);

		lv = (ListView) findViewById(R.id.listView1);
		GetBusDetails gbd=new GetBusDetails();
		gbd.execute();
		lv.setOnItemClickListener(this);
	}
	
	@Override
	public void onItemClick(AdapterView<?> parent, View v, int pos, long id) {

		Intent intent = new Intent(SelectBusActivity.this, Reservation.class);
		intent.putExtra("busid", busid.get(pos));
		startActivity(intent);
	}

	public class GetBusDetails extends AsyncTask<String, String, String>{
		ArrayList<HashMap<String, String>> myList = new ArrayList<HashMap<String, String>>();
		HashMap<String, String> map = new HashMap<String, String>();

		@Override
		protected String doInBackground(String... params) {
			InputStream is = null;
			String result = null;
			String line = null;

			List<NameValuePair> param = new ArrayList<NameValuePair>();
			
			param.add(new BasicNameValuePair("src", src));
			param.add(new BasicNameValuePair("dest", dest));
			param.add(new BasicNameValuePair("date", date));
			param.add(new BasicNameValuePair("tag", "busdetails"));
			try {
				HttpClient httpclient = new DefaultHttpClient();
				HttpPost httppost = new HttpPost(loginURL);
				httppost.setEntity(new UrlEncodedFormEntity(param));
				HttpResponse httpResponse = httpclient.execute(httppost);
				HttpEntity httpEntity = httpResponse.getEntity();
				is = httpEntity.getContent();
				BufferedReader reader = new BufferedReader(
						new InputStreamReader(is, "iso-8859-1"), 8);
				StringBuilder sb = new StringBuilder();
				while ((line = reader.readLine()) != null) {
					System.out.println(line);
					sb.append(line + "\n");
				}
				is.close();
				result = sb.toString();
				//JSONArray JA = new JSONArray(result);
				//JSONObject json1 = null;
				JSONObject json1=new JSONObject(result);
				
				for (int i = 0; i < 1; i++) {
					//json1 = JA.getJSONObject(i);

					busid.add(json1.getString("bus_id"));
					busmodel.add(json1.getString("bus_modelname"));
					seats.add(json1.getString("bus_totalseats"));
					bustype.add(json1.getString("bustype_name"));
					busstarttime.add(json1.getString("route_starttime"));

				}
			} catch (ClientProtocolException e) {
				e.printStackTrace();
			} catch (IllegalStateException e) {
				e.printStackTrace();
			} catch (UnsupportedEncodingException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} catch (JSONException e) {
				e.printStackTrace();
			}
			return result;
		}

		@Override
		protected void onPostExecute(String result) {
			Toast.makeText(getApplicationContext(), result, Toast.LENGTH_LONG).show();
			CustomAdapter adapter = new CustomAdapter(c, R.layout.selectbus,busid, busmodel, bustype, busstarttime, seats);
			lv.setAdapter(adapter);
			
			
			super.onPostExecute(result);
		}
	}

	// define your custom adapter
	private class CustomAdapter extends ArrayAdapter<String> {
	
		ArrayList<String> busid;
		ArrayList<String> busmodel;
		ArrayList<String> bustype;
		ArrayList<String> busstarttime;
		ArrayList<String> seats;
		
		ViewHolder viewHolder;

		public CustomAdapter(Context context, int textViewResourceId,
				ArrayList<String> busid,
				ArrayList<String> busmodel,
				ArrayList<String> bustype,
				ArrayList<String> busstarttime,
				ArrayList<String> seats				
				) {

			// let android do the initializing :)
			super(context, textViewResourceId, busmodel);
			this.busid=busid;
			this.busmodel = busmodel;
			this.bustype=bustype;
			this.busstarttime = busstarttime;
			this.seats = seats;
		}

		@Override
		public int getItemViewType(int position) {
			return (position == this.getCount() - 1) ? 1 : 0;
		}

		@Override
		public int getViewTypeCount() {
			return 2;
		}

		private class ViewHolder {
			TextView bid;
			TextView bmodel;
			TextView btype;
			TextView bstarttime;
			TextView seatnos;
		}

		@Override
		public View getView(final int position, View convertView, ViewGroup parent) {
			int theType = getItemViewType(position);
			if (convertView == null) {
				convertView = inflater.inflate(R.layout.single, null);
				viewHolder = new ViewHolder();
				viewHolder.bid = (TextView) convertView.findViewById(R.id.textViewid);
				viewHolder.bmodel = (TextView) convertView.findViewById(R.id.bmodel);
				viewHolder.btype = (TextView) convertView.findViewById(R.id.btype);
				viewHolder.bstarttime = (TextView) convertView.findViewById(R.id.sttime);
				viewHolder.seatnos = (TextView) convertView.findViewById(R.id.seat);
				convertView.setTag(viewHolder);

			} else{
				viewHolder = (ViewHolder) convertView.getTag();
				viewHolder.bid.setText(busid.get(position).toString());
				viewHolder.bmodel.setText(busmodel.get(position).toString());
				viewHolder.btype.setText(bustype.get(position).toString());
				viewHolder.bstarttime.setText(busstarttime.get(position).toString());
				viewHolder.seatnos.setText(seats.get(position).toString());
			}
			return convertView;
		}

		@Override
		public long getItemId(int arg0) {
			return 0;
		}

	}

}
