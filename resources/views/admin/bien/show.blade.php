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
                   
                  <h4 class="card-title">Details du bien-immobilier</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                         Titre
                          </th>
                          <th>
                            Proprietaire
                          </th>
                          <th>
                           Superficie
                          </th>
                          <th>
                            Catégorie
                          </th>
                          <th>
                            Status
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                   
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('storage/'.$bien->image)}}" alt="image"/><br>
                            {{$bien->titre}}

                          </td>
                         
                          <td>
                            {{$bien->proprietaire->nom}}

                          </td>
                          <td>
                            {{$bien->superficie}}

                          </td>
                          <td>
                            {{$bien->categorie->categorie}}

                          </td>
                          
                          <td>
                            {{$bien->status ? 'Disponible':'Non-Disponible'}}

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

  

    <!-- page-body-wrapper ends -->
  </div>
   @include("admin.pages.js")
</body>

</html>
