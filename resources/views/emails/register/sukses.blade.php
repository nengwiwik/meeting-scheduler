<x-mail::message>
# Hai, {{ $meeting->nama }}!

Berikut adalah detail permohonan kunjungan Anda:

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

Anda akan menerima konfirmasi kembali maksimal dalam 2x24 jam sejak menerima email ini.

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
