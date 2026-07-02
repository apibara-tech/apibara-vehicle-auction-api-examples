import Foundation

struct ApibaraVehicleAuctionClient {
    let apiKey: String
    let baseURL: URL

    init(apiKey: String, baseURL: URL = URL(string: "https://apibara.tech/api/v1/vehicle-auction")!) {
        self.apiKey = apiKey
        self.baseURL = baseURL
    }

    func get(path: String, queryItems: [URLQueryItem] = []) async throws -> Data {
        var components = URLComponents(url: baseURL.appendingPathComponent(path), resolvingAgainstBaseURL: false)!
        components.queryItems = queryItems.isEmpty ? nil : queryItems

        var request = URLRequest(url: components.url!)
        request.httpMethod = "GET"
        request.setValue(apiKey, forHTTPHeaderField: "X-API-Key")
        request.setValue("application/json", forHTTPHeaderField: "Accept")

        let (data, response) = try await URLSession.shared.data(for: request)

        guard let httpResponse = response as? HTTPURLResponse,
              (200..<300).contains(httpResponse.statusCode) else {
            throw URLError(.badServerResponse)
        }

        return data
    }

    func searchVehicles() async throws -> Data {
        try await get(path: "vehicles", queryItems: [
            URLQueryItem(name: "make", value: "Toyota"),
            URLQueryItem(name: "model", value: "Camry"),
            URLQueryItem(name: "year_from", value: "2018"),
            URLQueryItem(name: "lot_sub_status", value: "Open"),
            URLQueryItem(name: "per_page", value: "20")
        ])
    }

    func getVehicleDetails(vinOrLot: String) async throws -> Data {
        try await get(path: "vehicles/\(vinOrLot)")
    }

    func getShipping(vinOrLot: String) async throws -> Data {
        try await get(path: "vehicles/\(vinOrLot)/shipping", queryItems: [
            URLQueryItem(name: "ports", value: "Miami,NY,LA")
        ])
    }
}
