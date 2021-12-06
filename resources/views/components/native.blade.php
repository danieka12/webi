<!DOCTYPE html>
<html lang="en">

@include("components.header")
<body>
    <div id={{isset($id) ? $id : "page"}} class={{isset($withClass) ? 'theia-exception' : null}}>
            @yield("content")
    </div>
</body>

@include("components.script")
@stack("scripts")

</html>