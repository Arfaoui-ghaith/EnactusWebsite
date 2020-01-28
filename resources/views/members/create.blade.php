@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Members Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('member.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Member') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('member.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role" type="text" placeholder="{{ __('Role') }}" value="{{ old('role') }}" required="true" aria-required="true"/>
                      @if ($errors->has('role'))
                        <span id="role-error" class="error text-danger" for="input-role">{{ $errors->first('role') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label for="input-image" class="col-sm-2 col-form-label">{{ __('Image Input') }}</label>
                  <div class="col-sm-7">
                    <div>
                      <input class="form-control-file" name="image" id="input-image" type="file" required />
                      @if ($errors->has('image'))
                        <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('description') }}" value="{{ old('description') }}" required="true" aria-required="true"/>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Facebook') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" id="input-facebook" type="text" placeholder="{{ __('facebook') }}" value="{{ old('facebook') }}"  aria-required="true"/>
                      @if ($errors->has('facebook'))
                        <span id="facebook-error" class="error text-danger" for="input-facebook">{{ $errors->first('facebook') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Instagram') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('instagram') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" id="input-instagram" type="text" placeholder="{{ __('instagram') }}" value="{{ old('instagram') }}"  aria-required="true"/>
                      @if ($errors->has('instagram'))
                        <span id="instagram-error" class="error text-danger" for="input-instagram">{{ $errors->first('instagram') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Gmail') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('gmail') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('gmail') ? ' is-invalid' : '' }}" name="gmail" id="input-gmail" type="text" placeholder="{{ __('gmail') }}" value="{{ old('gmail') }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="gmail-error" class="error text-danger" for="input-gmail">{{ $errors->first('gmail') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Member') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection