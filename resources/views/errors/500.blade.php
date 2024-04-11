@extends('errors::minimal')

<x-seo-tags :title="'500 Server Error'" :description="'Dapatkan informasi terbaru seputar berita terkini, analisis mendalam, dan cerita inspiratif di Sibanyu. Jelajahi konten eksklusif yang disajikan khusus untuk Anda.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />
@section('code', '500')
@section('message', __('Server Error'))
@section('description', __('Terjadi kesalahan pada server. Mohon maaf atas ketidaknyamanan ini.'))
