<!DOCTYPE html>
<html lang="en">

@include("components.header")
<body>
    <div id="page" class={{isset($withClass) ? 'theia-exception' : null}}>
        @include('components.menu')
            @yield("content")
        @include('components.footer')
    </div>
</body>

@include("components.script")
@stack("scripts")

</html>