{% extends 'partials/body.twig.php'  %}

{% block title %}Pesquisa{% endblock %}

{% block body %}

<div class="max-width center bg-white padding">
  <h1>Pesquisa - Resultado</h1>
  <hr>
  <p><span class="font-weight-bold"> {{termo}}</span></p>
  <h3>{{erro}}</h3>
  <p><span class="font-weight-bold"> {{id}}</span></p>
  <p><span class="font-weight-bold"> {{nome}}</span></p>
  <p><span class="font-weight-bold"> {{email}}</span></p>
</div>
{% endblock %}
