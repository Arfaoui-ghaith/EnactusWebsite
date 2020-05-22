@extends('layouts.app', ['activePage' => 'computer', 'titlePage' => __('computer Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('computer.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Computer Model') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('BrandComputer.show', $BrandComputer) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Brand') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('brand_id') ? ' has-danger' : '' }}">
                    <select class="browser-default custom-select form-control form-control-alternative{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" id="input-brand_id" value="" required>
                    <option selected>Click to Open this select menu</option>
                    @foreach ($brandscompmenu as $brand)
                      <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                  </select>
                    @if ($errors->has('brand_id'))
                    <span id="brand_id-error" class="error text-danger" for="input-brand_id">{{ $errors->first('brand_id') }}</span>
                    @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Model Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text"   required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label for="input-image" class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div>
                      <input class="form-control-file" name="image" id="input-image" type="file" required />
                      @if ($errors->has('image'))
                        <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add computer Model') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection