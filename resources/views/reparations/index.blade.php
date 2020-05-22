@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Smartphones Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
  
    <div class="row">
      
      <div class="col-md-12">
      
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">{{ $smartphone->name }}</h4>
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
                    <a href="/CreateReparation/{{ $smartphone->id }}" class="btn btn-sm btn-primary">{{ __('Add New Model') }}</a>
                  </div>
                  <div class="col-12 text-right">
                    <a href="{{ route('brand.show', $smartphone->brand) }}" class="btn btn-sm btn-primary">{{ __('Back to List') }}</a>
                  </div>
                </div>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    price
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach($reparations as $reparation)
                  @if($reparation->model_id == $smartphone->id)
                  <tr>
                    <td>
                      {{ $reparation->id }}
                    </td>
                    <td>
                    {{ $reparation->title }}
                    </td>
                    <td>
                    {{ $reparation->prix }}
                    </td>
                    <td class="td-actions text-right">
                    <form action="{{ route('Reparation.destroy', $reparation->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('Reparation.edit', $reparation->id) }}" data-original-title="" title="">
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