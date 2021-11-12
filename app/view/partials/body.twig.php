<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inatial-scale=1.0">
    <link rel="stylesheet" href="{{BASE}}vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{BASE}}css/style.css"/>
    <title>
      {% block title %}{% endblock %}
    </title>
  </head>
  <body>
    {% include 'partials/header.twig.php' %}

    {% block body %}{% endblock %}
  </body>
</html>
