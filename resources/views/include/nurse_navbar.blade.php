
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$language = session()->get('lang');

@endphp

<nav class="mt-2">
        
        @if(Auth::user()->status == 1)
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview {{ $prefix == '/gig' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-business-time"></i>
              <p style="color: #ffffff">
                {{ $language == 'finish' ? 'Työvuorot' : 'Manage Apply Gigs'}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gig.pending')}}" class="nav-link {{ $route == 'gig.pending' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p title="{{ $language == 'finish' ? 'Vahvistamattomat työvuorot' : ''}}">{{ $language == 'finish' ? 'Vahvistamattomat työ..' : 'Pending Gigs'}}</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gig.approve')}}" class="nav-link {{ $route == 'gig.approve' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{ $language == 'finish' ? 'Vahvistetut vuorot' : 'View Approve Gigs'}}</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('gig.reject')}}" class="nav-link {{ $route == 'gig.reject' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ $language == 'finish' ? 'Hylätyt vyorot' : 'View Reject Gigs'}}</p>
                </a>
              </li>
            </ul>
          </li>

          

          
            </ul>
            @endif

          </li></ul>
      </nav>