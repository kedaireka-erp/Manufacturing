<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item px-0">
            <a class="nav-link px-4 mb-2 py-2 {{ Request::is('dashboard') ? 'nav-link--active' : ''  }}" href="/dashboard"
                aria-expanded="false" aria-controls="general-pages">
                <h2 class="menu-title text-white mb-0">Dashboard</h2>
                {{-- <i class="menu-arrow text-transparent"></i> --}}
                <i class="mdi mdi-chart-line text-white ms-auto"></i>
            </a>
            {{-- <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('lead*') ? 'sub-menu--active' : ''  }}" href="/leads">
                            @if (Request::is('lead*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Lead</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('subkon*') ? 'sub-menu--active' : ''  }}" href="/subkons">
                            @if (Request::is('subkon*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Subkon</a>
                    </li>
                </ul>
            </div> --}}
        </li>
        <li class="nav-item px-0">
            <a class="nav-link px-4 mb-2 {{ Request::is('manufactures*','monitoring*','logistic*') ? 'nav-link--active' : ''  }}"  data-bs-toggle="collapse" href="#ui-basic"
                aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Manufaktur</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-outline menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('manufactures*') ? 'sub-menu--active' : ''  }}"  href="/manufactures">
                            @if (Request::is('manufactures*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            FPPP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('logistic*') ? 'sub-menu--active' : ''  }}" href="{{ route("logistic_index") }}">
                            @if (Request::is('logistic*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Surat Jalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('monitoring*') ? 'sub-menu--active' : ''  }}" href="/monitoring">
                            @if (Request::is('monitoring*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Monitoring</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item px-0">
            <a class="nav-link px-4 mb-2 {{ Request::is('lead*','subkon*') ? 'nav-link--active' : ''  }}" data-bs-toggle="collapse" href="#general-pages"
                aria-expanded="false" aria-controls="general-pages">
                <h2 class="menu-title text-white mb-0">Master</h2>
                <i class="menu-arrow text-white"></i>
                <i class="mdi mdi-account-outline menu-icon text-white"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('lead*') ? 'sub-menu--active' : ''  }}" href="/leads">
                            @if (Request::is('lead*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Lead</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('subkon*') ? 'sub-menu--active' : ''  }}" href="/subkons">
                            @if (Request::is('subkon*'))
                            <i class="mdi mdi-radiobox-marked"></i>
                            @else
                            <i class="mdi mdi-radiobox-blank"></i>
                            @endif
                            Subkon</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
