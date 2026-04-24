<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #1e3a8a 0%, #172554 100%);">
                    <h4 class="mb-0 text-center">
                        <i class="fas fa-edit me-2"></i>Modifier la Catégorie
                    </h4>
                </div>

                <div class="card-body p-4 bg-white">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Nom de la Catégorie</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 10px 0 0 10px;">
                                    <i class="fas fa-tag text-primary"></i>
                                </span>
                                <input type="text" 
                                       name="categories_niveau" 
                                       class="form-control border-start-0 ps-0" 
                                       style="border-radius: 0 10px 10px 0; height: 50px;" 
                                       value="{{ $category->categorie_niveaux }}" 
                                       required>
                            </div>
                            <div class="form-text mt-2 italic text-muted small">
                                <i class="fas fa-info-circle me-1"></i> Modifiez le libellé du cycle ou niveau.
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary py-3 fw-bold" 
                                    style="background-color: #1e3a8a; border: none; border-radius: 10px; transition: 0.3s;">
                                <i class="fas fa-save me-2"></i>Sauvegarder les modifications
                            </button>
                            
                            <a href="{{ route('categories.index') }}" class="btn btn-link text-decoration-none text-muted mt-2">
                                <i class="fas fa-times me-1"></i> Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>