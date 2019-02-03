# Php Error page generator for Apache

## Apache HTTPd

    Alias /http-errors /your/errorpages/repo/root/http-errors
    ErrorDocument 400 /http-errors/400.html
    ErrorDocument 401 /http-errors/401.html
    ErrorDocument 403 /http-errors/403.html
    ErrorDocument 404 /http-errors/404.html
    ErrorDocument 405 /http-errors/405.html
    ErrorDocument 406 /http-errors/406.html
    ErrorDocument 408 /http-errors/408.html
    ErrorDocument 413 /http-errors/413.html
    ErrorDocument 414 /http-errors/414.html
    ErrorDocument 417 /http-errors/417.html
    ErrorDocument 500 /http-errors/500.html
    ErrorDocument 502 /http-errors/502.html
    ErrorDocument 503 /http-errors/503.html
    ErrorDocument 504 /http-errors/504.html
    
## Composer

    "scripts": {
        "post-autoload-dump": [
          "@build-error-pages"
        ],
        "build-error-pages": [
          "ByTIC\\HttpErrorPages\\Composer\\ScriptHandler::build"
        ]
    },
    
    "extra": {
        "http-error-pages": {
            "dist_path": "/public/http-errors"
            "suggestion_links" : {
                "Home": "https://mydomain.com/",
                "Support": "mailto:support@mydomain.com"
            }
        }
    }