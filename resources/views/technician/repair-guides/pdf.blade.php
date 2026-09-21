<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>
        Panduan Perbaikan DTR #{{ $repairGuide->id }}
    </title>

    <style>
        @page {
            margin: 35px 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1e293b;
            line-height: 1.5;
        }

        h1 {
            font-size: 21px;
            margin: 0;
            color: #0f172a;
        }

        h2 {
            font-size: 14px;
            margin-top: 22px;
            margin-bottom: 8px;
            color: #0f172a;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 5px;
        }

        h3 {
            font-size: 11px;
            margin: 0 0 5px;
            color: #334155;
        }

        .header {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 14px;
            margin-bottom: 18px;
        }

        .brand {
            font-size: 13px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 4px;
        }

        .subtitle {
            color: #64748b;
            font-size: 9px;
        }

        .dtr-number {
            margin-top: 8px;
            font-size: 10px;
            font-weight: bold;
            color: #334155;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .info-table td,
        .info-table th {
            border: 1px solid #cbd5e1;
            padding: 7px;
            vertical-align: top;
        }

        .info-table th {
            background: #f1f5f9;
            text-align: left;
            font-weight: bold;
            color: #334155;
        }

        .label {
            font-size: 8px;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 2px;
        }

        .value {
            font-weight: bold;
            color: #0f172a;
        }

        .description {
            color: #334155;
            white-space: pre-line;
        }

        .section {
            page-break-inside: avoid;
        }

        .checklist {
            border: 1px solid #cbd5e1;
            margin-bottom: 10px;
            padding: 9px;
            page-break-inside: avoid;
        }

        .checklist-header {
            margin-bottom: 8px;
        }

        .status-checked {
            display: inline-block;
            padding: 3px 7px;
            background: #dcfce7;
            color: #166534;
            font-size: 8px;
            font-weight: bold;
        }

        .status-unchecked {
            display: inline-block;
            padding: 3px 7px;
            background: #fef2f2;
            color: #991b1b;
            font-size: 8px;
            font-weight: bold;
        }

        .photos {
            width: 100%;
            margin-top: 8px;
        }

        .photo {
            width: 47%;
            display: inline-block;
            vertical-align: top;
            margin-right: 2%;
            margin-bottom: 12px;
            border: 1px solid #cbd5e1;
            padding: 5px;
            box-sizing: border-box;
        }

        .photo:nth-child(2n) {
            margin-right: 0;
        }

        .photo img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .photo-caption {
            font-size: 8px;
            color: #475569;
            margin-top: 4px;
        }

        .video-box,
        .file-box,
        .note-box {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            padding: 9px;
            margin-top: 7px;
            page-break-inside: avoid;
        }

        .note-box {
            white-space: pre-line;
        }

        .approved-box {
            margin-top: 20px;
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            padding: 10px;
            page-break-inside: avoid;
        }

        .approved-title {
            font-weight: bold;
            color: #166534;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 25px;
            padding-top: 8px;
            border-top: 1px solid #cbd5e1;
            color: #94a3b8;
            font-size: 8px;
            text-align: center;
        }
    </style>
</head>

<body>

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <div class="brand">
            AUTO REPAIR CENTER
        </div>

        <h1>
            Panduan Perbaikan
        </h1>

        <div class="subtitle">
            Laporan Dokumentasi Technical Repair
        </div>

        <div class="dtr-number">
            DTR #{{ $repairGuide->id }}
        </div>

    </div>


    {{-- =====================================================
         INFORMASI DTR
    ====================================================== --}}

    <div class="section">

        <h2>
            1. Informasi DTR
        </h2>

        <table class="info-table">

            <tr>
                <td width="50%">
                    <div class="label">Nama Dealer</div>

                    <div class="value">
                        {{ $repairGuide->nama_dealer }}
                    </div>
                </td>

                <td width="50%">
                    <div class="label">Judul DTR</div>

                    <div class="value">
                        {{ $repairGuide->judul_dtr }}
                    </div>
                </td>
            </tr>

        </table>

    </div>


    {{-- =====================================================
         DATA KENDARAAN
    ====================================================== --}}

    <div class="section">

        <h2>
            2. Data Kendaraan
        </h2>

        <table class="info-table">

            <tr>
                <td width="50%">
                    <div class="label">No. Polisi</div>
                    <div class="value">
                        {{ $repairGuide->no_polisi }}
                    </div>
                </td>

                <td width="50%">
                    <div class="label">Model</div>
                    <div class="value">
                        {{ $repairGuide->model }}
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="label">Kode Model</div>
                    <div class="value">
                        {{ $repairGuide->kode_model }}
                    </div>
                </td>

                <td>
                    <div class="label">Tahun Pembuatan</div>
                    <div class="value">
                        {{ $repairGuide->tahun_pembuatan }}
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="label">No. Rangka</div>
                    <div class="value">
                        {{ $repairGuide->no_rangka }}
                    </div>
                </td>

                <td>
                    <div class="label">No. Mesin</div>
                    <div class="value">
                        {{ $repairGuide->no_mesin }}
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="label">Tgl. Penyerahan</div>
                    <div class="value">
                        {{ $repairGuide->tgl_penyerahan?->format('d-m-Y') }}
                    </div>
                </td>

                <td>
                    <div class="label">Tgl. Perbaikan</div>
                    <div class="value">
                        {{ $repairGuide->tgl_perbaikan?->format('d-m-Y') }}
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div class="label">Jarak Tempuh</div>
                    <div class="value">
                        {{ number_format($repairGuide->jarak_tempuh, 0, ',', '.') }}
                        km
                    </div>
                </td>
            </tr>

        </table>

    </div>


    {{-- =====================================================
         CHECKLIST PEMERIKSAAN
    ====================================================== --}}

    <div>

        <h2>
            3. Checklist Pemeriksaan
        </h2>

        @forelse ($repairGuide->checklists as $checklist)

            <div class="checklist">

                <div class="checklist-header">

                    <h3>
                        {{ $loop->iteration }}.
                        {{ $checklist->nama_checklist }}
                    </h3>

                    @if ($checklist->is_checked)

                        <span class="status-checked">
                            SUDAH DIPERIKSA
                        </span>

                    @else

                        <span class="status-unchecked">
                            BELUM DIPERIKSA
                        </span>

                    @endif

                </div>


                {{-- FOTO CHECKLIST --}}

                @if ($checklist->photos->count())

                    <h3>
                        Foto Pemeriksaan
                    </h3>

                    <div class="photos">

                        @foreach ($checklist->photos as $photo)

                            @php
                                $imagePath = storage_path(
                                    'app/public/' . $photo->foto
                                );
                            @endphp

                            @if (file_exists($imagePath))

                                <div class="photo">

                                    <img src="{{ $imagePath }}">

                                    @if ($photo->caption)

                                        <div class="photo-caption">
                                            {{ $photo->caption }}
                                        </div>

                                    @else

                                        <div class="photo-caption">
                                            Foto {{ $loop->iteration }}
                                        </div>

                                    @endif

                                </div>

                            @endif

                        @endforeach

                    </div>

                @endif


                {{-- VIDEO CHECKLIST --}}

                @if ($checklist->videos->count())

                    <h3>
                        Video Pemeriksaan
                    </h3>

                    @foreach ($checklist->videos as $video)

                        <div class="video-box">

                            <strong>
                                Video {{ $loop->iteration }}
                            </strong>

                            <p>
                                File:
                                {{ basename($video->video) }}
                            </p>

                            @if ($video->caption)

                                <p>
                                    Keterangan:
                                    {{ $video->caption }}
                                </p>

                            @endif

                        </div>

                    @endforeach

                @endif

            </div>

        @empty

            <p>
                Tidak ada checklist pemeriksaan.
            </p>

        @endforelse

    </div>


    {{-- =====================================================
         FILE PENDUKUNG
    ====================================================== --}}

    <div class="section">

        <h2>
            4. File Pendukung
        </h2>

        @forelse ($repairGuide->files as $file)

            <div class="file-box">

                <strong>
                    {{ $file->nama_file }}
                </strong>

                <p>
                    Format:
                    {{ strtoupper(
                        pathinfo(
                            $file->file,
                            PATHINFO_EXTENSION
                        )
                    ) }}
                </p>

                @if ($file->deskripsi)

                    <p>
                        {{ $file->deskripsi }}
                    </p>

                @endif

            </div>

        @empty

            <p>
                Tidak ada file pendukung.
            </p>

        @endforelse

    </div>


    {{-- =====================================================
         CATATAN KESELURUHAN
    ====================================================== --}}

    <div class="section">

        <h2>
            5. Catatan Keseluruhan
        </h2>

        <div class="note-box">

            {{ $repairGuide->catatan_keseluruhan ?: 'Tidak ada catatan keseluruhan.' }}

        </div>

    </div>


    {{-- =====================================================
         VERIFIKASI SUPER ADMIN
    ====================================================== --}}

    <div class="approved-box">

        <div class="approved-title">
            DTR TELAH DISETUJUI
        </div>

        <div>
            Status:
            <strong>
                APPROVED
            </strong>
        </div>

        @if ($repairGuide->verifiedBy)

            <div>
                Diverifikasi oleh:
                <strong>
                    {{ $repairGuide->verifiedBy->name }}
                </strong>
            </div>

        @endif

        @if ($repairGuide->verified_at)

            <div>
                Tanggal verifikasi:
                <strong>
                    {{ $repairGuide->verified_at->format('d-m-Y H:i') }}
                </strong>
            </div>

        @endif

    </div>


    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="footer">

        Auto Repair Center —
        Laporan Panduan Perbaikan DTR #{{ $repairGuide->id }}

    </div>

</body>

</html>