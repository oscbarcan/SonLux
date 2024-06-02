@extends('layout')

@section('title', 'Index')

@section('content')
    <div class="w-full max-w-2xl mx-auto px-4 md:px-2 pb-10 md:py-10 lg:py-10">
        @php
            $contador = 0;
        @endphp
        @foreach ($providers as $provider)
            @php
                $contador++;
            @endphp
            @if ($contador % 2 == 0)
                <div class="grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-10 items-center">
                    <div class="rounded-lg overflow-hidden">
                        <img src="/assets/img/Providers/{{ $provider->img }}" alt="Provider Image" width="600" height="600"
                            class="aspect-square object-cover" />
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <h1 class="text-3xl font-bold tracking-tight">{{ $provider->name }}</h1>
                        </div>
                        <div class="prose max-w-none">
                            <p>
                                {{ $provider->description }}
                            </p>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-10 items-center">
                    <div class="grid gap-4">
                        <div>
                            <h1 class="text-3xl font-bold tracking-tight">{{ $provider->name }}</h1>
                        </div>
                        <div class="prose max-w-none">
                            <p>
                                {{ $provider->description }}
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden">
                        <img src="/assets/img/Providers/{{ $provider->img }}" alt="Provider Image" width="600"
                            height="600" class="aspect-square object-cover" />
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
