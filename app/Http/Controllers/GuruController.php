<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmationStudent;
use App\Http\Requests\TeacherProfileUpdate;
use App\Models\GabungMateri;
use App\Models\Guru as ModelsGuru;
use App\Models\Materi;
use App\Models\Penulis;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    private $locationImage = "images/upload";


    public function index()
    {
        return view('home.index');
    }

    private function month(String $teacherId)
    {
        $period = now()->subMonths(12)->monthsUntil(now());
        $data = [];
        foreach ($period as $date) {
            $totalMateriTaken = GabungMateri::where("guru_id", $teacherId)->where('konfirmasi_gabung', true)->whereYear('created_at', '=', $date->year)->whereMonth('created_at', '=', $date->month)->get()->toArray();
            $uniqueTotalMateriToken = empty($totalMateriTaken) ? 0 : count(array_unique(array_column($totalMateriTaken, 'siswa_id')));


            $data[] = [
                'month' => $date->shortMonthName,
                'year' => $date->year,
                'totalStudent' => $uniqueTotalMateriToken,
            ];
        }

        return $data;
    }

    public function dashboard()
    {
        $teacherId = Auth::guard('guru')->user()->id;
        $writerId = Penulis::where('guru_id', $teacherId)->firstOrFail()->id;
        $sizeOfNewConfirm = GabungMateri::query()->where("konfirmasi_gabung", 0)->get();
        $totalMateri = count(Materi::query()->where('penulis_id', $writerId)->get());
        $notConfirm = count(GabungMateri::where("guru_id", $teacherId)->where('konfirmasi_gabung', true)->get());
        $confirm = count(GabungMateri::where("guru_id", $teacherId)->where('konfirmasi_gabung', false)->get());
        $totalMateriTaken = GabungMateri::where("guru_id", $teacherId)->where('konfirmasi_gabung', true)->get()->toArray();
        $uniqueTotalMateriToken = empty($totalMateriTaken) ? 0 : count(array_unique(array_column($totalMateriTaken, 'siswa_id')));

        $statistic = $this->month($teacherId);
        $stat = [
            'labels' => collect($statistic)->map(function ($item) {
                return $item['month'] . " " . $item['year'];
            }),
            'value' => collect($statistic)->map(function ($item) {
                return $item['totalStudent'];
            })
        ];

        return view('admin.dashboard')->with(['sizeConfirm' => count($sizeOfNewConfirm), 'totalMateri' => $totalMateri, 'notConfirm' => $notConfirm, 'confirm' => $confirm, 'totalMateriTaken' => $uniqueTotalMateriToken, 'stat' => $stat]);
    }


    private function href(string $prefix, string $slug, bool $withId = false, string $id = null)
    {
        if ($withId) {
            return $prefix . Str::slug($slug) . "." . $id;
        }

        return $prefix . Str::slug($slug);
    }

    private function imageHandler(?string $path)
    {
        if (isset($path)) {
            $img = Image::make(public_path() . "/" . $path);
            return [
                'name' => explode("/", $path)[2],
                'size' => $img->filesize(),
                'type' => $img->mime,
            ];
        }
    }

    private function transformDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function confirmStudent()
    {
        $teacherId = Auth::guard("guru")->user()->id;
        $confirmStudents = GabungMateri::query()->with([
            "materi.opsiMateri",
            "materi.materiCoverGambar",
            "siswa"
        ])->where("guru_id", $teacherId)->orderBy("konfirmasi_gabung", "asc")->get();
        return view("admin.confirm-student")->with(['confirmStudents' => collect($confirmStudents)->map(function ($confirmStudent) {
            return [
                'id' => $confirmStudent->id,
                'title' => $confirmStudent->siswa->name,
                'cover' =>  $confirmStudent->materi->materiCoverGambar->cover,
                'nis' => $confirmStudent->siswa->nis,
                'joinDate' => $this->transformDate($confirmStudent->createdAt),
                'category' => $confirmStudent->materi->opsiMateri->judul,
                'course' => [
                    'title' => $confirmStudent->materi->judul,
                    'description' => $confirmStudent->materi->konten
                ],
                'hasConfirm' =>  $confirmStudent['konfirmasi_gabung']
            ];
        })]);
    }

    public function confirmation(ConfirmationStudent $request)
    {
        $confirmation = $request->validated();
        $student = Siswa::query()->where('nis', $confirmation['studentId'])->firstOrFail();
        $confirmationStudent = GabungMateri::query()->where('id', $confirmation['courseId'])->where('siswa_id', $student->id)->firstOrFail();

        // TODO:: update confirmationStudent
        $confirmationStudent['konfirmasi_gabung'] = true;
        $confirmationStudent->save();
        return redirect()->route("guru.confirmStudent")->with(['msg' => "Siswa berhasil disetujui"]);
    }

    public function listCourse()
    {
        $teacherId = Auth::guard("guru")->user()->id;
        $writerCourse = Penulis::query()->where("guru_id", $teacherId)->first();
        $course = Materi::query()->where("penulis_id", $writerCourse->id)->with(["penulis", "materiCoverGambar"])->orderBy("created_at", "desc")->get();
        return view('admin.course')->with(['courses' => collect($course)->map(function ($course) {
            return [
                'id' => $course->id,
                'title' => $course->judul,
                'dateTime' => $this->transformDate($course->createdAt),
                'cover' => $course->materiCoverGambar->cover,
                'description' => $course->konten,
                'duration' => $course->durasi
            ];
        })]);
    }

    public function show()
    {
        $teacherId = Auth::guard('guru')->user()->id;
        $teacherModel = ModelsGuru::query()->with('penulis')->where('id', $teacherId)->firstOrFail();
        $image = $this->imageHandler($teacherModel->penulis['foto_profile']);
        $dataTransform = [
            'id' =>  $teacherId,
            'name' => $teacherModel->name,
            'email' => $teacherModel->email,
            'description' => $teacherModel->penulis->description,
            'image' => [
                'name' => $image['name'] ?? "",
                'size' => $image['size'] ?? "",
                'type' => $image['type'] ?? "",
                'coverUrl' => $teacherModel->penulis['foto_profile'] ?? ""
            ],
        ];
        return view('admin.teacher')->with(['data' => $dataTransform]);
    }

    public function update(TeacherProfileUpdate $request)
    {
        $teacher = $request->validated();
        $teacherId = Auth::guard('guru')->user()->id;
        $teacherModel = ModelsGuru::query()->where('id', $teacherId)->firstOrFail();
        $writer = Penulis::query()->where('guru_id', $teacherId)->firstOrFail();

        // TODO:: Update teacher model
        $teacherModel->name = $teacher['name'];
        $teacherModel->email = $teacher['email'];
        if (!empty($teacher['password']))  $teacherModel->password = $teacher['password'];
        $teacherModel->save();

        // TODO:: Update writer
        $writer['foto_profile'] = $this->locationImage  . "/" . $teacher['image'];
        $writer['description'] = $teacher['description'];
        $writer->save();

        return redirect()->action([GuruController::class, 'show']);
    }

    public function detail(string $id)
    {
        $teacher = ModelsGuru::findOrFail($id);
        $writer = Penulis::query()->where('guru_id', $teacher->id)->firstOrFail();
        $teacherJoined = GabungMateri::query()->where('guru_id', $teacher->id)->where('konfirmasi_gabung', true)->get();
        $course = Materi::query()->with('opsiMateri')->where('penulis_id', $writer->id)->get();
        return view('teacher-detail')->with([
            'profil' => [
                'teacherName' => $teacher->name,
                'siswaJoin' => count($teacherJoined),
                'courses' => count($course),
                'teacherProfile' => $writer['foto_profile'],
            ],
            'meta' => [
                'description' => $writer['description'],
                'listCourses' => collect($course)->map(function ($c) {
                    return [
                        'id' => $c->id,
                        'category' => $c['opsiMateri']['judul'],
                        'title' => $c->judul,
                        'href' => $this->href('materi/detail/', $c['judul'], true, $c['id'])
                    ];
                })
            ]
        ]);
    }
}
