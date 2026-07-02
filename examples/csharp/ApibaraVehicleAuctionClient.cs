using System.Net.Http.Headers;
using System.Web;

public sealed class ApibaraVehicleAuctionClient
{
    private readonly HttpClient _httpClient;
    private readonly string _baseUrl;

    public ApibaraVehicleAuctionClient(string apiKey, string baseUrl = "https://apibara.tech/api/v1/vehicle-auction")
    {
        _baseUrl = baseUrl.TrimEnd('/');
        _httpClient = new HttpClient();
        _httpClient.DefaultRequestHeaders.Add("X-API-Key", apiKey);
        _httpClient.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
    }

    public async Task<string> GetAsync(string path, Dictionary<string, string?>? parameters = null)
    {
        var query = HttpUtility.ParseQueryString(string.Empty);

        foreach (var item in parameters ?? new Dictionary<string, string?>())
        {
            if (!string.IsNullOrWhiteSpace(item.Value))
            {
                query[item.Key] = item.Value;
            }
        }

        var url = _baseUrl + path + (query.Count > 0 ? "?" + query : "");
        var response = await _httpClient.GetAsync(url);
        var body = await response.Content.ReadAsStringAsync();

        if (!response.IsSuccessStatusCode)
        {
            throw new HttpRequestException($"Apibara API error {(int)response.StatusCode}: {body}");
        }

        return body;
    }
}

public static class Program
{
    public static async Task Main()
    {
        var apiKey = Environment.GetEnvironmentVariable("APIBARA_API_KEY")
            ?? throw new InvalidOperationException("Missing APIBARA_API_KEY");

        var client = new ApibaraVehicleAuctionClient(apiKey);

        var json = await client.GetAsync("/vehicles", new Dictionary<string, string?>
        {
            ["make"] = "Toyota",
            ["model"] = "Camry",
            ["year_from"] = "2018",
            ["lot_sub_status"] = "Open",
            ["per_page"] = "20"
        });

        Console.WriteLine(json);
    }
}
