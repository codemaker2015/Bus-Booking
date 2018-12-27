package library;
 
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
 
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;
 
import android.content.Context;
import android.util.Log;
import android.widget.Toast;
 
public class UserFunctions {
 
    private JSONParser jsonParser;
 
    // Testing in localhost using wamp or xampp
    // use http://10.0.2.2/ to connect to your localhost ie http://localhost/
 private static String loginURL = "http://10.0.2.2/eezzyticketz/webservice/json_req.php/";
   private static String registerURL = "http://10.0.2.2/eezzyticketz/json_req.php/";
 
 
    private static String login_tag = "login";
    private static String register_tag = "register";
    private static String res_tag = "reserve";
    private static String reserve_tag = "resdetails";
    // constructor
    public UserFunctions(){
        jsonParser = new JSONParser();
    }
 
   
   
    public JSONObject registerUser(String name, String email, String password,String gender) throws JSONException{
        // Building Parameters
        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("tag", register_tag));
        params.add(new BasicNameValuePair("name", name));
        params.add(new BasicNameValuePair("email", email));
        params.add(new BasicNameValuePair("password", password));
        params.add(new BasicNameValuePair("gender", gender));
 
        // getting JSON Object
        JSONObject json = jsonParser.getJSONFromUrl(registerURL, params);
        // return json
       // Toast.makeText(, "should fill values",Toast.LENGTH_LONG).show();
       
       
        return json;
        
    }
    public JSONObject loginUser(String name, String password){
        // Building Parameters
        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("tag", login_tag));
        params.add(new BasicNameValuePair("uname", name));
        params.add(new BasicNameValuePair("password", password));
        JSONObject json = null;
		try {
			json = jsonParser.getJSONFromUrl(loginURL, params);
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
        // return json
        // Log.e("JSON", json.toString());
        return json;
    }

    public JSONObject select_regdate(String regno,String redt) throws JSONException{
        // Building Parameters
        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("tag", res_tag));
        params.add(new BasicNameValuePair("regno", regno));
        params.add(new BasicNameValuePair("resdate", redt));
        // getting JSON Object
        JSONObject json = jsonParser.getJSONFromUrl(loginURL, params);
        // return json
       // Toast.makeText(, "should fill values",Toast.LENGTH_LONG).show();
       
       
        return json;
        
    }
    
    /*public ArrayList<HashMap<String, String>> select_res_details(String resid) throws JSONException{
    	Log.e("in user function", resid);
        // Building Parameters
        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("tag", res_tag));
        params.add(new BasicNameValuePair("resid", resid));
       
        // getting JSON Object
        ArrayList<HashMap<String,String>> json = jsonParser.getJSONFromUrl1(loginURL, params);
        // return json
       // Toast.makeText(, "should fill values",Toast.LENGTH_LONG).show();
       
       
        return json;
        
    }*/
}
