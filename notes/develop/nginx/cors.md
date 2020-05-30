# Nginx CORS

```nginx
location / {
  add_header 'Access-Control-Allow-Origin' '*';
  add_header 'Access-Control-Allow-Credentials' 'true';
  add_header 'Access-Control-Allow-Headers' 'Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,X-Requested-With';
  add_header 'Access-Control-Allow-Methods' 'GET,POST,OPTIONS';
  if ($request_method = 'OPTIONS') {
    return 204;
  }
}
```
