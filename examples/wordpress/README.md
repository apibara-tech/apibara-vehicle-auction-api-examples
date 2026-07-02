# WordPress Integration Notes

For most WordPress websites, use the official Apibara Vehicle Auction WordPress plugin:

https://github.com/apibara-tech/apibara-vehicle-auction-wordpress-plugin

The plugin displays live Copart and IAAI vehicle auction listings using the Apibara Vehicle Auction Data API.

## Direct API integration idea

If you build a custom WordPress plugin or theme, call the API from the server side using `wp_remote_get()` and keep the API key private.

Never expose the API key in frontend JavaScript.
