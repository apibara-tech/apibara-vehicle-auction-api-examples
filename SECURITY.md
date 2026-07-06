# Security Policy

## API key safety

Do not commit real Apibara API keys to GitHub. Keep keys in environment variables, CI secrets or platform secret managers.

Bad:

```js
const apiKey = "real_key_here";
```

Good:

```js
const apiKey = process.env.APIBARA_API_KEY;
```

## Frontend applications

Do not call the Apibara API directly from browser code when the API key would be visible to users. Use a backend route, serverless function or private WordPress/PHP endpoint.

## Reporting issues

For security-sensitive issues, contact Apibara through https://apibara.tech/en/contact.
