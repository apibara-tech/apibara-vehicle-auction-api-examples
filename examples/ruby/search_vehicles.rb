require 'net/http'
require 'json'
require 'uri'

api_key = ENV.fetch('APIBARA_API_KEY')
base_url = ENV.fetch('APIBARA_BASE_URL', 'https://apibara.tech/api/v1/vehicle-auction')

uri = URI("#{base_url}/vehicles")
uri.query = URI.encode_www_form(
  make: 'Toyota',
  model: 'Camry',
  year_from: 2018,
  lot_sub_status: 'Open',
  per_page: 20
)

request = Net::HTTP::Get.new(uri)
request['X-API-Key'] = api_key
request['Accept'] = 'application/json'

response = Net::HTTP.start(uri.hostname, uri.port, use_ssl: uri.scheme == 'https') do |http|
  http.request(request)
end

unless response.is_a?(Net::HTTPSuccess)
  raise "Apibara API error #{response.code}: #{response.body}"
end

puts JSON.pretty_generate(JSON.parse(response.body))
