@extends('layout.formulaire_layout')  
    
@section('formulaire')
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Modification de catégorie</h5>
                            </div>
                            <div class="modal-body">


                            <form id="update-form" action="{{route('update.categorie', $categorie->id) }}" method="POST" class="mt-5">
                                    @csrf
                                    <div>
                                        <section>
                                            <label for="name">Nom de la catégorie *</label>
                                            <input
                                            id="name"
                                            name="name"
                                            value="{{ $categorie->name }}"
                                            type="text"
                                            class="required form-control" required
                                            />
                                            <label for="description">Description de la catégorie</label>
                                            <input
                                            id="description"
                                            name="description"
                                            value="{{ $categorie->description }}"
                                            type="text"
                                            class="required form-control"
                                            />
                                            <p>(*) Obligatoire</p>
                                        </section>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary ">
                                            <a href="{{route('menu') }}" style="color:white">Annuler</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enrégistrer</button>
                                    </div>
                                </form>

                                


                                ...
                            </div>
                            
                            </div>
                        </div>
    @endsection