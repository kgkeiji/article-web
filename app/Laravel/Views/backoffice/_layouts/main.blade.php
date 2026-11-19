<!DOCTYPE html>
<html lang="en">

<head>
    @include('backoffice._components.metas')
    @include('backoffice._components.styles')
    @yield('page-styles')
</head>

<body class="bg-body-tertiary d-flex flex-column vh-100 overflow-hidden">

    @include('backoffice._components.topbar')

    <div class="d-flex flex-grow-1 overflow-hidden">
        @include('backoffice._components.sidebar')

        <div class="flex-grow-1 d-flex flex-column overflow-y-auto" style="min-width: 0;">
            @include('backoffice._components.notifications')
            @yield('content')
            @include('backoffice._components.footer')
        </div>
    </div>

    @include('backoffice._components.scripts')
    @yield('page-scripts')

</body>

</html>
