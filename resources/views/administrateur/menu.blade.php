@extends('layout.barre_navigation')


@section('content')
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Catégorie de menu</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      
                      

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter une catégorie de menu
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajout d'une catégorie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <form id="example-form" action="{{route('ajout.categorie') }}" method="POST" class="mt-5">
                                    @csrf
                                    <div>
                                        <section>
                                            <label for="name">Nom de la catégorie *</label>
                                            <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            class="required form-control" required
                                            />
                                            <label for="description">Description de la catégorie</label>
                                            <input
                                            id="description"
                                            name="description"
                                            type="text"
                                            class=" form-control"
                                            />
                                            <p>(*) Obligatoire</p>
                                        </section>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                                    </div>
                                </form>


                                ...
                            </div>
                            
                            </div>
                        </div>
                        </div>


                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Sales Cards  -->
          <!-- ============================================================== -->
          

            
              <div class="row">
              @foreach($categories as $categorie)
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title mb-0">{{ $categorie->name }}</h5><hr>
                      <p>{{ $categorie->description }}</p>




                        <button
                          type="button"
                          class="btn btn-cyan btn-sm"
                          data-bs-toggle="modal" data-bs-target="#editModal"
                        ><a href="{{ route('edit.categorie', $categorie->id)}}" style="color:white" >
                          Modifier</a>
                        </button>

                        <button
                          type="button"
                          class="btn btn-success btn-sm text-white"
                        ><a href="{{ route('produits', $categorie->id)}}" style="color:white" >
                          Voir la liste des produits</a>
                        </button>

                        <button
                          type="button"
                          class="btn btn-danger btn-sm text-white"
                        >
                          <a href="{{ route('delete.categorie', $categorie->id)}}" data-toggle="propover"  
                          title="La suppression de cette catégorie entraînera la perte de tous les produits compris dans cette dernière" 
                          style="color:white">
                            Supprimer
                          </a>
                        </button>

                        

                    </div>
                  </div>
                </div>
                @endforeach


              </div>
            


          
          <!-- ============================================================== -->
          <!-- Recent comment and chats -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <script>
      $(function () {
        $('a').propover();
      })
    </script>
@endsection