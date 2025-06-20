<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Elearning Submission</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.guru') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(auth()->check() && auth()->user()->role === 'guru')
                    <li class="nav-item">
                        <a href="{{ route('guru.profil') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                @endif
                @if(auth()->check() && auth()->user()->role === 'guru')
                    <li class="nav-item">
                        <a href="{{ route('tugas.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Penugasan Siswa</p>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->role === 'guru')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-check"></i>
                            <p>
                                Penilaian
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @php
                                $tugasList = \App\Models\Tugas::where('guru_id', auth()->id())->get();
                            @endphp

                            @forelse($tugasList as $tugas)
                                <li class="nav-item">
                                    <a href="{{ route('penilaian.show', $tugas->id) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ $tugas->judul }}</p>
                                    </a>
                                </li>
                            @empty
                                <li class="nav-item">
                                    <span class="nav-link text-muted">Belum ada tugas</span>
                                </li>
                            @endforelse
                        </ul>
                    </li>
                @endif


            </ul>
        </nav>

    </div>
</aside>