@error('success')
    
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check-all mr-2"></i> {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@enderror
@error('danger')
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center"
        role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="mdi mdi-close-circle me-2"></i>{{ $message }}
        
    </div>

    <script>
        $(".alert").alert();

    </script>
@enderror


    
           
        