<!DOCTYPE html>
<html lang="en">


@include("components.header")

<body>
    @yield("content")
</body>

@include("components.script")
@stack("scripts")

</html>