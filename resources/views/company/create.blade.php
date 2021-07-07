@extends('../layouts.app')
@section('title', 'Add Company')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('company.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="company_name" placeholder="Company name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="company_email">Company Email</label>
                                <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="company_email" placeholder="name@gmail.com" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="company_website">Company Website</label>
                                <input type="text" name="website" class="form-control  @error('website') is-invalid @enderror"
                                    id="company_website" placeholder="name@example.com" value="{{ old('website') }}">
                            </div>
                            @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <a href="{{ route('company.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
