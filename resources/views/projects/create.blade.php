@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Projects Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('project.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Project') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Frist Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('first_title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('first_title') ? ' is-invalid' : '' }}" name="first_title" id="input-first_title" type="text"  value="{{ old('first_title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('first_title'))
                        <span id="first_title-error" class="error text-danger" for="input-first_title">{{ $errors->first('first_title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text"  value="{{ old('title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description"  value="{{ old('description') }}" required="true" rows="6" aria-required="true"/></textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Goals achieved ') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('goals') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('goals') ? ' is-invalid' : '' }}" name="goals" id="input-goals"  value="{{ old('goals') }}" required="true" rows="6" aria-required="true"/></textarea>
                      @if ($errors->has('goals'))
                        <span id="goals-error" class="error text-danger" for="input-goals">{{ $errors->first('goals') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="input-image" type="text" value="{{ old('image') }}"  aria-required="true"/>
                      @if ($errors->has('image'))
                        <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Project') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection