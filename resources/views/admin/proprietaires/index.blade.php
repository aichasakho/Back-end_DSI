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
                   
                  <h4 class="card-title">Liste des propriétaires</h4>
                 

                  <p class="card-description">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Ajouter-un-propriétaire
                      </button>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                          Profile
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Prenom
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Tel
                          </th>
                          <th>
                            Details
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($userAll as $user)
                        <tr>
                          <td class="py-1">
                            <img src="{{asset('storage/'.$user->profile)}}" alt="image"/>
                          </td>
                          <td>
                           {{$user->nom}}
                          </td>
                          <td>
                            {{$user->prenom}}

                          </td>
                          <td>
                            {{$user->email}}

                          </td>
                          <td>
                            {{$user->tel}}

                          </td>
                          <td>
                            <a href="{{route('proprio.show',$user->id)}}">
                                <button class="btn btn-info">Edit</button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{$userAll->links()}}
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

  
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title fs-5" id="staticBackdropLabel">Ajouter-un-proprietaie</h4>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          </div>
          <div class="modal-body">
              <form action="{{route('proprio.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                 
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nom</label>
                      <input type="text" name="nom"  class="form-control" id="exampleInputPassword1">
                    </div>

                     
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Prenom</label>
                    <input type="text" name="prenom"  class="form-control" id="exampleInputPassword1">
                  </div>

                   
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputPassword1">
                  </div>
  
  
                    
                    
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Teléphone</label>
                    <input type="text" name="tel"  class="form-control" id="exampleInputPassword1">
                  </div>


                   
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Profile</label>
                    <input type="file" name="profile"  class="form-control" id="exampleInputPassword1">
                  </div>
                 
                  <button type="submit" class="btn btn-primary">Submit</button>
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
