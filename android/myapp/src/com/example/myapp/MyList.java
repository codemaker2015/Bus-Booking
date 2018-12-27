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

import android.app.ListActivity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.Toast;

public class MyList extends ListActivity {

	private static String url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
	List<Model> list=null;
	Integer id;
	ArrayList<String> aList;
	ArrayList<String> seatlist;
	List<String> statuslist;
	
	public void onCreate(Bundle icicle) {
		super.onCreate(icicle);
		// create an array of Strings, that will be put to our ListActivity
		list = new ArrayList<Model>();
		
		seatlist=new ArrayList<String>();
		statuslist=new ArrayList<String>();
		
		id = getIntent().getExtras().getInt("busid");
        
        int size=10;
		for (int i = 0; i < size; i++) {
			
			Integer status=0;
			String no="1";
			
			list.add(get("Seat No :"+no));
						
			if (status == 0) {
				list.get(i).setSelected(true);
			} else {
				list.get(i).setSelected(false);
			}
		}
        
		ArrayAdapter<Model> adapter = new InteractiveArrayAdapter(this, list);
		setListAdapter(adapter);
	}
	
	private Model get(String s) {
		return new Model(s);
	}
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		MenuInflater in=new MenuInflater(getApplicationContext());
		in.inflate(R.menu.main, menu);
		return super.onCreateOptionsMenu(menu);
	
	}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {

		switch(item.getItemId()){
		case R.id.save:
			Intent edit=new Intent(getApplicationContext(), Ticket.class);
			startActivity(edit);
			break;
		}
		return false;
	}
	
	public class GetBusDetails extends AsyncTask<String, String, String>{
		ArrayList<HashMap<String, String>> myList = new ArrayList<HashMap<String, String>>();
		HashMap<String, String> map = new HashMap<String, String>();

		@Override
		protected String doInBackground(String... params) {
			InputStream is = null;
			String result = "OK";
			String line = null;

			List<NameValuePair> param = new ArrayList<NameValuePair>();

			param.add(new BasicNameValuePair("id", id.toString()));

			try {
				HttpClient httpclient = new DefaultHttpClient();
				HttpPost httppost = new HttpPost(url);
				httppost.setEntity(new UrlEncodedFormEntity(param));
				HttpResponse httpResponse = httpclient.execute(httppost);
				HttpEntity httpEntity = httpResponse.getEntity();
				is = httpEntity.getContent();
				BufferedReader reader = new BufferedReader(
						new InputStreamReader(is, "iso-8859-1"), 8);
				StringBuilder sb = new StringBuilder();
				while ((line = reader.readLine()) != null) {
					sb.append(line + "\n");
				}
				is.close();
				result = sb.toString();
				JSONArray JA = new JSONArray(result);
				JSONObject json1 = null;
				for (int i = 0; i < JA.length(); i++) {
					json1 = JA.getJSONObject(i);
					map.put("mobile", json1.getString("mobile"));
					map.put("age", json1.getString("seatno"));
					aList = new ArrayList<String>(map.values());

					Log.e("lenght of ja", "" + aList.get(0));

					myList.add(map);
					String slist = map.get("seatlist");

					seatlist.add(slist);
					map = new HashMap<String, String>();

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
			for (int i = 0; i < seatlist.size(); i++) {
				Toast.makeText(getApplicationContext(), seatlist.get(i), Toast.LENGTH_LONG).show();
			}

			//CustomAdapter adapter = new CustomAdapter(c, R.layout.selectbus, busmodel, bustype, busstarttime, seats);
			//lv.setAdapter(adapter);

			ArrayAdapter<Model> adapter1 = new InteractiveArrayAdapter(MyList.this, list);
			setListAdapter(adapter1);
			
			super.onPostExecute(result);
		}
	}

	
}