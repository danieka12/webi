@include('components.courseDetail.description', ['description' => $content])
@include('components.courseDetail.teachers', ["teacherName" => $guru['name'], 'description' => $guru['description'],
'field' => $guru['field'], 'profile' => $guru['profile']])
