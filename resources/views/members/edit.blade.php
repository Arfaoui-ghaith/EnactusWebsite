@extends('layouts.app', ['activePage' => 'member', 'titlePage' => __('Members Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('member.update', $member) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Member') }}</h4>
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ $member->name }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" id="input-role" type="text" placeholder="{{ __('Role') }}" value="{{ $member->role }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="role-error" class="error text-danger" for="input-role">{{ $errors->first('role') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="input-image" type="text" placeholder="{{ __('Image') }}" value="{{ $member->image }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


               <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('description') }}" value="{{ $member->description }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" id="input-facebook" type="text" placeholder="{{ __('facebook') }}" value="{{ $member->facebook }}"  aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" id="input-instagram" type="text" placeholder="{{ __('instagram') }}" value="{{ $member->instagram }}"  aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('gmail') ? ' is-invalid' : '' }}" name="gmail" id="input-gmail" type="text" placeholder="{{ __('gmail') }}" value="{{ $member->gmail }}"  aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="gmail-error" class="error text-danger" for="input-gmail">{{ $errors->first('gmail') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


              </div>


              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection