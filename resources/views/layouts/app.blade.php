<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>SIMAHAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('layout.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="layout">
    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <div class="brand">
            <div class="brand">
                 <div class="brand-title fs-4 fw-bold">SIMAHAS</div>
            </div>
        </div>

        <nav class="menu_dashboard">
            <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="menu-item {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Mahasiswa
            </a>
            <a href="{{ route('mata-kuliah.index') }}" class="menu-item {{ request()->routeIs('mata-kuliah.*') ? 'active' : '' }}">
                <i class="bi bi-journal-bookmark-fill"></i> Mata Kuliah
            </a>
            <a href="{{ route('kehadiran.index') }}" class="menu-item {{ request()->routeIs('kehadiran.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check-fill"></i> Kehadiran
            </a>
        </nav>
    </aside>

    {{-- CONTENT --}}
    <main class="content">
        <header class="topbar">
            <button id="toggleSidebar" class="btn btn-light d-lg-none">
                <i class="bi bi-list"></i>
            </button>
            <h4 class="m-0">@yield('title','SIMAHAS')</h4>
            <button id="toggleTheme" class="btn btn-light">
                <i class="bi bi-moon-stars"></i>
            </button>
        </header>

        <div class="content-inner fade-in">
            @yield('content')
        </div>
    </main>
</div>

<script>
/* SWEETALERT FLASH */
@if(session('success'))
Swal.fire({icon:'success',title:'Berhasil',text:'{{ session('success') }}',timer:2000,showConfirmButton:false});
@endif
@if(session('error'))
Swal.fire({icon:'error',title:'Error',text:'{{ session('error') }}'});
@endif

/* CONFIRM DELETE */
document.addEventListener('click', e => {
    if(e.target.hasAttribute('data-confirm-delete')){
        e.preventDefault();
        let form = e.target.closest('form');
        Swal.fire({
            title:'Yakin?',
            text:'Data akan dihapus permanen',
            icon:'warning',
            showCancelButton:true,
            confirmButtonText:'Hapus'
        }).then(r => { if(r.isConfirmed) form.submit(); });
    }
});

/* SIDEBAR TOGGLE */
document.getElementById('toggleSidebar')?.addEventListener('click',()=>{
    document.getElementById('sidebar').classList.toggle('sidebar-open');
});

/* THEME */
const root=document.documentElement;
const key='simahas_theme';
if(localStorage.getItem(key)) root.dataset.theme=localStorage.getItem(key);
document.getElementById('toggleTheme').onclick=()=>{
    let t=root.dataset.theme==='dark'?'light':'dark';
    root.dataset.theme=t; localStorage.setItem(key,t);
};
</script>

</body>
</html>
