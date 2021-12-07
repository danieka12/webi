@include('components.courseDetail.description', ['description' => $content])
@include('components.courseDetail.lessons')
@include('components.courseDetail.teachers', ["teacherName" => $guru['name']])

