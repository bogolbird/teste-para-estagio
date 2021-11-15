{% extends 'partials/body.twig.php' %}

{% block title %}Home{% endblock %}

{% block body %}
<div class="max-width center bg-white padding">
  <table class="max-width">
    <tr>
      <th>
        Nome
      </th>
      <th class="direita">
        Email
      </th>
    </tr>
  </table>
  <hr>
  <a href="{{BASE}}cadastro/"  class="btn btn-info btn-sm">Cadastro</a>

  <a href="{{BASE}}sorteio/"  class="btn btn-info btn-sm">Sorteio</a>
</div>
{% endblock %}
