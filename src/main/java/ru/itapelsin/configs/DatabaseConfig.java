package ru.itapelsin.configs;

import com.zaxxer.hikari.HikariConfig;
import com.zaxxer.hikari.HikariDataSource;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.PropertySource;
import org.springframework.core.env.Environment;

import javax.sql.DataSource;
import java.util.Properties;

@Configuration
@PropertySource("classpath:/static/db.properties")
public class DatabaseConfig {

    @Bean
    @Autowired
    public DataSource dataSource(Environment env) {
        HikariConfig config = new HikariConfig();
        config.setPoolName("HikariCP");
        config.setDataSourceClassName("org.postgresql.ds.PGSimpleDataSource");
        config.setMaxLifetime(env.getRequiredProperty("db.maximumCPSize", Integer.class));
        config.setMinimumIdle(env.getRequiredProperty("db.minimumCPSize", Integer.class));
        config.setIdleTimeout(env.getRequiredProperty("db.idleTimeout", Long.class));
        config.setConnectionTimeout(env.getRequiredProperty("db.connectionTimeout", Long.class));
        config.setMaxLifetime(env.getRequiredProperty("db.maxLifetime", Long.class));

        Properties dataSourceProperties = new Properties();
        dataSourceProperties.setProperty("serverName", System.getenv("DB_SERVER"));
        dataSourceProperties.setProperty("portNumber", System.getenv("DB_PORT"));
        dataSourceProperties.setProperty("databaseName", System.getenv("DB_DATABASE"));
        dataSourceProperties.setProperty("user", System.getenv("DB_USER"));
        dataSourceProperties.setProperty("password", System.getenv("DB_PASSWORD"));

        config.setDataSourceProperties(dataSourceProperties);
        return new HikariDataSource(config);
    }

    // TODO liquibase initialize
}
