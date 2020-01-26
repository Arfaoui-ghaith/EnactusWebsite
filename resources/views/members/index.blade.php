@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Members Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Members</h4>
            <p class="card-category"> Heads Masters Of Enactus Iset Charguia</p>
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
                    <a href="{{ route('member.create') }}" class="btn btn-sm btn-primary">{{ __('Add member') }}</a>
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
                    Name
                  </th>
                  <th>
                    Role
                  </th>
                  <th class="text-right">
                    Action
                  </th>
                </thead>
                <tbody>
                  @foreach($members as $member)
                  <tr>
                    <td>
                      {{ $member->id }}
                    </td>
                    <td>
                      <img src="{{ $member->image }}" class="w-100 rounded-circle" style="max-width:60px"/>
                    </td>
                    <td>
                      {{ $member->name }}
                    </td>
                    <td>
                      {{ $member->role }}
                    </td>
                    <td class="td-actions text-right">
                        <form action="{{ route('member.destroy', $member) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('member.edit', $member) }}" data-original-title="" title="">
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