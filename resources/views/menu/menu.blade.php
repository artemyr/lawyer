<nav id="top-menu">
    <ul>
        <li js-service-menu="toggler">
            <a href="{{ route('services') }}">Услуги •••</a>
        </li>
        <li>
            <a href="">Блог</a>
        </li>
        <li>
            <a href="">Контакты</a>
        </li>
        @can('view', auth()->user())
        <li>
            <a href="{{ route('admin','') }}">Admin</a>
        </li>
        @endcan
    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        window.obj_mainMap = new mainMenu({});
    })
</script>
