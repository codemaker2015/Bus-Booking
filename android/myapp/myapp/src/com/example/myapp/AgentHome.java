package com.example.myapp;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.Collection;
import java.util.HashMap;
import java.util.List;

import library.JSONParser;
import library.UserFunctions;

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
import android.database.DataSetObserver;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Spinner;
import android.widget.SpinnerAdapter;
import android.widget.TextView;
import android.widget.Toast;

public class AgentHome extends Activity {
	String bus_reg,uname,redt;
	TextView tv1,tv2;
	Spinner spinner;
	EditText resdate;
	Button getdate;
	String[] resid;
	JSONObject jObj,jObj1;
	JSONArray JA;
	private static String KEY_SUCCESS = "success";
	private static String KEY_ERROR="error";
	private static String KEY_BUSID="Busid";
	private static String KEY_BUS_REGNO="regno";
    private JSONParser jsonParser;
    static InputStream is=null;
    ArrayList<String> nn=new ArrayList<String>();
    ArrayList<String> prt=new ArrayList<String>();
    ArrayList<String> noseat=new ArrayList<String>();
    ArrayList<String> mobile=new ArrayList<String>();
    ArrayList<String> aList;
     String json="";
    String json4="";
    String[] values=new String[]{};
    JSONObject json1= null;
    ListView lv;
    LayoutInflater inflater;
    String g;
    Context c;
    // Testing in localhost using wamp or xampp
    // use http://10.0.2.2/ to connect to your localhost ie http://localhost/
    private static String loginURL = "http://10.0.2.2/eezzyticketz/webservice/json_req.php/";
    private static String registerURL = "http://10.0.2.2/eezzyticketz/json_req.php/";
 
 
    private static String login_tag = "login";
    private static String register_tag = "register";
    private static String res_tag = "reserve";
    private static String reserve_tag = "resdetails";
@Override
	protected void onCreate(Bundle savedInstanceState) {
	// TODO Auto-generated method stub
	super.onCreate(savedInstanceState);
	setContentView(R.layout.agent_home);
	getcontrols();
	c=getApplicationContext();
	 inflater=(LayoutInflater) getSystemService(Context.LAYOUT_INFLATER_SERVICE);
	bus_reg=getIntent().getExtras().getString("bus_reg_no");
	uname=getIntent().getExtras().getString("name");
	
	tv1.setText(uname);
	tv2.setText(bus_reg);

	
	getdate.setOnClickListener(new OnClickListener() {
		
		@Override
		public void onClick(View arg0) {
			// TODO Auto-generated method stub
			redt=resdate.getText().toString();
			if(spinner.getCount()==0){
			LoginAsync ss=new LoginAsync();
		    String params = null;
			ss.execute(params);
			   // onClickListener:
	        spinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
	            /**
	             * Called when a new item was selected (in the Spinner)
	             */
	            public void onItemSelected(AdapterView<?> parent,
	                View view, int pos, long id) {
	                g = (String) parent.getItemAtPosition(pos);
	                Toast.makeText(getApplicationContext(),
	                        g,
	                        Toast.LENGTH_LONG).show();
	                getSms gsms=new getSms();
	        		gsms.execute();

	                
	                
	            	
	            		
	                            	            
	   
	            }

				@Override
				public void onNothingSelected(AdapterView<?> arg0) {
					// TODO Auto-generated method stub
					
				}
				
	        
	        });
			}
		}
	});

	
}

	public void getcontrols(){
	tv1=(TextView) findViewById(R.id.tvc_name);
	tv2=(TextView) findViewById(R.id.tv_regno);
	spinner = (Spinner) findViewById(R.id.spinner1);
	resdate = (EditText) findViewById(R.id.et_redate);
	getdate=(Button) findViewById(R.id.bt_getdate);
	lv=(ListView) findViewById(R.id.mainListView);
	

}

