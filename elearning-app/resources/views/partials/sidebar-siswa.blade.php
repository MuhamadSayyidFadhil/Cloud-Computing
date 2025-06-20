<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Elearning Submission</span>
    </a>

    <div class="sidebar">
        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>
        @endauth

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.siswa') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if(auth()->user()->role === 'siswa')
                    <li class="nav-item">
                        <a href="{{ route('siswa.profil') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a href="{{ route('siswa.tugas') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Lihat Tugas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('siswa.nilai') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Lihat Nilai</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>