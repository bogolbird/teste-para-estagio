<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Amigo Secreto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{BASE}}">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="{{BASE}}pesquisa/">
          <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" id="pes" name="pes">
          <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
</header>
