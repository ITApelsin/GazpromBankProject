import com.bmuschko.gradle.docker.tasks.image.DockerPushImage
import com.bmuschko.gradle.docker.tasks.image.Dockerfile
import org.jetbrains.kotlin.gradle.tasks.KotlinCompile


plugins {
	id("org.springframework.boot") version "2.4.0-SNAPSHOT"
	id("io.spring.dependency-management") version "1.0.9.RELEASE"
	kotlin("jvm") version "1.3.72"
	kotlin("plugin.spring") version "1.3.72"
	kotlin("plugin.jpa") version "1.3.72"
	id("com.bmuschko.docker-remote-api") version "6.4.0"
}

group = "ru.itapelsin"
version = "0.0.1-SNAPSHOT"
java.sourceCompatibility = JavaVersion.VERSION_1_8

configurations {
	compileOnly {
		extendsFrom(configurations.annotationProcessor.get())
	}

}

repositories {
	jcenter()
	mavenCentral()
	maven { url = uri("https://repo.spring.io/milestone") }
	maven { url = uri("https://repo.spring.io/snapshot") }
}

dependencies {
	implementation("org.springframework.boot:spring-boot-starter-data-jpa")
//	implementation("org.springframework.boot:spring-boot-starter-oauth2-client")
	implementation("org.springframework.boot:spring-boot-starter-web")
	{
		exclude("org.springframework.boot", "spring-boot-starter-json")
	}
	implementation("com.fasterxml.jackson.module:jackson-module-kotlin")
	implementation("org.jetbrains.kotlin:kotlin-reflect")
	implementation("org.jetbrains.kotlin:kotlin-stdlib-jdk8")
//	implementation("org.liquibase:liquibase-core")
	implementation("com.google.guava:guava:29.0-jre")
	implementation("com.google.code.findbugs:jsr305:3.0.2")
	implementation("com.zaxxer:HikariCP:3.4.2")
	{
		exclude("org.slf4j", "slf4j-api")
	}
	implementation("com.google.code.gson:gson:2.8.6")
	compileOnly("org.projectlombok:lombok")
	runtimeOnly("org.postgresql:postgresql")
	annotationProcessor("org.projectlombok:lombok")
	testImplementation("org.springframework.boot:spring-boot-starter-test")
}

tasks.withType<Test> {
	useJUnitPlatform()
}

tasks.withType<KotlinCompile> {
	kotlinOptions {
		freeCompilerArgs = listOf("-Xjsr305=strict")
		jvmTarget = "1.8"
	}
}

docker {
	url.set("tcp://192.168.99.100:2376")
}

tasks {

	val imageName = "itapelsin/gbp"

	compileJava {
		options.encoding = "UTF-8"
	}

	val dockerBuildDir = "${buildDir.path}/docker"

	val createDockerfile by creating(Dockerfile::class) {
		group = "docker"

		from("openjdk:8-jdk-alpine")
		addFile(bootJar.get().archiveFileName.get(), "/usr/local/gbp.jar")
		exposePort(8080)
		defaultCommand("java", "-jar", "/usr/local/gbp.jar")
	}

	val syncApp by creating(Copy::class) {
		group = "docker"
		dependsOn(assemble.get())
		from(bootJar.get().archiveFile.get().asFile.path)
		into(dockerBuildDir)
	}

	val buildImage by creating(com.bmuschko.gradle.docker.tasks.image.DockerBuildImage::class) {
		group = "docker"
		dependsOn(createDockerfile, syncApp)
		images.add(imageName)
	}


	val pushImage by creating(DockerPushImage::class) {
		group = "docker"
		dependsOn(buildImage)
		images.add(imageName)
	}
}