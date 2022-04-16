<div class="bloglist singlepost">
    <h6 class="">Daftar Pengisian Angket (Wajib Diisi)</h6>
    @include('admin.error-form')
    <form action={{ route('course.angket.create') }} method="POST">
        @csrf
        <input type="text" hidden value={{ $courseId }} name="materiId">
        <input type="text" hidden value={{ $guruId }} name="guruId">
        <input type="text" hidden value={{ Auth::guard('siswa')->user()->id }} name="siswaId">
        <input type="text" hidden value={{ $slug }} name="slug">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Kriteria</th>
                    <th scope="col">Pilihan Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Kejelasan Tujuan Pembelajaran</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kejelasanMateri"
                                id="kejelasanMateri1">
                            <label class="form-check-label" for="kejelasanMateri">
                                Jelas
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="kejelasanMateri"
                                id="kejelasanMateri2">
                            <label class="form-check-label" for="kejelasanMateri">
                                Tidak Jelas
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Kelengkapan Materi</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kelengkapanMateri"
                                id="kelengkapanMateri">
                            <label class="form-check-label" for="kelengkapanMateri">
                                Lengkap
                            </label>
                        </div>
                        <div value="off" class="form-check">
                            <input class="form-check-input" type="radio" name="kelengkapanMateri"
                                id="kelengkapanMateri">
                            <label class="form-check-label" for="kelengkapanMateri">
                                Tidak Lengkap
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Contoh Penjelasan Materi</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="contohPenjelasan"
                                id="contohPenjelasan">
                            <label class="form-check-label" for="contohPenjelasan">
                                Jelas
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="contohPenjelasan"
                                id="contohPenjelasan">
                            <label class="form-check-label" for="contohPenjelasan">
                                Tidak Jelas
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Kejelasan Bahasa</td>
                    <td>

                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kejelasanBahasa"
                                id="kejelasanBahasa">
                            <label class="form-check-label" for="kejelasanBahasa">
                                Jelas
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="kejelasanBahasa"
                                id="kejelasanBahasa">
                            <label class="form-check-label" for="kejelasanBahasa">
                                Tidak Jelas
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Kemudahan Pemahaman Materi</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="pemahamanMateri"
                                id="pemahamanMateri">
                            <label class="form-check-label" for="pemahamanMateri">
                                Paham
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="pemahamanMateri"
                                id="pemahamanMateri">
                            <label class="form-check-label" for="pemahamanMateri">
                                Tidak Paham
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Kejelasan Informasi Gambar Maupun Media Video</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kejelasanInformasi"
                                id="kejelasanInformasi">
                            <label class="form-check-label" for="kejelasanInformasi">
                                Mudah
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="kejelasanInformasi"
                                id="kejelasanInformasi">
                            <label class="form-check-label" for="kejelasanInformasi">
                                Tidak Mudah
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Kemudahan Pemakaian</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kemudahanPemakaian"
                                id="kemudahanPemakaian">
                            <label class="form-check-label" for="kemudahanPemakaian">
                                Mudah
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="kemudahanPemakaian"
                                id="kemudahanPemakaian">
                            <label class="form-check-label" for="kemudahanPemakaian">
                                Tidak Mudah
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Penggunaan Media Yang Efektif</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="pengunaanMedia"
                                id="pengunaanMedia">
                            <label class="form-check-label" for="pengunaanMedia">
                                Mudah
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="pengunaanMedia"
                                id="pengunaanMedia">
                            <label class="form-check-label" for="pengunaanMedia">
                                Tidak Mudah
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Keefektifan Media Pembelajaran</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="keektifanMedia"
                                id="keektifanMedia">
                            <label class="form-check-label" for="keektifanMedia">
                                Mudah
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="keektifanMedia"
                                id="keektifanMedia">
                            <label class="form-check-label" for="keektifanMedia">
                                Tidak Mudah
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Kemudahan Interaksi Dengan Media</td>
                    <td>
                        <div class="form-check">
                            <input value="on" class="form-check-input" type="radio" name="kemudahanInteraksi"
                                id="kemudahanInteraksi">
                            <label class="form-check-label" for="kemudahanInteraksi">
                                Mudah
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="off" class="form-check-input" type="radio" name="kemudahanInteraksi"
                                id="kemudahanInteraksi">
                            <label class="form-check-label" for="kemudahanInteraksi">
                                Tidak Mudah
                            </label>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="d-flex align-items-center justify-content-center">
            <button type="submit" class="btn_1 rounded add_bottom_30">Kirim Jawaban Angket</button>
        </div>
    </form>
</div>
