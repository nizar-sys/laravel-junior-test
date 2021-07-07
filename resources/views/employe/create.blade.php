@extends('../layouts.app')
@section('title', 'Add Company')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('employe.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <select name="company_name" class="form-control @error('company_name') is-invalid @enderror">
                                    <option value="">Choose Company</option>
                                    @foreach ($data as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" name="firstname"
                                            class="form-control  @error('firstname') is-invalid @enderror" id="firstname"
                                            placeholder="First name" value="{{ old('firstname') }}">
                                    </div>
                                    @error('firstname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Last name</label>
                                        <input type="text" name="lastname"
                                            class="form-control  @error('lastname') is-invalid @enderror" id="firstname"
                                            placeholder="Last name" value="{{ old('lastname') }}">
                                    </div>
                                    @error('lastname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email@gmail.com" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror"
                                    id="phone" placeholder="Phone" value="{{ old('phone') }}">
                            </div>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <a href="{{ route('employe.index') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
