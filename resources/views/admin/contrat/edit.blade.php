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

                  <h1 class="card-title mb-5">Ajouter un Appartement</h1>

                  <h4>
                    <a href="{{ route('add.immeuble') }}">
                      <button class="btn btn-info"> Ajouter un nouvel immeuble </button>
                    </a>
                  </h4>

                  <div class="table-responsive">
                    <form action="{{ route('appartement.update', $appartement) }}" method="POST">
                      @csrf

                      <div class="my-3">
                        <label for="immeuble" class="form-label">Selectionner un Immeuble existant</label>
                        <select class="form-select" name="bien_immobilier_id" id="immeuble"
                          aria-label="Selectionner un immeuble">
                          <option value="{{ $appartement->bien_immobilier_id }}">
                            {{$appartement?->bien_immobilier?->nom_immeuble }}
                          </option>
                          @foreach ($immeubles as $key => $val)
                          <option value="{{ $key }}">{{ $val }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="type_de_bail" class="form-label">Type de bail</label>
                        <select class="form-select" name="type_de_bail" id="type_de_bail">
                          <option value="{{ $appartement->type_de_bail }}">{{ $appartement->type_de_bail }}</option>
                          <option value="Appartement">Appartement</option>
                          <option value="Bureau">Bureau</option>
                          <option value="Studio">Studio</option>
                          <option value="Commerce">Commerce</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="nbr_piece" class="form-label">Nombre de pièce</label>
                        <input type="number" max="10" name="nbr_piece" class="form-control"
                          value="{{ old('nbr_piece', $appartement->nbr_piece) }}" id="nbr_piece" placeholder="3">
                      </div>

                      <div class="mb-3">
                        <label for="montant" class="form-label">Montant de la caution</label>
                        <input type="number" name="montant_caution" class="form-control"
                          value="{{ old('montant_caution', $appartement->montant_caution) }}" id="montant"
                          placeholder="100000">
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
