@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Smartphones Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
  
    <div class="row">
      
      <div class="col-md-12">
      
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">{{ $brand->name }}</h4>
            <p class="card-category"> you can manage the brand models here.</p>
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
                    <a href="/create/{{ $brand->id }}" class="btn btn-sm btn-primary">{{ __('Add New Model') }}</a>
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
                  @foreach($smartphones as $smartphone)
                  @if ( $brand->id == $smartphone->brand_id )
                  <tr>
                    <td>
                      {{ $smartphone->id }}
                    </td>
                    <td>
                      <img src="{{ $smartphone->image }}" class="w-100 rounded" style="max-width:100px"/>
                    </td>
                    <td>
                      <a  href="/IndexReparation/{{ $smartphone->id }}">{{ $smartphone->name }}</a>
                    </td>
                    <td class="td-actions text-right">
                        <form action="{{ route('smartphone.destroy', $smartphone) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('smartphone.edit', $smartphone) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this model?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                    </td>
                  </tr>
                  @endif
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