@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="col-7 m-auto">

            <h2 class="text-center"> show file {{ $drive->name }} </h2>


            <div class="card m-auto p-1 border border-white border-5 " style="width: 50%; ">
                <img src="{{ asset("Upload/$drive->file") }}" class="card-img-top" alt="...">


                <div class="card-body border border-white border-1 bg-#212529  ">
                    <h5 class="card-title"> <b>Name : </b> {{ $drive->name }}</h5>
                    <p class="card-text"><b>Discription : </b> {{ $drive->discription }}</p>
                    <p class="card-text"><b>Status : </b> {{ $drive->status }}</p>




                    <a href="{{ route('drive.edit', $drive->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Edit </a>



                    <a href="{{ route('drive.show', $drive->id) }}" class="btn btn-primary">
                        <i class="fa-solid fa-download"></i>
                        Download</a>
                </div>
            </div>



        </div>

    </div>
@endsection
