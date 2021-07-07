@extends('../layouts.app')
@section('title', 'Employes datas')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if ($message = Session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <a href="{{ route('employe.create') }}" class="btn btn-primary">Add Employe</a>
                <table class="table text-center table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Employe Name</th>
                            <th scope="col">Employe Email</th>
                            <th scope="col">Employe Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $employe)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $employe->name }}</td>
                                <td>{{ $employe->firstname . ' ' . $employe->lastname }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>{{ $employe->phone }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/employe/{{ $employe->id }}/edit" class="btn btn-warning">Update</a>

                                    <form action="{{ route('employe.destroy', ['employe' => $employe->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" value="{{ $employe->id }}"
                                            name="company_id">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
