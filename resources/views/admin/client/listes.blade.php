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

                  <h4 class="card-title">Liste des Clients</h4>


                  <p class="card-description">
                    <a href="">

                    </a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                        Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                           Téléphone
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Adresse
                          </th>
                          <th>
                           Piece-identité
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
                         @foreach($clientAll as $client)
                        <tr>
                          <td class="py-1">
                            {{$client->nom}}

                          </td>
                          <td>
                            {{$client->prenom}}

                          </td>
                          <td>
                            {{$client->tel}}

                          </td>
                          <td>
                            {{$client->email}}

                          </td>

                          <td>
                            {{$client->adresse}}

                          </td>

                          <td>
                            {{$client->adresse}}

                          </td>
                          <td>
                            <a href="{{route('client.show',$client->id)}}">
                                <button class="btn btn-info">Show</button>
                            </a>
                          </td>
                          <td>
                            <a href="{{route('client.edit',$client->id)}}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{$clientAll->links()}}
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
