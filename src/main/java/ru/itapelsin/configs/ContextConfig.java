package ru.itapelsin.configs;

import com.google.gson.*;
import lombok.extern.slf4j.Slf4j;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

import java.lang.reflect.Type;
import java.util.Base64;
import java.util.Random;

@Configuration
@Slf4j
public class ContextConfig {

    @Bean
    public Gson gson() {
        log.info("configure gson");
        GsonBuilder builder = new GsonBuilder()
                .registerTypeHierarchyAdapter(byte[].class, new ByteArrayBase64Adapter());
        return builder.create();
    }

    @Bean
    public Random random() {
        return new Random(System.currentTimeMillis());
    }

    public static class ByteArrayBase64Adapter implements JsonSerializer<byte[]>, JsonDeserializer<byte[]> {
        @Override
        public byte[] deserialize(JsonElement json, Type typeOfT, JsonDeserializationContext context) throws JsonParseException {
            return Base64.getDecoder().decode(json.getAsString());
        }

        @Override
        public JsonElement serialize(byte[] src, Type typeOfSrc, JsonSerializationContext context) {
            return new JsonPrimitive(Base64.getEncoder().encodeToString(src));
        }
    }
}
