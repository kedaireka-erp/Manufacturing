<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item px-0">
            <a class="nav-link px-4 mb-2" onclick="navClick(this)" data-bs-toggle="collapse" href="#ui-basic"
                aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Manufaktur</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder-outline menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" onclick="subMenuClick(this)" href="#">
                            <i class="mdi mdi-radiobox-blank"></i>FPPP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="subMenuClick(this)" href="#">
                            <i class="mdi mdi-radiobox-blank"></i>Surat Jalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="subMenuClick(this)" href="#">
                            <i class="mdi mdi-radiobox-blank"></i>Monitoring</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item px-0">
            <a class="nav-link px-4 mb-2" onclick="navClick(this)" data-bs-toggle="collapse" href="#general-pages"
                aria-expanded="false" aria-controls="general-pages">
                <h2 class="menu-title text-white mb-0">Master</h2>
                <i class="menu-arrow text-white"></i>
                <i class="mdi mdi-account-outline menu-icon text-white"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" onclick="subMenuClick(this)" href="/leads">
                            <i class="mdi mdi-radiobox-blank"></i>Lead</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="subMenuClick(this)" href="/subkons">
                            <i class="mdi mdi-radiobox-blank"></i>Subkon</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
