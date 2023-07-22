<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="#" alt="User Image">
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item active" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
  
      <li class="treeview
      {{ (request()->is('doctor/add')) ? 'is-expanded' : '' }}
        {{ (request()->is('doctor/view')) ? 'is-expanded' : '' }}
      "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-stethoscope"></i><span class="app-menu__label">Doctor</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item {{ (request()->is('doctor/add')) ? 'active' : '' }}" href="{{route('doctor.add')}}" rel="noopener"><i class="icon fa fa-circle-o"></i> Add Doctor</a></li>
          <li><a class="treeview-item {{ (request()->is('doctor/view')) ? 'active' : '' }}" href="{{route('doctor.view')}}" rel="noopener"><i class="icon fa fa-circle-o"></i> View Doctor</a></li>
        </ul>
      </li>
  
      <li><a class="app-menu__item active" href="{{route('department.index')}}"><i class="app-menu__icon fa fa-wheelchair"></i><span class="app-menu__label">Department</span></a></li>
  
      {{-- <li><a class="app-menu__item active" href="{{route('nurse-list')}}"><i class="app-menu__icon fa fa-user-md"></i><span class="app-menu__label">Nurse</span></a></li> --}}
  
      <li class="treeview
      {{ (request()->is('pending-appointment')) ? 'is-expanded' : '' }}
        {{ (request()->is('all-appointment')) ? 'is-expanded' : '' }}
      "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pencil-square-o"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item {{ (request()->is('pending-appointment')) ? 'active' : '' }}" href="{{route('pending-appointment')}}"><i class="icon fa fa-circle-o"></i>Pending Appointment</a></li>
          <li><a class="treeview-item {{ (request()->is('all-appointment')) ? 'active' : '' }}" href="{{route('all-appointment')}}"><i class="icon fa fa-circle-o"></i>All Appointment</a></li>
        </ul>
      </li>
  
      <li class="treeview
      {{ (request()->is('users/add')) ? 'is-expanded' : '' }}
      {{ (request()->is('users/view')) ? 'is-expanded' : '' }}
      "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu
          ">
            <li><a class="treeview-item {{ (request()->is('users/add')) ? 'active' : '' }}" href="{{route('users.add')}}"><i class="icon fa fa-circle-o"></i>Add User</a></li>
            <li><a class="treeview-item {{ (request()->is('users/view')) ? 'active' : '' }}" href="{{route('users.view')}}"><i class="icon fa fa-circle-o"></i>View User</a></li>
          </ul>
        </li>
        <li class="treeview
      {{ (request()->is('users/add')) ? 'is-expanded' : '' }}
      {{ (request()->is('users/view')) ? 'is-expanded' : '' }}
      "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Telemedicine</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu
          ">
            <li><a class="treeview-item {{ (request()->is('users/add')) ? 'active' : '' }}" href="{{route('telemedicine.create')}}"><i class="icon fa fa-circle-o"></i>Add Telemedicine</a></li>
            <li><a class="treeview-item {{ (request()->is('users/view')) ? 'active' : '' }}" href="{{route('telemedicine.index')}}"><i class="icon fa fa-circle-o"></i>View Telemedicine</a></li>
          </ul>
        </li>
    </ul>
  </aside>