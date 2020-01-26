@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Projects Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Projects</h4>
            <p class="card-category"> you can manage the club projects here.</p>
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
                    <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">{{ __('Add project') }}</a>
                  </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Title
                  </th>
                  <th>
                    Creation Date
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach($projects as $project)
                  <tr>
                    <td>
                      {{ $project->id }}
                    </td>
                    <td>
                      <img src="{{ $project->image }}" class="w-100 rounded" style="max-width:80px"/>
                    </td>
                    <td>
                      {{ $project->title }}
                    </td>
                    <td>
                      {{ $project->created_at->format('Y-m-d') ?? 'none' }}
                    </td>
                    <td class="td-actions text-right">
                        <form action="{{ route('project.destroy', $project) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('project.edit', $project) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this member?") }}') ? this.parentElement.submit() : ''">
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