<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        DigiShare — Panduan Perbaikan  {{ $repairGuide->id }}
    </title>

    <style>

        /* =========================================================
           PAGE
        ========================================================== */

        @page {
            size: A4 portrait;
            margin: 24px 28px 30px 28px;
        }


        /* =========================================================
           GLOBAL
        ========================================================== */

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            color: #1e293b;
            line-height: 1.45;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        p {
            margin-top: 0;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .header {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        .brand {
            font-size: 12px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 3px;
        }

        .title {
            font-size: 19px;
            font-weight: bold;
            color: #0f172a;
            margin: 0;
        }

        .subtitle {
            color: #64748b;
            font-size: 8px;
            margin-top: 3px;
        }

        .dtr-number {
            margin-top: 7px;
            font-size: 9px;
            font-weight: bold;
            color: #334155;
        }


        /* =========================================================
           SECTION
        ========================================================== */

        .section {
            margin-bottom: 13px;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #0f172a;
            border-bottom: 1px solid #cbd5e1;
            padding-bottom: 5px;
            margin-bottom: 7px;
        }

        .section-description {
            color: #64748b;
            font-size: 8px;
            margin-bottom: 7px;
        }


        /* =========================================================
           INFORMATION TABLE
        ========================================================== */

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .info-table td,
        .info-table th {
            border: 1px solid #cbd5e1;
            padding: 6px 7px;
            vertical-align: top;
        }

        .info-table th {
            background: #f1f5f9;
            text-align: left;
            font-weight: bold;
            color: #334155;
        }

        .label {
            font-size: 7px;
            text-transform: uppercase;
            color: #64748b;
            margin-bottom: 2px;
        }

        .value {
            font-weight: bold;
            color: #0f172a;
            font-size: 9px;
        }


        /* =========================================================
           CHECKLIST
        ========================================================== */

        .checklist {
            border: 1px solid #cbd5e1;
            margin-bottom: 9px;
            padding: 8px;
            page-break-inside: auto;
        }

        .checklist-header {
            margin-bottom: 7px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 6px;
        }

        .checklist-title {
            font-size: 10px;
            font-weight: bold;
            color: #334155;
            margin-bottom: 5px;
        }

        .status-checked,
        .status-unchecked {
            display: inline-block;
            padding: 3px 6px;
            font-size: 7px;
            font-weight: bold;
        }

        .status-checked {
            background: #dcfce7;
            color: #166534;
        }

        .status-unchecked {
            background: #fef2f2;
            color: #991b1b;
        }


        /* =========================================================
           PHOTOS
        ========================================================== */

        .photo-heading {
            font-size: 9px;
            font-weight: bold;
            color: #334155;
            margin-top: 5px;
            margin-bottom: 6px;
        }
.photo-grid {
    width: 100%;
    border-collapse: separate;
    border-spacing: 6px;
    margin-top: 5px;
}

.photo-grid td {
    width: 50%;
    vertical-align: top;
    border: 1px solid #cbd5e1;
    background: #ffffff;
    padding: 3px;
    page-break-inside: avoid;
}

.photo-grid img {
    display: block;
    width: 100%;
    height: 95px;
    object-fit: contain;
    background: #f8fafc;
}

.photo-caption {
    font-size: 7px;
    line-height: 1.25;
    color: #475569;
    margin-top: 3px;
    padding: 0 2px;
    min-height: 9px;
}

        /* =========================================================
           VIDEO LINK
        ========================================================== */

        .video-section {
            margin-top: 8px;
        }

        .video-link {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            padding: 7px 8px;
            margin-top: 5px;
            margin-bottom: 6px;
            page-break-inside: avoid;
        }

        .video-title {
            font-size: 8.5px;
            font-weight: bold;
            color: #334155;
        }

        .video-caption {
            font-size: 7.5px;
            color: #64748b;
            margin-top: 3px;
            margin-bottom: 3px;
        }

        .video-url {
            font-size: 7.5px;
            color: #2563eb;
            line-height: 1.35;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }



        /* =========================================================
           NOTE
        ========================================================== */

        .note-box {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            padding: 8px;
            margin-top: 5px;
            page-break-inside: avoid;
            white-space: pre-line;
            color: #334155;
            font-size: 8px;
        }


        /* =========================================================
           EMPTY DATA
        ========================================================== */

        .empty-box {
            border: 1px dashed #cbd5e1;
            background: #f8fafc;
            padding: 8px;
            color: #94a3b8;
            font-size: 8px;
            text-align: center;
            margin-top: 5px;
        }


        /* =========================================================
           APPROVAL
        ========================================================== */

        .approved-box {
            margin-top: 14px;
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            padding: 9px;
            page-break-inside: avoid;
        }

        .approved-title {
            font-weight: bold;
            color: #166534;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .approved-item {
            font-size: 8px;
            color: #166534;
            margin-bottom: 2px;
        }


        /* =========================================================
           FOOTER
        ========================================================== */

        .footer {
            margin-top: 18px;
            padding-top: 6px;
            border-top: 1px solid #cbd5e1;
            color: #94a3b8;
            font-size: 7px;
            text-align: center;
        }

    </style>

</head>


<body>


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="header">

        <div class="brand">
            DIGISHARE
        </div>

        <h1 class="title">
            Panduan Perbaikan
        </h1>

        <div class="subtitle">
            Data List & Knowledge Sharing — Technical Repair Documentation
        </div>

        <div class="dtr-number">
            {{ $repairGuide->id }}
        </div>

    </div>


    {{-- =========================================================
         1. INFORMASI DTR
    ========================================================== --}}

    <div class="section">

        <div class="section-title">
            1. Informasi Panduan
        </div>

        <table class="info-table">

            <tr>

                <td width="50%">

                    <div class="label">
                        Nama Dealer
                    </div>

                    <div class="value">
                        {{ $repairGuide->nama_dealer }}
                    </div>

                </td>


                <td width="50%">

                    <div class="label">
                        Judul Perbaikan
                    </div>

                    <div class="value">
                        {{ $repairGuide->judul_dtr }}
                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================================
         2. DATA KENDARAAN
    ========================================================== --}}

    <div class="section">

        <div class="section-title">
            2. Data Kendaraan
        </div>

        <table class="info-table">

            <tr>

                <td width="50%">

                    <div class="label">
                        No. Polisi
                    </div>

                    <div class="value">
                        {{ $repairGuide->no_polisi ?: '-' }}
                    </div>

                </td>


                <td width="50%">

                    <div class="label">
                        Model
                    </div>

                    <div class="value">
                        {{ $repairGuide->model ?: '-' }}
                    </div>

                </td>

            </tr>


            <tr>

                <td>

                    <div class="label">
                        Kode Model
                    </div>

                    <div class="value">
                        {{ $repairGuide->kode_model ?: '-' }}
                    </div>

                </td>


                <td>

                    <div class="label">
                        Tahun Pembuatan
                    </div>

                    <div class="value">
                        {{ $repairGuide->tahun_pembuatan ?: '-' }}
                    </div>

                </td>

            </tr>


            <tr>

                <td>

                    <div class="label">
                        No. Rangka
                    </div>

                    <div class="value">
                        {{ $repairGuide->no_rangka ?: '-' }}
                    </div>

                </td>


                <td>

                    <div class="label">
                        No. Mesin
                    </div>

                    <div class="value">
                        {{ $repairGuide->no_mesin ?: '-' }}
                    </div>

                </td>

            </tr>


            <tr>

                <td>

                    <div class="label">
                        Tanggal Penyerahan
                    </div>

                    <div class="value">
                        {{ $repairGuide->tgl_penyerahan?->format('d-m-Y') ?: '-' }}
                    </div>

                </td>


                <td>

                    <div class="label">
                        Tanggal Perbaikan
                    </div>

                    <div class="value">
                        {{ $repairGuide->tgl_perbaikan?->format('d-m-Y') ?: '-' }}
                    </div>

                </td>

            </tr>


            <tr>

                <td colspan="2">

                    <div class="label">
                        Jarak Tempuh
                    </div>

                    <div class="value">
                        {{ number_format($repairGuide->jarak_tempuh ?? 0, 0, ',', '.') }}
                        km
                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =========================================================
         3. CHECKLIST PEMERIKSAAN
    ========================================================== --}}

    <div class="section">

        <div class="section-title">
            3. Checklist Pemeriksaan
        </div>

        <div class="section-description">
            Dokumentasi hasil pemeriksaan kendaraan berdasarkan checklist.
        </div>


        @forelse ($repairGuide->checklists as $checklist)

            <div class="checklist">

                <div class="checklist-header">

                    <div class="checklist-title">

                        {{ $loop->iteration }}.
                        {{ $checklist->nama_checklist }}

                    </div>


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


                {{-- FOTO PEMERIKSAAN --}}
                @if ($checklist->photos->count())

                    <table class="photo-grid">
    @foreach ($checklist->photos->chunk(2) as $photoRow)
        <tr>
            @foreach ($photoRow as $photo)
                <td>
                    @php
                        $imagePath = storage_path('app/public/' . $photo->foto);
                    @endphp

                    @if (file_exists($imagePath))
                        <img src="{{ $imagePath }}" alt="Foto pemeriksaan">

                        @if ($photo->caption)
                            <div class="photo-caption">
                                {{ $photo->caption }}
                            </div>
                        @else
                            <div class="photo-caption">
                                Foto {{ $loop->iteration }}
                            </div>
                        @endif
                    @endif
                </td>
            @endforeach

            {{-- Jika jumlah foto ganjil, buat kolom kosong --}}
            @if ($photoRow->count() === 1)
                <td style="border: none; background: transparent;"></td>
            @endif
        </tr>
    @endforeach
