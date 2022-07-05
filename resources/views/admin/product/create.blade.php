@extends('layouts.admin')
@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm sản phẩm') }}</div>

                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="product_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tên sản phẩm') }}</label>
                                <div class="col-md-6">
                                    <input id="product_name"  type="text"
                                        class="form-control @error('product_name') is-invalid @enderror" name="product_name"
                                        value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Giá sản phẩm') }}</label>
                                <div class="col-md-6">
                                    <input id="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price') }}" required autocomplete="price" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ảnh') }}</label>
                                <div class="col-md-6">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        value="{{ old('image') }}" required autocomplete="image" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mô tả sản phẩm') }}</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" cols="10" rows="5"
                                        class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" required
                                        autocomplete="description" autofocus></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input type="hidden" name="name_active" id="name_active" cols="10" rows="5"
                                        class="form-control @error('name_active') is-invalid @enderror" value="{{ old('name_active') }}" required
                                        autocomplete="description" autofocus></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('User_id') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="user_id" id="user_id" cols="10" rows="5"
                                        class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}" required
                                        autocomplete="description" autofocus></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Auction_id') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="auction_id" id="auction_id" cols="10" rows="5"
                                        class="form-control @error('auction_id') is-invalid @enderror" value="{{ old('auction_id') }}"></textarea>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Thêm') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop()

