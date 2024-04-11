@extends('errors::minimal')

@section('code', '401')
@section('message', __('Unauthorized'))
@section('description', __('Anda tidak memiliki izin untuk mengakses halaman ini'))

<x-seo-tags :title="'401 Unauthorized'" :description="'Dapatkan informasi terbaru seputar berita terkini, analisis mendalam, dan cerita inspiratif di Sibanyu. Jelajahi konten eksklusif yang disajikan khusus untuk Anda.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />
