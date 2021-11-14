{% extends 'partials/body.twig.php'  %}

{% block title %}Cadastro{% endblock %}

{% block body %}
<div class="max-width center bg-white padding mt-5">
    <h1>novo cadastro</h1>

    <hr>

    <form action="{{BASE}}insert-cadastro/" method="post">

        <div class="mt-3">
            <label for="name">Insara seu Nome</label>
            <input type="text" id="name" class="form-control" placeholder="Nome" required/>
        </div>
        <div class="mt-3">
            <label for="email">Insira seu Email</label>
            <input type="text" id="email" class="form-control" placeholder="Email" required/>
        </div>

        <div class="mt-3 text-right">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>

    </form>

</div>
{% endblock %}
