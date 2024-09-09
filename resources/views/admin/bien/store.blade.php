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
                   
                  <h4 class="card-title">Ajouter-un-bien-immobiler</h4>
      
                  <div class="table-responsive">
                  <form action="{{route('bienImmobilier.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Titre</label>
                  <input type="text" name="titre" value="{{old('titre')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Superficie</label>
                  <input type="text" name="superficie" value="{{old('superficie')}}" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prix-location</label>
                    <input type="number" name="prix_location" value="{{old('prix_location')}}" class="form-control" id="exampleInputPassword1">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                      <select name="status" id="">
                        <option value="true">Disponible</option>
                        <option value="false">Non-Disponible</option>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Catégorie</label>
                      <select name="categorie_id" id="">
                        @foreach ($categorie as $cat )
                        
                        <option value="{{$cat->id}}">{{$cat->categorie}}</option>
                        @endforeach
                      </select>
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Proprietaire</label>
                      <select name="proprietaire_id" id="">
                        @foreach ($user as $proprio )
                        
                        <option value="{{$proprio->id}}">{{$proprio->nom}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Profile</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                  </div>

               
                <button type="submit" class="btn btn-primary">Enregistrer</button>
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
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

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

    <!-- page-body-wrapper ends -->
  </div>
   @include("admin.pages.js")
</body>

</html>
