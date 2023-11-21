@extends('layouts.app')


@section('content')

<div class="container">
    <div class="col-7 m-auto">
        <table class="table caption-top bg-white text-center">
            <caption>List of my drives</caption>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>

                <th scope="col" colspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($drive as $item)
                <tr>
                    <td >{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>

                    @if( $item->status == "public")

                        <td>
                            <a href="{{route("drive.changeStatus",$item->id)}}">
                                <i class="text-info-emphasis fa-solid fa-unlock"></i>
                                                        </a>
                        </td>

                    @else
                    <td>
                        <a href="{{route("drive.changeStatus",$item->id)}}">
                            <i class="text-danger-emphasis fa-solid fa-lock "></i>
                        </a>
                    </td>


                    @endif


                    <td><a href="{{route('drive.show',$item->id)}}">
                        <i class="fa-solid fa-eye"></i></a></td>
                    <td>
                        <a href="{{route('drive.edit',$item->id)}}">
                            <i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td>
                        <a href="{{route('drive.destroy',$item->id)}}">
                            <i class="fa-solid fa-trash"></i>

                        </a>
                    </td>

                @empty
                <tr>
                    <th colspan="4">sorry !  you have not any file</th>
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
