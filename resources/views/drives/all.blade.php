@extends('layouts.app')


@section('content')

<div class="container">
    <div class="col-7 m-auto">
        <table class="table caption-top bg-white text-center">
            <caption>List of All  drives</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col" >Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($drive as $item)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->status}}</td>

                    <td>
                        <a href="{{route('drive.showPublic',$item->id)}}">
                        <i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="4">sorry !  there is not any file</th>
                    <th colspan="2">
                        <a href="{{route('drive.create')}}"  class="btn btn-info">
                            Create New


                        </a>
                    </th>



                  </tr>


                @endforelse





            </tbody>
          </table>
    </div>

</div>



@endsection
