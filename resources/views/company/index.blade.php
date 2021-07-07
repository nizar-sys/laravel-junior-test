@extends('../layouts.app');
@section('title', 'Company datas')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if ($message = Session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
                <table class="table table-bordered mt-2 text-center" id="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Email</th>
                            <th scope="col">Company Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $company)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/company/{{$company->id}}/edit" class="btn btn-warning">Update</a>
                                    
                                    <form action="{{ route('company.destroy', ['company'=>$company->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('If you delete Companie, employess on This Companie is deleted. Continue?')" value="{{$company->id}}" name="company_id">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-felx justify-content-center">

                    {{ $data->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
@endsection
