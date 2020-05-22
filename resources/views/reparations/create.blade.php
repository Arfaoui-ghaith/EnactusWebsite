@extends('layouts.app', ['activePage' => 'Reparation', 'titlePage' => __('Reparation Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('Reparation.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
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
                      <a href="/IndexReparation/{{ $smartphone->id }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>


                <div class="row">
                  
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('model_id') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('model_id') ? ' is-invalid' : '' }}" name="model_id" id="input-model_id" type="hidden" value="{{ $smartphone->id }}"  required="true" aria-required="true"/>
                      @if ($errors->has('model_id'))
                        <span id="model_id-error" class="error text-danger" for="input-model_id">{{ $errors->first('model_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text"   required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text"   />
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Symptomes') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('symptomes') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('symptomes') ? ' is-invalid' : '' }}" name="symptomes" id="input-symptomes" type="text"   />
                      @if ($errors->has('symptomes'))
                        <span id="symptomes-error" class="error text-danger" for="input-symptomes">{{ $errors->first('symptomes') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Garantie') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('garantie') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('garantie') ? ' is-invalid' : '' }}" name="garantie" id="input-garantie" type="text"  />
                      @if ($errors->has('garantie'))
                        <span id="garantie-error" class="error text-danger" for="input-garantie">{{ $errors->first('garantie') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Temps Reparation') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('temps_reparation') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('temps_reparation') ? ' is-invalid' : '' }}" name="temps_reparation" id="input-temps_reparation" type="text"   />
                      @if ($errors->has('temps_reparation'))
                        <span id="temps_reparation-error" class="error text-danger" for="input-temps_reparation">{{ $errors->first('temps_reparation') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-7">
                    <div class="{{ $errors->has('prix') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('prix') ? ' is-invalid' : '' }}" name="prix" id="input-prix" type="text"   />
                      @if ($errors->has('prix'))
                        <span id="prix-error" class="error text-danger" for="input-prix">{{ $errors->first('prix') }}</span>
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