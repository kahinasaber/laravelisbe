@extends("admin.layouts.template")

@section('contenu')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">liste des categories</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- afficher le message de succes -->
        @if(Session::has("message"))
        <div class="alert alert-success">{{session::get('message')}}</div>
        @endif
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>name</th>
          <th>actin</th>

        </tr>
        </thead>
        <tbody>
    @forelse ($categories as $category )
    <tr>
        <td>{{$category->name}}</td>
        <td>

           <a href="{{route('categories.edit', $category->id)}}"><button class="btn btn-success">modifier</button></a>

            <form class="d-inline" action="{{route('categories.destroy',$category->id) }}"method="post">
            @csrf
            @method("DELETE")
            <button type="submit" onclick="return confirm('etes vous sure de supprimer?')" class="btn btn-danger">Delete</button>
            ></form>
        </td>
    </tr>

    @empty
    <tr><td colspan="2">No date found </td></tr>

    @endforelse

        </tbody>
        <tfoot>
        <tr>

            <th>name</th>
          <th>action</th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
