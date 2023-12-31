<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="https://www.creative-tim.com" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{ asset('assets/img/gameverse.png') }}">
      </div>
    </a>
    <a href="{{url('/')}}" class="simple-text logo-normal">
      Game Verse      
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li>
        <a href="{{url('/')}}">
          <i class="nc-icon nc-shop"></i>
          <p>Home</p>
        </a>
      </li>
      @role('admin')
      <li class="{{request()->is('dashboard') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li>
      @endrole
      <li class="{{request()->is('list-articles') || request()->is('list-articles/*') ? 'active' : ''}}">
        <a href="{{route('list-articles')}}">
          <i class="nc-icon nc-paper"></i>
          <p>Articles</p>
        </a>
      </li>
      @role('admin')
      <li class="{{request()->is('categories') || request()->is('categories/*') ? 'active' : ''}}">
        <a href="{{route('categories.index')}}">
          <i class="nc-icon nc-tile-56"></i>
          <p>Categories</p>
        </a>
      </li>
      @endrole
    </ul>
  </div>
</div>