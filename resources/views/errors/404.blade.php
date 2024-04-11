@extends('errors::minimal')

@section('code', '404')
@section('message', __('Not Found'))
@section('description', __('Halaman yang Anda cari tidak ditemukan'))

<x-seo-tags :title="'404 Not Found'" :description="'Halaman yang Anda cari tidak ditemukan. Dapatkan informasi terbaru seputar berita terkini, analisis mendalam, dan cerita inspiratif di Sibanyu. Jelajahi konten eksklusif yang disajikan khusus untuk Anda.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />
