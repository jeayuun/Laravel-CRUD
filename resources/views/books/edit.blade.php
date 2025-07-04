@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row my-5">
            <div class="col-md-3">
                @include('layouts/sidebar')
            </div>
        <div class="col-md-9">
                @include('layouts.message')
                <div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Edit Movie Details
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.update',$book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" value="{{ old('title',$book->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" id="title" />
                                @error('title')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Year</label>
                                <input type="text" value="{{ old('author',$book->author) }}" class="form-control @error('author') is-invalid @enderror" placeholder="Author"  name="author" id="author"/>
                                @error('author')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description" cols="30" rows="5">{{ old('description',$book->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image" id="image"/>
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                @if(!empty($book->image))
                                    <img class="w-25 my-3" src="{{ asset('uploads/books/thumb/'.$book->image) }}" alt="">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ ($book->status == 1) ? 'selected' : '' }} >Active</option>
                                    <option value="0" {{($book->status == 0) ? 'selected' : '' }} >Block</option>
                                </select>
                            </div>
                            <button class="btn btn-primary mt-2">Update</button>                     
                    </form>
                    </div>
                </div>                
            </div>
          </div>                
        </div>


@endsection