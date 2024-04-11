@extends('errors::minimal')

<x-seo-tags :title="'402 Payment Required'" :description="'Anda tidak memiliki izin untuk mengakses halaman ini. Silakan cek kembali informasi yang Anda masukkan.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />

@section('code', '402')
@section('message', __('Payment Required'))
@section('description', __('Anda tidak memiliki izin untuk mengakses halaman ini. Silakan cek kembali informasi yang Anda masukkan.'))
