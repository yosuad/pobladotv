@auth
<div class="admin-bar">
    <div class="admin-bar__container">
        <span class="admin-bar__text">
            <i data-lucide="shield-check" class="admin-bar__icon"></i>
            Sesión iniciada como {{ auth()->user()->name }}
        </span>
        <a href="{{ route('admin.dashboard') }}" class="admin-bar__link">
            Ir al panel de administración
            <i data-lucide="arrow-right" class="admin-bar__link-icon"></i>
        </a>
    </div>
</div>
@endauth