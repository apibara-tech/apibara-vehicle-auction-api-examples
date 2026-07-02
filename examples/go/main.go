package main

import (
    "fmt"
    "io"
    "net/http"
    "net/url"
    "os"
)

const baseURL = "https://apibara.tech/api/v1/vehicle-auction"

func apibaraGet(path string, params map[string]string) ([]byte, error) {
    apiKey := os.Getenv("APIBARA_API_KEY")
    if apiKey == "" {
        return nil, fmt.Errorf("missing APIBARA_API_KEY")
    }

    u, err := url.Parse(baseURL + path)
    if err != nil {
        return nil, err
    }

    q := u.Query()
    for key, value := range params {
        if value != "" {
            q.Set(key, value)
        }
    }
    u.RawQuery = q.Encode()

    req, err := http.NewRequest(http.MethodGet, u.String(), nil)
    if err != nil {
        return nil, err
    }

    req.Header.Set("X-API-Key", apiKey)
    req.Header.Set("Accept", "application/json")

    res, err := http.DefaultClient.Do(req)
    if err != nil {
        return nil, err
    }
    defer res.Body.Close()

    body, err := io.ReadAll(res.Body)
    if err != nil {
        return nil, err
    }

    if res.StatusCode < 200 || res.StatusCode >= 300 {
        return nil, fmt.Errorf("apibara API error %d: %s", res.StatusCode, string(body))
    }

    return body, nil
}

func main() {
    body, err := apibaraGet("/vehicles", map[string]string{
        "make":           "Toyota",
        "model":          "Camry",
        "year_from":      "2018",
        "lot_sub_status": "Open",
        "per_page":       "20",
    })

    if err != nil {
        panic(err)
    }

    fmt.Println(string(body))
}
