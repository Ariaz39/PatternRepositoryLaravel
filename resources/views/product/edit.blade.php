@extends('product.layout')
@section('title', 'Editar Producto')
@section('content')
        <div>
            <form action="{{ route('update' , $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="name" :value="__('Nombre')"/>

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                  value="{{ $data->name }}" required autofocus/>
                </div>
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Descripcion')"/>

                    <x-text-input id="description" class="block mt-1 w-full" type="text"
                                  name="description" description="description"
                                  value="{{ $data->description }}" required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Actualizar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
@endsection
