import java.net.URI
import java.net.URLEncoder
import java.net.http.HttpClient
import java.net.http.HttpRequest
import java.net.http.HttpResponse
import java.nio.charset.StandardCharsets

class ApibaraVehicleAuctionClient(
    private val apiKey: String,
    private val baseUrl: String = "https://apibara.tech/api/v1/vehicle-auction"
) {
    private val httpClient = HttpClient.newHttpClient()

    fun get(path: String, params: Map<String, String> = emptyMap()): String {
        val query = params
            .filterValues { it.isNotBlank() }
            .map { (key, value) -> "${encode(key)}=${encode(value)}" }
            .joinToString("&")

        val url = baseUrl + path + if (query.isBlank()) "" else "?$query"

        val request = HttpRequest.newBuilder(URI.create(url))
            .GET()
            .header("X-API-Key", apiKey)
            .header("Accept", "application/json")
            .build()

        val response = httpClient.send(request, HttpResponse.BodyHandlers.ofString())

        if (response.statusCode() !in 200..299) {
            error("Apibara API error ${response.statusCode()}: ${response.body()}")
        }

        return response.body()
    }

    private fun encode(value: String): String = URLEncoder.encode(value, StandardCharsets.UTF_8)
}

fun main() {
    val apiKey = System.getenv("APIBARA_API_KEY") ?: error("Missing APIBARA_API_KEY")
    val client = ApibaraVehicleAuctionClient(apiKey)

    val vehicles = client.get("/vehicles", mapOf(
        "make" to "Toyota",
        "model" to "Camry",
        "year_from" to "2018",
        "lot_sub_status" to "Open",
        "per_page" to "20"
    ))

    println(vehicles)
}
