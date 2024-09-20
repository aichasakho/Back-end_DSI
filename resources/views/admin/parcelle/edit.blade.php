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

                  <h1 class="card-title mb-5">Ajouter une parcelle</h1>

                  <h4>
                    <a href="{{ route('add.terrain') }}">
                      <button class="btn btn-info"> Ajouter un nouveau terrain </button>
                    </a>
                  </h4>

                  <div class="table-responsive">
                    <form action="{{ route('parcelle.update', $parcelle) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="my-3">
                        <label for="terrain" class="form-label">Selectionner un Terrain existant</label>
                        <select class="form-select" name="bien_immobilier_id" id="terrain"
                          aria-label="Selectionner un terrain">
                          <option value="{{ $parcelle?->bienImmobilier?->id }}" selected>
                            {{$parcelle?->bienImmobilier?->proprietaire->nom}}
                            {{$parcelle?->bienImmobilier?->proprietaire->prenom}} -
                            {{$parcelle?->bienImmobilier?->superficie}} - {{$parcelle?->bienImmobilier?->id}}
                          </option>
                          @foreach ($terrains as $terrain)
                          <option value="{{ $terrain->id }}">
                            Terrain {{ $terrain->proprietaire->nom }} {{ $terrain->proprietaire->prenom }}
                            - {{ $terrain->superficie }} - {{ $terrain->id }}
                          </option>
                          @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="superficie" class="form-label">Superficie</label>
                        <input type="number" max="1000" name="superficie" class="form-control"
                          value="{{ old('superficie', $parcelle->superficie) }}" id="superficie" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="numero_parcelle" class="form-label">Numero de parcelle</label>
                        <input type="number" max="1000" name="numero_parcelle" class="form-control"
                          value="{{ old('numero_parcelle', $parcelle->numero_parcelle) }}" id="numero_parcelle"
                          placeholder="3">
                      </div>

                      <button type="submit" class="btn btn-info">Modifier</button>
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

    <!-- Button trigger modal -->



    <!-- page-body-wrapper ends -->
    @include("admin.pages.js")
</body>

</html>
