@include('components.courseDetail.description', ['description' => $content])
@include('components.courseDetail.teachers', ["teacherName" => $guru['name'], 'field' => $guru['field']])

