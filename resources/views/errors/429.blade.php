@extends('errors::minimal')

<x-seo-tags :title="'429 Terlalu Banyak Permintaan'" :description="'Anda telah melebihi batas permintaan. Silakan coba lagi nanti.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />

@section('code', '429')
@section('message', __('Terlalu Banyak Permintaan'))
@section('description', __('Anda telah melebihi batas permintaan. Silakan coba lagi nanti.'))
