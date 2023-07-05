@extends('tiketing.index') @section('title','dashboard_admin') @section('content')
<style></style>
<div>
    <!-- hanya terlihat di admin -->
    @can('admin')
    <a href="/tiketing/create">create</a>
    @endcan
    <!-- share -->
    <!-- <form action='/tiketing'>
        <input type='text' placeholder='search' name='search' value='{{request("search")}}'/>
        <button type='submit'>search</button>
   </form> -->
   @if(session()->has('success'))
    <div >
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <strong>{{ session("success") }}</strong>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
    </div>
    @endif
    <table class="table" >
        <thead>
            <tr>
                <th>No</th>
                <th>concert name</th>
                <th>address</th>
                <th>Gate</th>
                <th>Date</th>
                <th>Image</th>
                @can('admin')
                <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($tiketing as $tiket)
            <tr>
                <td>{{$tiket->id}}</td>
                <td>{{$tiket->concert_name}}</td>
                <td>{{$tiket->address}}</td>
                <td>{{$tiket->gate}}</td>
                <td>{{$tiket->date}}</td>
                <td class="col-lg-2">
                    <image
                        class="img-fluid"
                        src="https://images.unsplash.com/photo-1671798706476-626e08f0907c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                        alt="ss"
                    />
                    <!-- <image class='img-fluid' 
                src={{ asset('storage/'. $tiket->image) }} 
                alt='ss' 
                    /> -->
                </td>
                @can('admin')
                <td>
                    <a href="/tiketing/{{$tiket->id}}/edit">Edit</a>|
                    <a
                        href="/tiketing/{{$tiket->id}}"
                        onclick="event.preventDefault();
                        document.getElementById(&quot;delete-form-{{$tiket->id}}&quot;).submit();
                        "
                        >Hapus</a
                    >
                    <form
                        action="/tiketing/{{$tiket->id}}"
                        method="POST"
                        id="delete-form-{{$tiket->id}}"
                        style="display: none"
                    >
                        @method('DELETE') @csrf
                    </form>
                </td>
                @endcan()
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- pagination -->
    {{$tiketing->links()}}
</div>

<script></script>

@endsection
