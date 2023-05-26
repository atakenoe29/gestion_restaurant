@extends('layout.formulaire_layout')  
    
@section('formulaire')
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Modification de produit</h5>
                            </div>
                            <div class="modal-body">


                            <form id="update-form" action="{{route('update.produit', $produit->id) }}" method="POST" class="mt-5">
                                    @csrf
                                    <div>
                                        <img src="{{ asset('images_produit/'.$produit->picture)}}" width="50px", height="50px" alt=""></img>
                                        <section>
                                            <label for="picture">Image du produit</label>
                                            <input
                                            id="picture"
                                            name="picture"
                                            value="{{ $produit->picture }}"
                                            type="file"
                                            class="required form-control"
                                            />
                                            <label for="name">Nom du produit *</label>
                                            <input
                                            id="name"
                                            name="name"
                                            value="{{ $produit->name }}"
                                            type="text"
                                            class="required form-control" required
                                            />
                                            <label for="description">Description du produit</label>
                                            <input
                                            id="description"
                                            name="description"
                                            value="{{ $produit->description }}"
                                            type="text"
                                            class="required form-control"
                                            />
                                            <label for="price">Prix du produit *</label>
                                            <input
                                            id="price"
                                            name="price"
                                            value="{{ $produit->price }}"
                                            type="text"
                                            class="required form-control" required
                                            />
                                            <p>(*) Obligatoire</p>
                                        </section>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary ">
                                            <a href="{{route('produits', $produit->categorie_id) }}" style="color:white">Annuler</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                                    </div>
                                </form>

                                


                                ...
                            </div>
                            
                            </div>
                        </div>
    @endsection