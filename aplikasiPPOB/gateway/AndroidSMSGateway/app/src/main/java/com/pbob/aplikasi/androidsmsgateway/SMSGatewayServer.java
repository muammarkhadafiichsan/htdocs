package com.pbob.aplikasi.androidsmsgateway;

import org.apache.http.*;
import org.apache.http.impl.*;
import org.apache.http.params.*;
import org.apache.http.protocol.*;
import java.io.*;
import java.net.*;
/**
 * @author Eko Khannedy
 */
public class SMSGatewayServer {
	private int port;
	private HttpService httpService;
	private ServerSocket serverSocket;
	private HttpContext httpContext;

	public SMSGatewayServer(int port) {
		this.port = port;
		httpService = new HttpService(new BasicHttpProcessor(),
				new DefaultConnectionReuseStrategy(),
				new DefaultHttpResponseFactory());
		httpContext = new BasicHttpContext();
		HttpRequestHandlerRegistry registry = new HttpRequestHandlerRegistry();
		registry.register("*", new SMSGatewayHandler());
		httpService.setHandlerResolver(registry);
	}


	public void start() throws IOException, HttpException {
// membuat server socket berdasarkan port
		serverSocket = new ServerSocket(port);
		while (true) {
// terima socket client jika ada request masuk
			Socket socket = serverSocket.accept();
// handle request sebagai HTTP Request
			DefaultHttpServerConnection sCon = new DefaultHttpServerConnection();
			sCon.bind(socket, new BasicHttpParams());
			httpService.handleRequest(sCon, httpContext);
// close koneksi client
			socket.close();
		}
	}

	public void stop() throws IOException {
		serverSocket.close();
	}
}
