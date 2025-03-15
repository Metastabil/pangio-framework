# Pangio Framework
## Introduction
Pangio is a simple, lightweight, and rudimentary PHP framework designed for projects that aim 
to avoid unnecessary dependencies. It operates without Composer packages and focuses on a 
clean, minimalist structure.

Features:
- **Simple:** Focuses on the essentials, avoiding unnecessary features.
- **Lightweight:** Ideal for small projects or scenarios with limited resources.
- **PHP-based:** Perfect for developers familiar with native PHP development.
- **Dependency-free:** No third-party libraries or packages required.

This framework is an excellent choice for quick prototypes or applications requiring a 
straightforward and direct implementation.

## Installation
To install Pangio you only have to download the latest release and unpack it into a 
directory. For development purposes you can start the `server.bat` script in your terminal.

## Helper functions
### Form helper
`is_post()` \
Returns true or false depending on whether the request method is POST or not.

`is_get()` \
Returns true or false depending on whether the request method is GET or not.

`check_required_fields(array $required_fields)` \
Returns true or false depending on whether all the fields are present or not.

`get_input(string $input, string $method = 'POST')` \
Returns the value of the input as a string. The default method is POST, but you can also 
change it to GET. 

### JSON helper
`array_to_json(array $array)` \
Returns the given array as a JSON string.

`json_to_array(string $json)` \
Returns the given JSON string as an array.

`respond_with_json(int $statuscode, string $json)`
Responds with an HTTP statuscode and a JSON string.

`respond_with_500(string $message, array $data = [])` \
Responds with an HTTP statuscode 500, and a JSON string.

`respond_with_400(string $message, array $data = [])` \
Responds with an HTTP statuscode 400, and a JSON string.

`respond_with_200(string $message, array $data = [])` \
Responds with an HTTP statuscode 200, and a JSON string.

### Language helper
`get_language(string $locale = 'de')` \
Returns the content of `language/de.php`. Per default, it's stored in the constant `LANG`.

### String helper
`esc(string $string)` \
Returns the given string in escaped and safe.

`format_timestamp(string $timestamp, string $format = 'd.m.Y')` \
Returns the given timestamp in the given format. Per default, it's set to German DD.MM.YYYY.

### URL helper
`base_url(string $uri = '')` \
Returns the base URL, which is defined in `config/config.php` with an optional URI added to it.

`redirect(string $url)` \
Redirects to the given URL.

### Routing
Routes are defined in `config/routes.php`. You don't have to define if there's a parameter
send to that URL.