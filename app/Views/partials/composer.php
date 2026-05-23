<div class="card mb-4 shadow-sm border-0" style="border-radius: 16px;">
    <div class="card-body">
        <form action="<?= base_url('publication/add'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <textarea class="form-control border-0" name="content" rows="3" style="resize: none; font-size: 1.1rem;" placeholder="¿Qué estás pensando, <?= session()->get('name') ?>?" required></textarea>
            </div>
            
            <hr class="my-2" style="border-color: #f0f2f5;">
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <label class="btn btn-light btn-sm text-secondary mb-0" style="border-radius: 20px; cursor: pointer;">
                        📷 Agregar Foto (Opcional)
                        <input type="file" name="image" accept="image/*" style="display: none;" onchange="document.getElementById('fileName').innerText = this.files[0].name">
                    </label>
                    <small id="fileName" class="text-muted ml-2"></small>
                </div>
    
                <select name="visibility" class="form-control form-control-sm w-auto mr-2">
                    <option value="public">Pública</option>
                    <option value="private">Privada</option>
                </select>
    
                <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 20px;">
                    Publicar
                </button>
            </div>
    		
        </form>
    </div>
</div>