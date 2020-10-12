
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        

           @if(Auth::user()->userType == 'admin')
          <li class="nav-item has-treeview {{ $prefix == '/user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p style="color: #ffffff">
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.view')}}" class="nav-link {{ $route == 'user.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          <li class="nav-item has-treeview {{ $prefix == '/profile' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-medkit"></i>
              <p style="color: #ffffff">
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.view')}}" class="nav-link {{ $route == 'profile.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview {{ $prefix == '/doctor' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-md"></i>
              <p style="color: #ffffff">
                Manage Doctor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctor.view')}}" class="nav-link {{ $route == 'doctor.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctor List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctor.create')}}" class="nav-link {{ $route == 'doctor.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Doctor</p>
                </a>
              </li>
            </ul>
          </li>

             <li class="nav-item has-treeview {{ $prefix == '/patient' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wheelchair"></i>
              <p style="color: #ffffff">
                Manage Patient
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('patient.view')}}" class="nav-link {{ $route == 'patient.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Patient List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('patient.create')}}" class="nav-link {{ $route == 'patient.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Patient</p>
                </a>
              </li>
            </ul>
          </li>

         

          <li class="nav-item has-treeview {{ $prefix == '/invoice' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-h-square"></i>
              <p style="color: #ffffff">
                Manage Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.view')}}" class="nav-link {{ $route == 'invoice.view' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice List</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('invoice.create')}}" class="nav-link {{ $route == 'invoice.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Invoice</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('service.create')}}" class="nav-link {{ $route == 'service.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Test</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ $prefix == '/setting' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-h-square"></i>
              <p style="color: #ffffff">
                Manage Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('setting.create')}}" class="nav-link {{ $route == 'setting.create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
            </ul>
          </li>
     



          
            </ul>
          </li></ul>
      </nav>