@extends('layouts.app')


@section('content')
    <h2 class="text-center my-3"> Update {{ $drive->name }} file</h2>

    <div class="container">
        <div class="row">
            <div class="col-7 m-auto">
                <div class="card p-3">
                    <form action="{{ route('drive.update', $drive->id) }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">File Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $drive->name }}">

                        </div>

                        <div class="mb-3">
                            <label for="discription" class="form-label">File Discription</label>
                            <input type="text" name="discription" class="form-control" id="discription"
                                value="{{ $drive->discription }}">
                        </div>


                        <div class="mb-3">
                            <label for="file" class="form-label">File Name</label>
                            <input type="file" name="file" class="form-control" id="file">
                        </div>

                        @if ($drive->status == 'privet')
                            <div class="mb-3 ">
                                <h6> Status Of file</h6>
                                <input type="radio" name="status" id="privet" value="private" checked>
                                <label for="privet">privet</label><br>
                                <input type="radio" name="status" id="public" value="public">
                                <label for="public">public</label>
                                <br>
                            </div>
                        @else
                            <div class="mb-3 ">
                                <h6> Status Of file</h6>
                                <input type="radio" name="status" id="privet" value="private">
                                <label for="privet">privet</label><br>
                                <input type="radio" name="status" id="public" value="public" checked>
                                <label for="public">public</label>
                                <br>
                            </div>
                        @endif



                        <button type="submit" class="btn btn-warning">Update </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
