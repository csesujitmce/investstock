<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')

    @Include('mainsite.layout.header')

</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @Include('mainsite.layout.header-indiside-body')

        @Include('mainsite.layout.side-menu')
        
        <!--begin::App Main-->
        <main class="app-main">        
            @yield('main-content')
                {{-- Main Content Write here --}}
        </main>
        <!--end::App Main-->

        @Include('mainsite.layout.footer')
    </div>
    <!--end::App Wrapper-->

    @Include('mainsite.layout.script')

    @stack('script')
    {{-- Include page script file --}}

    @yield('js-content')
        {{-- Java Script and script mention here --}}

</body>
</html>