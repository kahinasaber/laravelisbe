@extends("admin.layouts.template")
@section('contenu')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Liste des produits</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if(Session::has("message"))
        <div class="alert alert-success">{{ Session::get('message')}}</div>
        @endif

      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Photo1</th>
          <th>Photo2</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>

@forelse ($products as $Product )
<tr>
    <td><img width="100" src="{{ asset('images/products/'.$Product->photo1)}}"></td>
    <td><img width="100" src="{{ asset('images/products/'.$Product->photo2)}}"></td>
    <td>{{$Product->name}}</td>
    <td>{{$Product->description}}</td>
    <td>{{$Product->price}}</td>
    <td>{{$Product->category->name}}</td>
    <td>
        <a href="{{ route('products.edit',$Product->id)}}"><button class="btn btn-success">Modifier</button></a>

        <form class="d-inline"  action="{{route('products.destroy',$Product->id)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" onclick="return confirm('etes vous sur de supprimer ?')" class="btn btn-danger">Delete </button>
        </form>
    </td>
</tr>


@empty
<tr><td colspan="2">No data found</td></tr>

@endforelse

       </tbody>

        <tfoot>
        <tr>
          <th colspan="7"></th>

        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
