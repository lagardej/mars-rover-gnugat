object Versions {

    const val kotlin = "1.4.32"
    const val kotest = "4.4.3"
    const val mockk = "1.10.6"
    const val junit = "5.7.1"
}

object Kotlin {

    const val bom = "org.jetbrains.kotlin:kotlin-bom:${Versions.kotlin}"
}

object Kotest {

    const val framework = "io.kotest:kotest-runner-junit5:${Versions.kotest}"
    const val assertions = "io.kotest:kotest-assertions-core:${Versions.kotest}"
    const val property = "io.kotest:kotest-property:${Versions.kotest}"
}

object Mockk {

    const val mockk = "io.mockk:mockk:${Versions.mockk}"
}

object Junit {

    const val engine = "org.junit.jupiter:junit-jupiter-engine:${Versions.junit}"
}
