<div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">

        <img src="{{asset('assets/img/book.jpg')}}">

        <form id="quickForm" method="POST" action="/createSurat" enctype="multipart/form-data">
            @csrf
            <div class="formbold-form-title">
                <h2 class="">Isi untuk melakukan pengajuan</h2>
                <p>
                    Pastikan data yang di isi lengkap dan benar.
                </p>
            </div>

            <div class="formbold-mb-3 form-alert">
                <label for="nama" class="formbold-form-label">
                    Nama anda
                </label>
                <input type="text" name="namaPengaju" class="formbold-form-input" />
            </div>

            <div class="formbold-input-flex">
                <div class="form-alert">
                    <label for="nik" class="formbold-form-label"> NIK </label>
                    <input type="text" name="nik" class="formbold-form-input" />
                </div>
                <div class="form-alert">
                    <label for="phone" class="formbold-form-label"> No. Telp/WA </label>
                    <input type="text" name="wa" class="formbold-form-input" />
                </div>
            </div>

            <div class="formbold-mb-3 form-alert">
                <label for="email" class="formbold-form-label">
                    Email
                </label>
                <input type="email" name="email" class="formbold-form-input" />
            </div>

            <div class="formbold-mb-3 form-alert">
                <label for="kategori" class="formbold-form-label">
                    Pilih jenis dokumen yang diajukan
                </label>
                <select class="formbold-form-input" name="kategoriSurat">
                    <option selected disabled hidden >Silahkan pilih tipe dokumen</option>
                    @foreach($kategoris as $k)
                    <option value="{{$k->kategoriSurat}}">{{$k->kategoriSurat}}</option>
                    @endforeach
                </select>
            </div>

            <div class="formbold-mb-3 form-alert">
                <label for="detail" class="formbold-form-label">
                    Detail ajuan
                </label>
                <textarea name="detailAjuan" class="formbold-form-input" rows="3" placeholder="Jelaskan secara detail alasan anda mengajukan dokumen ini...."></textarea>
            </div>

            <div class="formbold-mb-3 form-alert">
                <label for="email" class="formbold-form-label">
                    Upload file/foto KTP
                </label>
                <input type="file" name="ktpPic" class="formbold-form-input" />
            </div>

            <div class="formbold-checkbox-wrapper form-alert">
                <label for="supportCheckbox" class="formbold-checkbox-label">
                    <div class="formbold-relative">
                        <input type="checkbox" name="terms" id="supportCheckbox" class="formbold-input-checkbox" />
                        <div class="formbold-checkbox-inner">
                            <span class="formbold-opacity-0">
                                <svg width="11" height="8" viewBox="0 0 11 8" fill="none" class="formbold-stroke-current">
                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" stroke-width="0.4"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                    Saya menyatakan bahwa data yang saya isi benar adanya
                </label>
            </div>

            <button class="formbold-btn">Daftarkan ajuan</button>
        </form>
    </div>
</div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
    }

    .formbold-mb-3 {
        margin-bottom: 15px;
    }

    .formbold-relative {
        position: relative;
    }

    .formbold-opacity-0 {
        opacity: 0;
    }

    .formbold-stroke-current {
        stroke: black;
    }

    #supportCheckbox:checked~div span {
        opacity: 1;
    }

    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
        background-image: url("assets/img/form_background.jpg");
        background-size: cover;
    }

    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 570px;
        width: 100%;
        background: white;
        padding: 40px;
    }

    .formbold-form-wrapper img {
        width: 100%;
    }

    .formbold-img {
        margin-bottom: 45px;
    }

    .formbold-form-title {
        margin-bottom: 30px;
    }

    .formbold-form-title h2 {
        font-weight: 600;
        font-size: 28px;
        line-height: 34px;
        color: #07074d;
    }

    .formbold-form-title p {
        font-size: 16px;
        line-height: 24px;
        color: #536387;
        margin-top: 12px;
    }

    .formbold-input-flex {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .formbold-input-flex>div {
        width: 50%;
    }

    .formbold-form-input {
        text-align: center;
        width: 100%;
        padding: 13px 22px;
        border-radius: 5px;
        border: 1px solid #dde3ec;
        background: #ffffff;
        font-weight: 500;
        font-size: 16px;
        color: #536387;
        outline: none;
        resize: none;
    }

    .formbold-form-input:focus {
        border-color: #6a64f1;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-form-label {
        color: black;
        font-size: 14px;
        line-height: 24px;
        display: block;
        margin-bottom: 10px;
    }

    .formbold-checkbox-label {
        display: flex;
        cursor: pointer;
        user-select: none;
        font-size: 16px;
        line-height: 24px;
        color: #536387;
    }

    .formbold-checkbox-label a {
        margin-left: 5px;
        color: #6a64f1;
    }

    .formbold-input-checkbox {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    .formbold-checkbox-inner {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        margin-right: 16px;
        margin-top: 2px;
        border: 0.7px solid #dde3ec;
        border-radius: 3px;
    }

    .formbold-btn {
        font-size: 16px;
        border-radius: 5px;
        padding: 14px 25px;
        border: none;
        font-weight: 500;
        background-color: #6a64f1;
        color: white;
        cursor: pointer;
        margin-top: 25px;
        width: 100%;
    }

    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .invalid-feedback {
        color: red;
    }

    .is-invalid {
        border-color: red;
    }
</style>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    $(function() {
        $('#quickForm').validate({
            rules: {
                namaPengaju: {
                    required: true,
                },
                nik: {
                    required: true,
                    digits: true,
                },
                wa: {
                    required: true,
                    digits: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                kategoriSurat: {
                    required: true,
                },
                detailAjuan: {
                    required: true,
                },
                ktpPic: {
                    required: true,
                },
                terms: {
                    required: true
                },
            },
            messages: {
                namaPengaju: {
                    required: "Nama wajib diisi.",
                },
                nik: {
                    required: "NIK wajib diisi.",
                    digits: "NIK hanya boleh berisi angka."
                },
                wa: {
                    required: "No. Whatsapp wajib diisi.",
                    digits: "No. WA hanya boleh berisi angka."
                },
                kategoriSurat: {
                    required: "Wajib memilih tipe dokumen ajuan",
                },
                detailAjuan: {
                    required: "Detail wajib diisi",
                },
                ktpPic: {
                    required: "Wajib mengupload foto KTP",
                },
                email: {
                    required: "Email wajib diisi.",
                    email: "Value harus berupa email."
                },
                terms: "Centang bila sudah yakin dan setuju"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-alert').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>