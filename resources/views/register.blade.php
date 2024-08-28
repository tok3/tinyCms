@extends('layouts.app')

@section('content')
    <h1></h1>
    {{$code}}

    <div class="container py-5">
        <h2>Newsletter Registration</h2>
        <form action="your-server-script.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
    </div>

@endsection
