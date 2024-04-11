@extends('errors::minimal')

<x-seo-tags :title="'403 Forbidden'" :description="'Anda tidak memiliki izin untuk mengakses halaman ini. Silakan cek kembali informasi yang Anda masukkan.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />

@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('description', __('Anda tidak memiliki izin untuk mengakses halaman ini. Silakan cek kembali informasi yang Anda masukkan.'))
