@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>TAMBAH FOTO BARANG</strong>

        </div>   
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-control-label"> Nama Jamu</label>
            <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
            @foreach ($products as $product) 
                <option value="{{ $product->id }}">{{ $product->nama }}</option>           
           @endforeach
            </select>
            @error('products_id')<div class ="text-muted">{{ $message }}</div>   @enderror  
        </div>

        <div class="form-group">
            <label for="photo" class="form-control-label"> Foto Jamu</label>
            <input type="file"
                name="photo"
                value= "{{ old('photo')}}"
                accept="image/*"
                require
                class="form-control @error('photo') is-invalid @enderror"/>
                @error('photo')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
                Tambah Foto Barang
            </button>
        </div>
            </form>
        </div>     
    </div> 

@endsection