</table>

                @endif


                {{-- LINK VIDEO --}}
                @if ($checklist->videos->count())

                    <div class="video-section">

                        <div class="photo-heading">
                            Link Video Pemeriksaan Beserta File Panduan
                        </div>


                        @foreach ($checklist->videos as $video)

                            <div class="video-link">

                                <div class="video-title">
                                    Panduan {{ $loop->iteration }}
                                </div>


                                @if ($video->caption)

                                    <div class="video-caption">
                                        {{ $video->caption }}
                                    </div>

                                @endif


                                <div class="video-url">
                                    {{ $video->video }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- TIDAK ADA DOKUMENTASI --}}
                @if (
                    !$checklist->photos->count() &&
                    !$checklist->videos->count()
                )

                    <div class="empty-box">
                        Tidak ada dokumentasi untuk checklist ini.
                    </div>

                @endif

            </div>

        @empty

            <div class="empty-box">
                Tidak ada checklist pemeriksaan.
            </div>

        @endforelse

    </div>




    {{-- =========================================================
         5. CATATAN KESELURUHAN
    ========================================================== --}}

    <div class="section">

        <div class="section-title">
            4. Catatan Keseluruhan
        </div>


        <div class="note-box">

            {{ $repairGuide->catatan_keseluruhan ?: 'Tidak ada catatan keseluruhan.' }}

        </div>

    </div>


    {{-- =========================================================
         6. VERIFIKASI SUPER ADMIN
    ========================================================== --}}

    <div class="approved-box">

        <div class="approved-title">
            6. VERIFIKASI DAN PERSETUJUAN
        </div>


        <div class="approved-item">

            Status:
            <strong>
                APPROVED
            </strong>

        </div>


        @if ($repairGuide->verifiedBy)

            <div class="approved-item">

                Diverifikasi oleh:

                <strong>
                    {{ $repairGuide->verifiedBy->name }}
                </strong>

            </div>

        @endif


        @if ($repairGuide->verified_at)

            <div class="approved-item">

                Tanggal verifikasi:

                <strong>
                    {{ $repairGuide->verified_at->format('d-m-Y H:i') }}
                </strong>

            </div>

        @endif

    </div>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <div class="footer">

        DigiShare — Data List & Knowledge Sharing
        |
        Panduan Perbaikan DTR #{{ $repairGuide->id }}

    </div>


</body>

</html>