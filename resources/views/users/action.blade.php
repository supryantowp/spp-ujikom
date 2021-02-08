<div class="d-flex justify-content-center">
    <a href="{{route('users.edit', ['user' => $id])}}"
       class="btn btn-primary btn-sm mx-1">Edit</a>
{{--    <form action="{{route('users.destroy', ['user' => $id])}}" method="post">--}}
{{--        @method('DELETE')--}}
{{--        @csrf--}}
{{--        <button class="btn btn-danger btn-sm mx-1 btn-delete">hapus</button>--}}
{{--    </form>--}}
</div>
