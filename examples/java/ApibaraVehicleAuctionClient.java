import java.io.IOException;
import java.net.URI;
import java.net.URLEncoder;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.nio.charset.StandardCharsets;
import java.util.Map;
import java.util.stream.Collectors;

public class ApibaraVehicleAuctionClient {
    private final String apiKey;
    private final String baseUrl;
    private final HttpClient httpClient;

    public ApibaraVehicleAuctionClient(String apiKey) {
        this(apiKey, "https://apibara.tech/api/v1/vehicle-auction");
    }

    public ApibaraVehicleAuctionClient(String apiKey, String baseUrl) {
        this.apiKey = apiKey;
        this.baseUrl = baseUrl;
        this.httpClient = HttpClient.newHttpClient();
    }

    public String get(String path, Map<String, String> params) throws IOException, InterruptedException {
        String query = params.entrySet().stream()
                .filter(e -> e.getValue() != null && !e.getValue().isBlank())
                .map(e -> encode(e.getKey()) + "=" + encode(e.getValue()))
                .collect(Collectors.joining("&"));

        String url = baseUrl + path + (query.isEmpty() ? "" : "?" + query);

        HttpRequest request = HttpRequest.newBuilder(URI.create(url))
                .GET()
                .header("X-API-Key", apiKey)
                .header("Accept", "application/json")
                .build();

        HttpResponse<String> response = httpClient.send(request, HttpResponse.BodyHandlers.ofString());

        if (response.statusCode() < 200 || response.statusCode() >= 300) {
            throw new IOException("Apibara API error " + response.statusCode() + ": " + response.body());
        }

        return response.body();
    }

    private static String encode(String value) {
        return URLEncoder.encode(value, StandardCharsets.UTF_8);
    }

    public static void main(String[] args) throws Exception {
        String apiKey = System.getenv("APIBARA_API_KEY");
        ApibaraVehicleAuctionClient client = new ApibaraVehicleAuctionClient(apiKey);

        String json = client.get("/vehicles", Map.of(
                "make", "Toyota",
                "model", "Camry",
                "year_from", "2018",
                "lot_sub_status", "Open",
                "per_page", "20"
        ));

        System.out.println(json);
    }
}
