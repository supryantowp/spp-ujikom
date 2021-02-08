<div class="d-flex justify-content-center">
    <a href="{{route('spp.edit', ['spp' => $id])}}"
       class="btn btn-primary btn-sm mx-1">edit</a>
    <form action="{{route('spp.destroy', ['spp' => $id])}}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-sm mx-1 btn-delete">hapus</button>
    </form>
</div>
