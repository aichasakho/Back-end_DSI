<!DOCTYPE html>
<html lang="en">


@include("admin.pages.head")

<body>
  <div class="container-scroller d-flex">
    @include("admin.pages.sidebar")
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      @include('admin.pages.navbar')

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row gap-2">
                    <p class="card-description">
                      <a href="{{ route('add.immeuble') }}">
                        <button type="button" class="btn btn-info">
                          Ajouter un Immeuble
                        </button>
                      </a>
                    </p>
                    <p class="card-description">
                      <a href="{{ route('appartement.create') }}">
                        <button type="button" class="btn btn-info">
                          Ajouter un Appartement
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="{{ route('add.maison') }}">
                        <button type="button" class="btn btn-info">
                          Ajouter une Maison
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="{{ route('parcelle.create') }}">
                        <button type="button" class="btn btn-info">
                          Ajouter une Parcelle
                        </button>
                      </a>
                    </p>

                    <p class="card-description">
                      <a href="{{ route('add.terrain') }}">
                        <button type="button" class="btn btn-info">
                          Ajouter un Terrain
                        </button>
                      </a>
                    </p>

                  </div>
                  <hr>
                  <h4 class="card-title">Liste des Biens Immobiliers</h4>

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Bien - titre
                          </th>
                          <th>
                            Proprietaire
                          </th>
                          <th>
                            Superficie / Nombre d'etages
                          </th>
                          <th>
                            Type de bien
                          </th>
                          <th>
                            Localité
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Details
                          </th>
                          <th>
                            Modifier
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($biens as $bien)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $bien->image }}" alt="image" /><br>
                          </td>
                          <td> {{ $bien->proprietaire->nom }} {{ $bien->proprietaire->prenom }}</td>
                          <td> {{ $bien->superficie ?? $bien->nbr_etage }}</td>
                          <td> {{ $bien->type_bien->type_bien }} </td>
                          <td> {{ $bien->localite->localite }} </td>


                          <td> {{ $bien->etat ? 'Actif' : 'Inactif' }}</td>
                          <td>

                            <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="{{ $bien }}">
                              <i class="mdi mdi-eye"></i>
                            </button>

                          </td>
                          <td>
                            @if ($bien->type_bien_id == 1)
                            <a href="{{ route('edit.immeuble', $bien->id) }}">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            @else
                            <a href="">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                            @endif
                          </td>

                          <td>
                            <a href="">
                              <button class="btn btn-inverse-danger">
                                <i class="mdi mdi-delete"></i>
                              </button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{ $biens->links() }}
              </div>
            </div>



          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                  bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                    href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                    templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- Button trigger modal -->

    <div class="modal fade" id="bienModal" tabindex="-1" aria-labelledby="bienModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bienModalLabel">Date-visite</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
            <p id="bienImage"></p>
            <p>ID du bien : <span id="bienId"></span></p>
            <p>type de bien: <span id="bienTypeBien"></span></p>
            <p>Proprietaire: <span id="proprietaire"></span></p>
            <p>Localité : <span id="localiteBien"></span></p>

            {{-- TODO: Ajouter les autres informations du bien --}}
          </div>
        </div>
      </div>
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  @include("admin.pages.js")
</body>

</html>

<script>
  function showModal(event) {
    // Récupère l'attribut 'data-bien' et parse-le en objet JSON
    var bien = JSON.parse(event.currentTarget.getAttribute('data-bien'));
    console.log(bien);

    // Utilise les propriétés de l'objet 'bien'
    document.getElementById("bienImage").innerHTML = `<img src="${bien.image}" alt="image" class="img-fluid" />`;
    document.getElementById("bienId").innerHTML = bien.id;
    document.getElementById("bienTypeBien").innerHTML = bien.type_bien ? bien.type_bien.type_bien : 'Non spécifié';
    document.getElementById("proprietaire").innerHTML = bien.proprietaire ? bien.proprietaire.prenom  : 'Non spécifié';
    document.getElementById("localiteBien").innerHTML = bien.localite ? bien.localite.localite : 'Non spécifié';
    // TODO: Ajouter les autres informations du bien

    // Affiche le modal
    $('#bienModal').modal('show');
}

</script>
