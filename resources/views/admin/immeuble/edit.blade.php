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

          <!-- Button trigger modal -->
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

                  <h1 class="card-title mb-5">Ajouter un nouvel immeuble</h1>

                  <div class="table-responsive">
                    <form action="{{ route('update.immeuble', $immeuble) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="agent_id" value="{{ Auth::user()->id }}">
                      <div class="my-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}"
                          placeholder="image">
                      </div>

                      <div class="my-3">
                        <label for="nom" class="form-label">Nom Immeuble</label>
                        <input type="text" name="nom_immeuble" class="form-control" id="nom"
                          value="{{ old('nom_immeuble', $immeuble->nom_immeuble) }}" placeholder="Nom de l'immeuble">
                      </div>

                      <div class="my-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" value="{{ old('prix', $immeuble->prix) }}"
                          id="prix" placeholder="100000">
                      </div>

                      {{-- choisir proprietaire --}}
                      <div class="my-3">
                        <label for="proprietaire" class="form-label">
                          Selectionner proprietaire
                        </label>
                        <select class="form-select" name="proprietaire_id" id="proprietaire"
                          aria-label="Selectionner un proprietaire">
                          <option value="{{ $immeuble->proprietaire_id }}" selected>
                            {{ $immeuble->proprietaire->nom }} {{ $immeuble->proprietaire->prenoms }}
                          </option>
                          @foreach ($proprietaires as $proprio)
                          <option value="{{ $proprio->id }}">
                            {{ $proprio->nom }} {{ $proprio->prenoms }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <input type="hidden" name="type_bien_id" value="1">

                      {{-- choisir localite --}}
                      <div class="mb-3">
                        <label for="localite" class="form-label">Selectionner une localite</label>
                        <select class="form-select" name="localite_id" id="localite"
                          aria-label="Selectionner une localite">
                          <option value="{{ $immeuble->localite_id }}" selected>
                            {{ $immeuble->localite->ville }} {{ $immeuble->localite->quartier }}
                          </option>
                          @foreach ($localites as $localite)
                          <option value="{{ $localite->id }}">
                            {{ $localite->ville }} {{ $localite->quartier }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="nbr_etage" class="form-label">Nombre d'étage</label>
                        <input type="number" max="10" name="nbr_etage"
                          value="{{ old('nbr_etage', $immeuble->nbr_etage) }}" class="form-control" id="nbr_etage"
                          placeholder="3">
                      </div>

                      {{-- date de construction --}}
                      <div class="mb-3">
                        <label for="date_construction" class="form-label">
                          Date de construction
                        </label>
                        <input type="date" name="date_construction" class="form-control"
                          value="{{ old('date_construction', $immeuble->date_construction) }}" id="date_construction">
                      </div>

                      <button type="submit" class="btn btn-info">Enregistrer</button>
                    </form>
                  </div>
                </div>
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

    <!-- page-body-wrapper ends -->
    @include("admin.pages.js")
</body>

</html>
