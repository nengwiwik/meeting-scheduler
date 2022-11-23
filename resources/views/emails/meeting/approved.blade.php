<x-mail::message>
# Hai, {{ $meeting->nama }}!

Berikut adalah detail kunjungan Anda:

@component('mail::table')
| Nama | Instansi | Handphone |
| :---: | :---: | :---: |
| {{ $meeting->nama }} | {{ $meeting->instansi }} | {{ $meeting->handphone }} |
@endcomponent

@component('mail::table')
| Tujuan | Waktu |
| :---: | :---: |
| {{ $meeting->tujuan }} | {{ $meeting->waktu->format('d F Y, H:i') }} GMT+7 |
@endcomponent

@component('mail::panel')
Deskripsi kunjungan:

{{ $meeting->deskripsi }}
@endcomponent

@component('mail::panel')
Mohon diperhatikan:

{{ $meeting->keterangan }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
