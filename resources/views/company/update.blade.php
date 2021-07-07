@extends('../layouts.app')
@section('title', 'Update Company')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/company/update">
                            @method('PATCH')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$data['id']}}">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="company_name" placeholder="Company name" value="{{ $data['name'] }}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="company_email">Company Email</label>
                                <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="company_email" placeholder="name@gmail.com" value="{{ $data['email'] }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="company_website">Company Website</label>
                                <input type="text" name="website"
                                    class="form-control  @error('website') is-invalid @enderror" id="company_website"
                                    placeholder="name@example.com" value="{{ $data['website'] }}">
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
