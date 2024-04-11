@extends('errors::minimal')

<x-seo-tags :title="'503 Service Unavailable'" :description="'Layanan tidak tersedia. Silakan coba lagi nanti.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />
@section('code', '503')
@section('message', __('Service Unavailable'))
@section('description', __('Layanan tidak tersedia. Silakan coba lagi nanti.'))
