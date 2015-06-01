package com.mark1.aldo.mark1.util;

import android.app.Activity;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.util.Log;

/**
 * Created by aldo on 20/05/15.
 */
public class InvokeWS extends AsyncTask<String, String, String>{
    ProgressDialog pDialog;
    public AsyncResponse delegate=null;
    Activity myactivity;
    String mytype;

    public InvokeWS (Activity activity, String type) {
        myactivity = activity;
        mytype = type;
    }

    @Override
    protected String doInBackground(String... url) {
        ServiceHandler sh = new ServiceHandler();

        String jsonStr = sh.makeServiceCall(url[0], ServiceHandler.GET);

        return jsonStr;
    }

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        // Showing progress dialog
        pDialog = new ProgressDialog(myactivity);
        pDialog.setMessage("Espere por favor...");
        pDialog.setCancelable(false);
        pDialog.show();
    }

    protected void onPostExecute(String result) {
        super.onPostExecute(result);

        Log.i("onPostExecute", result);
        delegate.processFinish(result, mytype);

        // Dismiss the progress dialog
        if (pDialog.isShowing())
            pDialog.dismiss();
    }
}
