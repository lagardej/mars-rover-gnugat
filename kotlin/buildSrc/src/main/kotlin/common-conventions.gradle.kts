import org.jetbrains.kotlin.gradle.tasks.KotlinCompile

plugins {
    kotlin("jvm")
}

repositories {
    mavenCentral()
}

dependencies {
    implementation(platform(Kotlin.bom))

    // Kotest: test framework, assertions library, property test library
    testImplementation(Kotest.framework)
    testImplementation(Kotest.assertions)
    testImplementation(Kotest.property)

    // Mockk: mocking library
    testImplementation(Mockk.mockk)

    // JUnit Jupiter Engine: test engine
    testRuntimeOnly(Junit.engine)
}

tasks.withType<Test> {
    useJUnitPlatform()
}

tasks.withType<KotlinCompile>().configureEach {
    kotlinOptions {
        jvmTarget = "11"
        useIR = true
    }
}
