@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
          <div class="col-6">
                      <form action="{{ route('search') }}" method="GET">
            <input class="form-control" type="text" name="search" required/>
            <button type="submit">Search</button>
          </form>
          </div>
          
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">email</th>
                      <th scope="col">Is Blocked</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  @if($users->isNotEmpty())
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->is_blocked}}</td>
                        <td>
                          <form action="{{ route('user.destroy',$user->id) }}" method="POST">              
                              <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  @else 
                    <div>
                      <h2>No Users found</h2>
                    </div>
                  @endif
                </table>
              </div>
        </div>
    </div>
</main>
@endsection