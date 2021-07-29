@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-info btn-round text-white pull-right" href="{{ route('roles.create') }}">{{ __('Add New Role') }}</a>
            <h4 class="card-title">{{ __('Menu Roles') }}</h4>
            <div class="col-12">
            </div>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Hierarchy</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                        <th></th>
                        {{-- <th></th> --}}
                        <th></th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td>
                                {{ $role->hierarchy }}
                            </td>
                            <td>
                                {{ $role->created_at }}
                            </td>
                            <td>
                                {{ $role->updated_at }}
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ route('roles.up', ['id' => $role->id]) }}">
                                    <i class="cil-arrow-thick-top"></i> 
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ route('roles.down', ['id' => $role->id]) }}">
                                    <i class="cil-arrow-thick-bottom"></i>  
                                </a>
                            </td>
                            {{-- <td>
                                <a href="{{ route('roles.show', $role->id ) }}" class="btn btn-primary">Show</a>
                            </td> --}}
                            <td>
                                <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary">Edit</a>
                            </td>
                            {{-- <td>
                            <form action="{{ route('roles.destroy', $role->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

@endsection