<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="#" alt="User Image">
    </div>
    <ul class="app-menu">
      <li><a class="app-menu__item active" href="{{route('doctor.dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
  
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-stethoscope"></i><span class="app-menu__label">Patient</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{route('doctor.patient-list')}}" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Patient List</a></li>
        </ul>
      </li>
  
      <li><a class="app-menu__item active" href="{{route('doctor.prescription-list')}}"><i class="app-menu__icon fa fa-user-md"></i><span class="app-menu__label">Prescription </span></a></li>
  
      <li class="treeview {{ (request()->is('doctor/appointment')) ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pencil-square-o"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item {{ (request()->is('doctor/appointment')) ? 'active' : '' }}" href="{{route('doctor.appointment')}}"><i class="icon fa fa-circle-o"></i>Manage</a></li>
        </ul>
      </li>

    </ul>
  </aside>