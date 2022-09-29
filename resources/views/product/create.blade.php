@extends('product.layout')
@section('title', 'Crear Producto')
@section('content')
    <div>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Nombre')"/>

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                              :value="old('name')" required autofocus/>

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div class="mt-4">
                <x-input-label for="description" :value="__('Descripcion')"/>

                <x-text-input id="description" class="block mt-1 w-full" type="text"
                              name="description" description="description"
                              :value="old('description')" required autofocus/>

                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Crear') }}
                </x-primary-button>
            </div>

            {{--                <div class="form-group">--}}
            {{--                    <label for="name">Nombre: </label>--}}
            {{--                    <input type="text" class="form-control" name="name">--}}
            {{--                </div>--}}
            {{--                <div class="form-group">--}}
            {{--                    <label for="description">Descripcion: </label>--}}
            {{--                    <input type="text" class="form-control" name="description">--}}
            {{--                </div>--}}
            {{--                <button type="submit" class="btn btn-primary">Crear producto</button>--}}
        </form>
    </div>
@endsection
