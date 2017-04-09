@if ($message = session('message'))
    <div class="alert alert-success">
        <p><strong>Sėkminga!</strong></p>
        <ul>
            <li>{{ $message }}</li>
        </ul>
    </div>
@endif

@if ($error = session('error'))
    <div class="alert alert-danger">
        <p><strong>Klaida!</strong></p>
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <p><strong>Klaida!</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($flash_message = session('flash_message'))
    <div class="alert alert-info">
        <p><strong>Dėmesio!</strong></p>
        <ul>
            <li>{{ $flash_message }}</li>
        </ul>
    </div>
@endif
