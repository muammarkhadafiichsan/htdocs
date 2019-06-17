package com.pbob.aplikasi.androidsmsgateway;

import org.apache.http.entity.*;
import org.apache.http.*;
import org.apache.http.protocol.*;
import org.apache.http.util.*;
import org.json.*;
import java.io.IOException;
import android.telephony.SmsManager;

/**
 * @author Eko Khannedy
 */
public class SMSGatewayHandler implements HttpRequestHandler {
	@Override
	public void handle(HttpRequest httpRequest, HttpResponse httpResponse,
					   HttpContext httpContext) throws HttpException, IOException {
		if (httpRequest instanceof HttpEntityEnclosingRequest) {
// HTTP request haruslah memiliki body
			try {
				HttpEntity entity = ((HttpEntityEnclosingRequest) httpRequest).getEntity();
// convert String body menjadi JSON
				String body = EntityUtils.toString(entity);
				JSONObject object = new JSONObject(body);
				// ambil no tujuan dari json
				String no = object.getString("no");
// ambil pesan dari json
				String pesan = object.getString("pesan");
// kirim SMS
				SmsManager.getDefault().sendTextMessage(no, null, pesan, null, null);
// beri respon SUKSES
				httpResponse.setEntity(new StringEntity("SUKSES"));
			} catch (Exception ex) {
// beri respon GAGAL
				httpResponse.setEntity(new StringEntity("GAGAL"));
			}
		}
	}
}
