plugins {
    id("library-conventions")
}

dependencies {
    implementation(project(":event-sourcing"))
    implementation(project(":geolocation"))
}
