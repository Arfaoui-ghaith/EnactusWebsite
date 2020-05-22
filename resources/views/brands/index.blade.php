@extends('layouts.app', ['activePage' => 'smartphone-management', 'titlePage' => __('brand Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">brand</h4>
            <p class="card-category"> you can manage the brands here.</p>
          </div>
          <div class="card-body">
            @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
            <div class="col-12 text-right">
                    <a href="{{ route('brand.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Brand') }}</a>
                  </div>
                </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Model
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                  <tr>
                    <td>
                      {{ $brand->id }}
                    </td>
                    <td>
                      <img src="{{ $brand->image }}" class="w-100 rounded" style="max-width:100px"/>
                    </td>
                    <td>
                      {{ $brand->name }}
                    </td>
                    <td class="td-actions text-right">
                        <form action="{{ route('brand.destroy', $brand) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('brand.edit', $brand) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this brand?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                    </td>
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