@extends('layout')

@section('title', trans('home.title'))

@section('styles')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('content')
    <div class="main-container">
        <div class="container-1">
            <div class="text-white pl-72 pt-40 max-w-6xl">
                <div class="text-xl">{{ trans('home.solar_panels') }}</div>
                <div class="text-5xl">{{ trans('home.install_solar_panels') }}</div>
                <div class="text-xl">{{ trans('home.Lorem_ipsum1') }}</div>
            </div>
        </div>
        <div class="container-2 flex items-center justify-between">
            <img src="assets/img/Products/placasolar-JASolar.jpg" alt="img" class="image-solar-panel">
            <div class="text-blue-900 pl-10">
                <div class="text-5xl pt-10">{{ trans('home.install_solar_panels') }}</div>
                <div class="text-xl mt-7">{{ trans('home.Lorem_ipsum2') }}</div>
                <div class="mt-7 flex flex-col gap-4">
                    <hr>
                    <div class="text-xl">{{ trans('home.sustainable_energy') }}</div>
                    <hr>
                    <div class="text-xl">{{ trans('home.long_term_savings') }}</div>
                    <hr>
                    <div class="text-xl">{{ trans('home.carbon_footprint_reduction') }}</div>
                    <hr>
                    <div class="text-xl">{{ trans('home.energy_independence') }}</div>
                    <hr>
                    <div class="text-xl">{{ trans('home.tax_incentives') }}</div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container-3 bg-[#F8F8F8] min-h-[550px] flex items-center justify-center">
            <div class="bg-white w-1/2 h-1/2 min-h-[350px] min-w-[1700px] flex items-center justify-center flex-col rounded-xl">
                <div class="text-3xl pt-10">{{ trans('home.designer_prompt') }}</div>
                <div class="text-xl mt-7">{{ trans('home.designer_description') }}</div>
                <a href="{{ route('budget_designer.index') }}"><button class="bg-[#A2C2EC] p-3 rounded-xl mt-7">{{ trans('home.view_designer') }}</button></a>
            </div>
        </div>
    </div>
@endsection
