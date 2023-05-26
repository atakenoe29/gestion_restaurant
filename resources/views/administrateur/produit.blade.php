@extends('layout.barre_navigation')

@section('content')
<!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Produit de la catégorie {{ $categorie->name }}</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('menu') }}">Retour</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      
                      

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ajouter un produit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajout de produit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <form id="example-form" action="{{route('ajout.produit', $categorie->id) }}" method="POST" 
                                  enctype="multipart/form-data" class="mt-5">
                                    @csrf
                                    <div>
                                        <section>
                                          <label for="picture">Image du produit *</label>
                                            <input
                                            id="picture"
                                            name="picture"
                                            type="file"
                                            class="form-control"
                                            />
                                            <label for="name">Nom du produit *</label>
                                            <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            class="required form-control" required
                                            />
                                            <label for="description">Description du prix</label>
                                            <input
                                            id="description"
                                            name="description"
                                            type="text"
                                            class=" form-control"
                                            />
                                            <label for="price">Prix du produit *</label>
                                            <input
                                            id="price"
                                            name="price"
                                            type="text"
                                            class=" form-control" required
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
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Basic Datatable</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nom</th>
                          <th>Description</th>
                          <th>Prix</th>
                          <th>Statut</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($produits as $produit)
                        <tr>
                          <td>
                            <img src="{{ asset('images_produit/'.$produit->picture)}}" width="50px", height="50px" alt=""></img>
                          </td>
                          <td>{{$produit->name}}</td>
                          <td>{{$produit->description}}</td>
                          <td>{{number_format($produit->price, 2)}} fr CFA</td>
                          @if($produit->statut == 1)
                            <td>
                              <p>Présent au menu du jour</p>
                            </td>
                          @else
                            <td>
                              <p style="color:red">Absent au menu du jour</p>
                            </td>
                          @endif
                          <td>
                            @if($produit->statut == 1)
                              <button
                                type="button"
                                class="btn btn-secondary btn-sm text-white"
                              ><a href="{{ route('modif_statut.produit', $produit->id)}}" style="color:white" >
                                Retirer du menu</a>
                              </button>
                            @else
                              <button
                                type="button"
                                class="btn btn-success btn-sm text-white"
                              ><a href="{{ route('modif_statut.produit', $produit->id)}}" style="color:white" >
                                Afficher au menu</a>
                              </button>
                            @endif

                            <button
                              type="button"
                              class="btn btn-cyan btn-sm"
                              data-bs-toggle="modal" data-bs-target="#editModal"
                            ><a href="{{ route('edit.produit', $produit->id)}}" style="color:white" >
                              Modifier</a>
                            </button>
                            
                            <button
                              type="button"
                              class="btn btn-danger btn-sm text-white" data-bs-target="#"
                            >
                              <a href="{{ route('delete.produit', $produit->id)}}" data-toggle="propover"  
                              title="Supprimer le produit" 
                              style="color:white">
                                Supprimer
                              </a>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nom</th>
                          <th>Description</th>
                          <th>Prix</th>
                          <th>Statut</th>
                          <th>Actions</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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


@endsection