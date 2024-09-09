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
                   
                  <h4 class="card-title">Details Catégories</h4>
                 

                  <p class="card-description">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Modifier une catégorie
                      </button>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                         Numéro
                          </th>
                          <th>
                           Libelle
                          </th>
                          <th>
                           Status
                          </th>
                          <th>
                            Date-d'ajout
                          </th>

                          <th>
                            Date-de-mise-à jour
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            {{$cat->id}}
                        </td>
                          <td>
                           {{$cat->categorie}}
                          </td>
                          <td>
                            {{$cat->status}}

                          </td>
                          
                          <td>
                            {{$cat->created_at}}

                          </td>

                          <td>
                            {{$cat->upated_at}}

                          </td>
                          
                        </tr>
                      </tbody>
                    </table>
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

  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-5" id="staticBackdropLabel">Ajouter-une-catégorie</h4>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
            <form action="{{route('update.categorie')}}" method="POST">
                @csrf
               
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Designation</label>
                    <input type="text" name="categorie" value="{{$cat->categorie}}"  class="form-control" id="exampleInputPassword1">
                  </div>


                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="{{$cat->status}}">{{$cat->status}}</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Indisponible">Indisponible</option>
                    </select>
                  </div>

                  <input type="hidden" value="{{$cat->id}}" name="id">
               
                <button type="submit" class="btn btn-primary">Mise-à-jour</button>
              </form>
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
