<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <img src="{{ asset('material') }}/img/MY REPAIR.png" style="width: 140px; height: 60px;"  alt="..."/>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Users managment') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item {{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'Samsung' || $activePage == 'Apple' || $activePage == 'Huawei' || $activePage == 'Sony' || $activePage == 'Htc'  || $activePage == 'Nokia'  || $activePage == 'Lenovo'  || $activePage == 'Evertek'  || $activePage == 'Alcatel'  || $activePage == 'Blackberry'  || $activePage == 'Lg') ? ' active' : '' }}">
      <a class="nav-link collapsed" data-toggle="collapse" href="#smartphones" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/smartphone.svg"></i>
          <p>{{ __('Smart Phones') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="smartphones">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'smartphone-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('brand.index') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Brands Management') }}</p>
              </a>
            </li>
            @foreach($brandsmenu as $brand)
            <li class="nav-item{{ $activePage == '$brand->name' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('brand.show', $brand) }}">
                <span class="sidebar-normal"><img style="width:140px;padding-left:45px" src="{{ $brand->image }}"></span>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'Android' || $activePage == 'IpadApple' ) ? ' active' : '' }}">
      <a class="nav-link collapsed" data-toggle="collapse" href="#ipads" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/ipad.svg"></i>
          <p>{{ __('Tablettes') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="ipads">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'tablette-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('BrandTab.index') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Brands Management') }}</p>
              </a>
            </li>
            @foreach($brandstabmenu as $brandtab)
            <li class="nav-item{{ $activePage == '$brand->name' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('BrandTab.show', $brandtab) }}">
                <span class="sidebar-normal"><img style="width:140px;padding-left:45px" src="{{ $brandtab->image }}"></span>
              </a>
            </li>
            @endforeach
      
          </ul>
        </div>
      </li>
      <li class="nav-item {{ ($activePage == 'Android' || $activePage == 'IpadApple' ) ? ' active' : '' }}">
      <a class="nav-link collapsed" data-toggle="collapse" href="#pc" aria-expanded="false">
          <i><img style="width:25px" src="{{ asset('material') }}/img/pc.svg"></i>
          <p>{{ __('Computers') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="pc">
          <ul class="nav">
          <li class="nav-item{{ $activePage == 'computer-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('BrandComputer.index') }}">
              <i class="material-icons">library_books</i>
              <p>{{ __('Brands Management') }}</p>
              </a>
          </li>
          @foreach($brandscompmenu as $brandcomp)
            <li class="nav-item{{ $activePage == '$brandcomp->name' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('BrandComputer.show', $brandcomp) }}">
                <span class="sidebar-normal"><img style="width:140px;padding-left:45px" src="{{ $brandcomp->image }}"></span>
              </a>
            </li>
            @endforeach
            
      
          </ul>
        </div>
      </li>
      <li class="nav-item">
      <a class="nav-link text-white bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="material-icons text-white">exit_to_app</i>
          <p>{{ __('Log out') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>