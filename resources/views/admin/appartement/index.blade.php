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
                  <h4 class="card-title">Liste des Appartements</h4>

                  <hr>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Image </th>
                          <th> Immeuble </th>
                          <th> Proprietaire </th>
                          <th> Nombre de piece </th>
                          <th> Montant caution</th>
                          <th> Details </th>
                          <th> Modifier </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($appartements as $appart)
                        <tr>
                          <td class="py-1">
                            <img src="{{ $appart?->bienImmobilier?->image }}" alt="image" /><br>
                          </td>
                          <td> {{ $appart?->bienImmobilier?->nom_immeuble }} </td>
                          <td> {{ $appart?->bienImmobilier->proprietaire?->nom }} {{
                            $appart?->bienImmobilier->proprietaire?->prenom }}</td>
                          <td> {{ $appart?->nbr_piece }} </td>
                          <td> {{ $appart?->montant_caution }} </td>
                          <td>
                            <button class="btn btn-inverse-info" onclick="showModal(event)" data-bien="{{ json_encode($appart) }}">
                              <i class="mdi mdi-eye"></i>
                            </button>
                          </td>
                          <td>
                            <a href="{{ route('appartement.edit', $appart) }}">
                              <button class="btn btn-inverse-success">
                                <i class="mdi mdi-pencil"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="{{ route('appartement.destroy', $appart) }}">
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
                {{ $appartements->links() }}
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
            <h1 class="modal-title fs-5" id="bienModalLabel">Détail de l'appartement</h1>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
            <p id="bienImage"></p>
            <p>Nombre de pièce : <span id="NombrePiece"></span></p>
            <p>Nom de l'immeuble: <span id="nomImmeuble"></span></p>
            <p>Proprietaire: <span id="proprietaire"></span></p>
            <p>Montant caution : <span id="caution"></span></p>

            {{-- TODO: Ajouter les autres informations du bien --}}
          </div>
        </div>
      </div>
    </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- page-body-wrapper ends -->
  </div>
  @include("admin.pages.js")
</body>
</html>

<script>
  function showModal(event) {
    // Récupère l'attribut 'data-bien' et parse-le en objet JSON
    var appart = JSON.parse(event.currentTarget.getAttribute('data-bien'));
    console.log(appart); // Pour vérifier la structure de l'objet

    // Utiliser les propriétés de l'objet 'appart'
    document.getElementById("bienImage").innerHTML = `<img src="${appart.bienImmobilier ? appart.bienImmobilier.image : 'Non spécifié'}" alt="image" class="img-fluid" />`;
    document.getElementById("NombrePiece").innerHTML = appart.nbr_piece || 'Non spécifié';
    document.getElementById("nomImmeuble").innerHTML = appart.bienImmobilier ? appart.bienImmobilier.nom_immeuble : 'Non spécifié';
    document.getElementById("proprietaire").innerHTML = appart.bienImmobilier?.proprietaire ? `${appart.bienImmobilier.proprietaire.nom} ${appart.bienImmobilier.proprietaire.prenom}` : 'Non spécifié';
    document.getElementById("caution").innerHTML = appart.montant_caution || 'Non spécifié';

    // Affiche le modal
    $('#bienModal').modal('show');
  }
</script>
