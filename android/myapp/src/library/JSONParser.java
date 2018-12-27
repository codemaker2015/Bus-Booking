package library;

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
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import org.json.JSONTokener;

import android.os.AsyncTask;
import android.os.StrictMode;
import android.util.Log;

public class JSONParser {
static InputStream is=null;

static String json="";
static String json2="";
JSONObject jObj;
JSONObject json1= null;
ArrayList<HashMap<String, String>> values=new ArrayList<HashMap<String,String>>();
HashMap< String, String> nn=new HashMap<String, String>();
   public JSONParser()
   {
   }
 



	// TODO Auto-generated method stub
   
	 public JSONObject getJSONFromUrl(String url, List<NameValuePair> params) throws JSONException 
	    {
	      try
	      {
	    	  DefaultHttpClient httpClient=new DefaultHttpClient();
	    	  HttpPost httppost=new HttpPost(url);
	    	  httppost.setEntity(new UrlEncodedFormEntity(params));
	    	  HttpResponse httpResponse = httpClient.execute(httppost);
	          HttpEntity httpEntity = httpResponse.getEntity();
	          is = httpEntity.getContent();


	      }
	      catch (UnsupportedEncodingException e) {
	          e.printStackTrace();
	      } catch (ClientProtocolException e) {
	          e.printStackTrace();
	      } catch (IOException e) {
	          e.printStackTrace();
	      }
	      try {
	          BufferedReader reader = new BufferedReader(new InputStreamReader(
	                  is, "iso-8859-1"), 8);
	          //BufferedReader reader = new BufferedReader(new InputStreamReader(is, "utf-8"), 8);
	          StringBuilder sb = new StringBuilder();
	          String line = null;
	          while ((line = reader.readLine()) != null) 
	          {
	        	  System.out.println("line:"+line);
	              sb.append(line + "\n");
	          }
	          is.close();
	          json = sb.toString();
	    	  
	       Log.e("JSON", json);
	          jObj=new JSONObject(json);
	      } 
	      catch (Exception e) 
	      {
	          Log.e("Buffer Error", "Error converting result " + e.toString());
	      }
	      // return JSON String
	      return jObj;


	    
	

	
  }
	 public class AsyncJson extends AsyncTask<String, String, String>{

		@Override
		protected String doInBackground(String... arg0) {
			// TODO Auto-generated method stub
			
		 return null;
		}
		
	 }
		
		/* public ArrayList<HashMap<String,String>> getJSONFromUrl1(String url, List<NameValuePair> params) throws JSONException 
		    {
		      try
		      {
		    	  DefaultHttpClient httpClient=new DefaultHttpClient();
		    	  HttpPost httppost=new HttpPost(url);
		    	  httppost.setEntity(new UrlEncodedFormEntity(params));
		    	  HttpResponse httpResponse = httpClient.execute(httppost);
		          HttpEntity httpEntity = httpResponse.getEntity();
		          is = httpEntity.getContent();


		      }
		      catch (UnsupportedEncodingException e) {
		          e.printStackTrace();
		      } catch (ClientProtocolException e) {
		          e.printStackTrace();
		      } catch (IOException e) {
		          e.printStackTrace();
		      }
		      try {
		          BufferedReader reader = new BufferedReader(new InputStreamReader(
		                  is, "iso-8859-1"), 8);
		          //BufferedReader reader = new BufferedReader(new InputStreamReader(is, "utf-8"), 8);
		          StringBuilder sb = new StringBuilder();
		          String line = null;
		          while ((line = reader.readLine()) != null) 
		          {
		        	  System.out.println("line:"+line);
		              sb.append(line + "\n");
		          }
		          is.close();
		          json2 = sb.toString();
		    	  
		       Log.e("JSON", json2);
		       JSONArray JA2 = new JSONArray(json2);
	   			JSONObject json1= null;
	   			System.out.println("json array length:"+JA2.length());
	   			for(int i=0;i<JA2.length();i++)
	   			{
	   				try{
	   			json1=JA2.getJSONObject(i);
	   			
	   		     
	   			
	   			nn.put("prooftype", json1.getString("prooftype"));
	   			nn.put("noofseats", json1.getString("noofseats"));
	   			nn.put("noofseats", json1.getString("mobile"));
	   			values.add(nn);
	   				}
	   				catch(Exception e){
	   					Log.e("in parser", ""+json1.toString());
	   					Log.e("in parser", ""+JA2.length());
	   				}
	   				}
		      
		     


		    
		      }
		      catch (Exception e) 
		      {
		          Log.e("Buffer Error", "Error converting result " + e.toString());
		      }
		      // return JSON String
		      return values;

		
		    }  */
}
