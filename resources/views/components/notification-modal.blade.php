@if(session('message'))
    <div class="alert alert-{{ session('type', 'success') }} d-flex align-items-center justify-content-between p-3 fade show" role="alert"
        style="border-left: 5px solid {{ session('type') == 'success' ? '#28a745' : '#dc3545' }}; 
        border-radius: 8px; position: fixed; top: 20px; right: 20px; min-width: 300px; z-index: 1050;">
        <div>
            <i class="bi {{ session('type') == 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' }} me-2" 
                style="color: {{ session('type') == 'success' ? '#28a745' : '#dc3545' }};"></i> 
            <strong>{{ session('message') }}</strong>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            document.querySelector('.alert').classList.add('fade');
            setTimeout(() => document.querySelector('.alert').remove(), 500);
        }, 3000);
    </script>
@endif
