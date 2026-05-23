<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="font-weight-bold">Panel de Administración</h1>
            <p class="text-muted">Doble clic sobre el Nombre o el Login de cualquier usuario para editarlo directamente.</p>
        </div>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 16px;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-4">ID</th>
                            <th class="border-0">Nombre Completo</th>
                            <th class="border-0">Nombre de Usuario (Login)</th>
                            <th class="border-0">Rol</th>
                            <th class="border-0 text-right px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($users)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No hay usuarios registrados.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($users as $u): ?>
                                <tr>
                                    <td class="px-4 align-middle"><?= $u['id'] ?></td>
                                    <td class="font-weight-bold align-middle editable" 
                                        ondblclick="makeEditable(this, <?= $u['id'] ?>, 'name')"><?= $u['name'] ?></td>
                                    <td class="align-middle editable" 
                                        ondblclick="makeEditable(this, <?= $u['id'] ?>, 'login')"><?= $u['login'] ?></td>
                                    <td class="align-middle"><span class="badge badge-secondary px-2.5 py-1.5"><?= $u['role'] ?></span></td>
                                    <td class="text-right align-middle px-4">
                                        <a href="<?= base_url('admin/delete/'.$u['id']) ?>" 
                                           class="btn btn-outline-danger btn-sm px-3" 
                                           style="border-radius: 15px;"
                                           onclick="return confirm('¿Seguro?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function makeEditable(element, userId, fieldName) {
    if (element.classList.contains('editing')) return;
    
    element.classList.add('editing');
    const originalText = element.innerText; // Tomamos el texto tal cual es
    
    const input = document.createElement('input');
    input.type = 'text';
    input.value = originalText;
    input.className = 'form-control form-control-sm';
    
    element.innerText = '';
    element.appendChild(input);
    input.focus();
    
    input.onblur = function() {
        const newValue = input.value.trim();
        element.classList.remove('editing');
        
        if (newValue === '' || newValue === originalText) {
            element.innerText = originalText; // Regresa el valor original sin añadir nada
            return;
        }
        
        fetch('<?= base_url('admin/update_user') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `id=${userId}&field=${fieldName}&value=${encodeURIComponent(newValue)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                element.innerText = newValue; // Muestra el nuevo valor limpio
            } else {
                alert('Error al actualizar');
                element.innerText = originalText;
            }
        });
    };

    input.onkeydown = function(e) {
        if (e.key === 'Enter') input.blur();
    };
}
</script>