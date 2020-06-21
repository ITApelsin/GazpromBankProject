package ru.itapelsin;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import org.junit.jupiter.api.Test;
import ru.itapelsin.configs.ContextConfig;
import ru.itapelsin.controllers.RestApiController;

import java.io.File;
import java.io.IOException;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.util.ArrayList;
import java.util.List;

public class RequestTest {

    private final static String URL = "http://localhost:8080/api";

    public static Gson gson() {
        GsonBuilder builder = new GsonBuilder()
                .registerTypeHierarchyAdapter(byte[].class, new ContextConfig.ByteArrayBase64Adapter());
        return builder.create();
    }

    private HttpURLConnection getConnection(String string, String method) throws IOException {
        URL url = new URL(string);
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
        connection.setRequestMethod(method);
        connection.setRequestProperty("Content-Encoding", "utf-8");
        connection.setDoOutput(true);
        connection.setDoInput(true);
        return connection;
    }

    private HttpURLConnection sendData(String url, byte[] data) throws IOException {
        HttpURLConnection connection = getConnection(url, "POST");
        connection.setRequestProperty("Content-Length", Integer.toString(data.length));
        connection.connect();
        OutputStream os = connection.getOutputStream();
        os.write(data);
        os.flush();
        return connection;
    }

    @Test
    public void registerTest() throws IOException {
        Gson gson = gson();
        RestApiController.RegisterRequest request = new RestApiController.RegisterRequest();
        request.setEmail("test@mail.ru");
        request.setUsername("testuser");
        request.setPassword("123");
        request.setImage(Files.readAllBytes(new File("D:\\images\\1.png").toPath()));

        HttpURLConnection connection = sendData(String.format("%s/register", URL),
                gson.toJson(request).getBytes(StandardCharsets.UTF_8));
        System.out.println(connection.getResponseCode());
    }

    @Test
    public void addOffer() throws Exception {
        Gson gson = gson();
        RestApiController.NewOfferRequest request = new RestApiController.NewOfferRequest();
        request.setCategory(1L);
        request.setEssence("что-то");
        request.setUserId(1L);
        request.setTitle("титл");

        HttpURLConnection connection = sendData(String.format("%s/add-offer", URL),
                        gson.toJson(request).getBytes(StandardCharsets.UTF_8));
        System.out.println(connection.getResponseCode());
    }

    @Test
    public void changePasswordTest() throws Exception {
        Gson gson = gson();
        RestApiController.ChangePasswordRequest request = new RestApiController.ChangePasswordRequest();
        request.setUserId(1L);
        request.setNewPassword("321");

        HttpURLConnection connection = sendData(String.format("%s/change-password", URL),
                        gson.toJson(request).getBytes(StandardCharsets.UTF_8));
        System.out.println(connection.getResponseCode());
    }

    @Test
    public void testRandOffer() throws Exception {
        Gson gson = gson();
        List<Long> longs = new ArrayList<>();
        longs.add(1L);

        HttpURLConnection connection = sendData(String.format("%s/rand-offer", URL),
                gson.toJson(longs).getBytes(StandardCharsets.UTF_8));
        System.out.println(connection.getResponseCode());
    }
}
