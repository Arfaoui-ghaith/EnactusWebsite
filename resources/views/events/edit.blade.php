@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Events Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('event.update', $event) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Event') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>




                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text"  value="{{ $event->title }}" required="true" aria-required="true"/>
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
                      <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description"   value="{{ $event->description }}" maxlength="255"  rows="6" aria-required="true"/>{{ $event->description }}</textarea>
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                    <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Date Event') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                      <input class=" datepicker-here form-control{{ $errors->has('date') ? ' is-invalid' : '' }} " data-language='en' data-multiple-dates="3" data-multiple-dates-separator=", " data-timepicker="true" data-position='top left' name="date" id="input-date" type="text"   value="{{ $event->date }}" aria-required="true"/>
                      @if ($errors->has('date'))
                        <span id="date-error" class="error text-danger" for="input-date">{{ $errors->first('date') }}</span>
                      @endif
                    </div>
                  </div>
                </div>



                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" id="input-image" type="text" value="{{ $event->image }}"  aria-required="true"/>
                      @if ($errors->has('image'))
                        <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Lien Formulaire') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('lien_formulaire') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('lien_formulaire') ? ' is-invalid' : '' }}" name="lien_formulaire" id="input-lien_formulaire" type="text" value="{{ $event->lien_formulaire }}"  aria-required="true"/>
                      @if ($errors->has('lien_formulaire'))
                        <span id="lien_formulaire-error" class="error text-danger" for="input-lien_formulaire">{{ $errors->first('lien_formulaire') }}</span>
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