public class LoginAsync extends AsyncTask<String, Void, ArrayList<String>>
{
	@Override
	protected ArrayList<String> doInBackground(String... param) {
		// TODO Auto-generated method stub
		// UserFunctions userFunction = new UserFunctions();
		  
     
		//	jObj = userFunction.select_regdate(bus_reg,redt);
			
        	 List<NameValuePair> params = new ArrayList<NameValuePair>();
             params.add(new BasicNameValuePair("tag", res_tag));
             params.add(new BasicNameValuePair("regno", bus_reg));
             params.add(new BasicNameValuePair("resdate", redt));
             // getting JSON Object
            // JSONObject json = jsonParser.getJSONFromUrl(loginURL, params);
			
             try
   	      {
   	    	  DefaultHttpClient httpClient=new DefaultHttpClient();
   	    	  HttpPost httppost=new HttpPost(loginURL);
   	    	  httppost.setEntity(new UrlEncodedFormEntity(params));
   	    	  HttpResponse httpResponse = httpClient.execute(httppost);
   	          HttpEntity httpEntity = httpResponse.getEntity();
   	          is = httpEntity.getContent();


   	      }
   	      catch (Exception e) {
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
   	         // jObj=new JSONObject(json);
   	       JSONArray JA = new JSONArray(json);
   			JSONObject json1= null;
   			System.out.println("json array length:"+JA.length());
   			for(int i=0;i<JA.length();i++)
   			{
   				try{
   			json1=JA.getJSONObject(i);
   			
   		     
   			
   			nn.add(json1.getString("regno"));
   				}
   				catch(Exception e){
   					Log.e(" Error in agent home", ""+ e.toString());
   				}
   			
   			//db.newContact(json1.getString("ContactName"), json1.getString("PhoneNumber"),json1.getString("CommunityName"));
   			}
   	      } 
   	      catch (Exception e) 
   	      {
   	          Log.e("Buffer Error", "Error converting result " + e.toString());
   	      }
   	      // return JSON String
   	

		
	
         return nn;
	}
	@Override
	protected void onPostExecute(final ArrayList<String> value) {
	// TODO Auto-generated method stub

	
		MyAdapter adapter = new MyAdapter(value);
        // apply the Adapter:
        spinner.setAdapter(adapter);
      
       	super.onPostExecute(value);
	
    


}
	
	    }
private class MyAdapter implements SpinnerAdapter{

    /**
     * The internal data (the ArrayList with the Objects).
     */
    ArrayList<String> data;

    public MyAdapter(ArrayList<String> data){
        this.data = data;
    }

    /**
     * Returns the Size of the ArrayList
     */
    @Override
    public int getCount() {
        return data.size();
    }

    /**
     * Returns one Element of the ArrayList
     * at the specified position.
     */
    @Override
    public Object getItem(int position) {
        return data.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public int getItemViewType(int position) {
        return android.R.layout.simple_spinner_dropdown_item;
    }

    /**
     * Returns the View that is shown when a element was
     * selected.
     */
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        TextView v = new TextView(getApplicationContext());
        v.setTextColor(Color.BLACK);
        v.setText(data.get(position));
        return v;
    }

    @Override
    public int getViewTypeCount() {
        return 1;
    }

    @Override
    public boolean hasStableIds() {
        return false;
    }

    @Override
    public boolean isEmpty() {
        return false;
    }

    @Override
    public void registerDataSetObserver(DataSetObserver observer) {
        // TODO Auto-generated method stub

    }

    @Override
    public void unregisterDataSetObserver(DataSetObserver observer) {
        // TODO Auto-generated method stub

    }

    
    @Override
    public View getDropDownView(int position, View convertView,
            ViewGroup parent) {
        return this.getView(position, convertView, parent);
    }
    
}
    
    public class getSms extends AsyncTask<String, String, String>
	{
    	
    	
    		
        	ArrayList<HashMap<String, String>> myList=new ArrayList<HashMap<String, String>>();
        	HashMap<String,String> map=new HashMap<String,String>();
    		@Override
    		protected String doInBackground(String... params) {
    			InputStream is=null;
    	  	    String result=null;
    	  	    String line=null;
    	  	    
    	  	    
    	  	  List<NameValuePair> param = new ArrayList<NameValuePair>();
    	        param.add(new BasicNameValuePair("tag", reserve_tag));
    	        param.add(new BasicNameValuePair("resid", g));
    	  	    try {
    				HttpClient httpclient = new DefaultHttpClient();
    				HttpPost httppost = new HttpPost(loginURL);
    				 httppost.setEntity(new UrlEncodedFormEntity(param));
    		    	  HttpResponse httpResponse = httpclient.execute(httppost);
    		          HttpEntity httpEntity = httpResponse.getEntity();
    		          is = httpEntity.getContent();
    				BufferedReader reader = new BufferedReader(new InputStreamReader(is,"iso-8859-1"),8);
    				StringBuilder sb = new StringBuilder();
    				while ((line = reader.readLine()) != null)
    				{
    					sb.append(line + "\n");
    				}
    				is.close();
    				result = sb.toString();
    				JSONArray JA = new JSONArray(result);
    				JSONObject json1= null;
    				for(int i=0;i<JA.length();i++)
    				{
    				json1=JA.getJSONObject(i);
    				map.put("prooftype",json1.getString("prooftype"));
    				map.put("noofseats",json1.getString("noofseats"));
    				map.put("mobile",json1.getString("mobile"));
    				map.put("gender",json1.getString("gender"));
    				map.put("name",json1.getString("name"));
    				map.put("age",json1.getString("age"));
    				map.put("age",json1.getString("seatno"));
    				aList=new ArrayList<String>( map.values ());

    				    
    				Log.e("lenght of ja", ""+aList.get(0));
    				
    				myList.add(map);
    				String pt=map.get("prooftype");
    				String pt1=map.get("noofseats");
    				String pt2=map.get("mobile");
    				String pt3=map.get("name");
    				String pt4=map.get("name");
    				String pt5=map.get("age");
    				String pt6=map.get("age");
    				    				
    				prt.add(pt);
    				noseat.add(pt1);
    				mobile.add(pt2);
    				/*mn.add(pt3);
    				mn.add(pt4);
    				mn.add(pt5);
    				mn.add(pt6);*/
    				Log.e("prooftype", ""+pt);
    				map = new HashMap<String, String>();
    				
    				}
    			} catch (ClientProtocolException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			} catch (IllegalStateException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			} catch (UnsupportedEncodingException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			} catch (IOException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			} catch (JSONException e) {
    				// TODO Auto-generated catch block
    				e.printStackTrace();
    			}
    			return result;
    		}
    		@Override
    		protected void onPostExecute(String result) {
    			Toast.makeText(getApplicationContext(),result,Toast.LENGTH_LONG).show();
    		for(int i=0;i<prt.size();i++){
    			Toast.makeText(getApplicationContext(),prt.get(i),Toast.LENGTH_LONG).show();
    		}
    				
    				
    			
    		//	SimpleAdapter mStudAdapter=new SimpleAdapter(AgentHome.this, myList, R.layout.myadapter,new String[] {"prooftype","noofseats","mobile"},new int[] {R.id.name,R.id.textView1,R.id.textView2});
    			CustomAdapter adapter=new CustomAdapter(c, R.layout.myadapter,prt,noseat,mobile); 
    			 
    			 //finally,setet the adapter to the default ListView
    			lv.setAdapter(adapter);
    			
    			//lv.setAdapter(mStudAdapter);	
            	
    			super.onPostExecute(result);
    		}
	
        
	}

    
 

//define your custom adapter
	private class CustomAdapter extends ArrayAdapter<String>
	{
	   // boolean array for storing
	   //the state of each CheckBox 
	   boolean[] checkBoxState;
	   ArrayList< String> value;
	   ArrayList< String> value1;
	   ArrayList< String> value2;
	   ViewHolder viewHolder;
	  
	   public CustomAdapter(Context context, int textViewResourceId,ArrayList< String> myList, ArrayList<String> noseat, ArrayList<String> mobile) {

	    //let android do the initializing :)
		   super(context, textViewResourceId, myList);
		 
	    this.value=myList;
	    this.value1=noseat;
	    this.value2=mobile;
	  //create the boolean array with
	   //initial state as false
	  checkBoxState=new boolean[value.size()];
	
	  }

	   @Override
       public int getItemViewType(int position) {
               return (position == this.getCount() - 1) ? 1 : 0;
       }

       @Override
       public int getViewTypeCount() {
               return 2;
       }
	    //class for caching the views in a row  
	 private class ViewHolder
	 {
	   
	   TextView name;
	   TextView noseat;
	   TextView mobile;
	   CheckBox checkBox;
	 }

	 

	 @Override
	 public View getView(final int position, View convertView, ViewGroup parent) {
		 int theType = getItemViewType(position);
	   if(convertView==null)
	    {
	   convertView=inflater.inflate(R.layout.myadapter, null);
	   viewHolder=new ViewHolder();

	    //cache the views
	   
	  
	   
	    
	    
	    
	    
	    
	    if (theType == 0) {
            convertView = inflater.inflate(R.layout.myadapter, null);
            viewHolder.name=(TextView) convertView.findViewById(R.id.name);
    	    viewHolder.noseat=(TextView) convertView.findViewById(R.id.textView1);
    	    viewHolder.mobile=(TextView) convertView.findViewById(R.id.textView2);
    } else if (theType == 1) {
//            convertView = inflat.inflate(R.layout.row_type2, null);
            viewHolder.checkBox=(CheckBox) convertView.findViewById(R.id.CheckBox);
  //          viewHolder.button1 = (Button) convertView
    //                        .findViewById(R.id.button1);
    }

	     //link the cached views to the convertview
	    convertView.setTag( viewHolder);
	   

	  }
	  else
	   viewHolder=(ViewHolder) convertView.getTag();

	           

	  viewHolder.name.setText(value.get(position).toString());
	  viewHolder.noseat.setText(value1.get(position).toString());
	  viewHolder.mobile.setText(value2.get(position).toString());
	   //VITAL PART!!! Set the state of the 
	   //CheckBox using the boolean array
	        viewHolder.checkBox.setChecked(checkBoxState[position]);
	            
	         
	           //for managing the state of the boolean
	           //array according to the state of the
	           //CheckBox
	          
	           viewHolder.checkBox.setOnClickListener(new View.OnClickListener() {
	    
	   public void onClick(View v) {
	    if(((CheckBox)v).isChecked())
	     checkBoxState[position]=true;
	    else
	     checkBoxState[position]=false;
	     
	    }
	   });

	   //return the view to be displayed
	   return convertView;
	  }





	@Override
	public long getItemId(int arg0) {
		// TODO Auto-generated method stub
		return 0;
	}

	 }

}


	
	

	






