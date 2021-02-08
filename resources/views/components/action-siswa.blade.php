<div class="d-flex justify-content-center">
    <a href="{{route('siswa.edit', ['siswa' => $id])}}"
       class="btn btn-primary btn-sm mx-1">edit</a>
    <a href="{{route('siswa.show', ['siswa' => $id])}}"
       class="btn btn-info btn-sm mx-1">detail</a>
    <form action="{{route('siswa.destroy', ['siswa' => $id])}}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-sm mx-1 btn-delete">hapus</button>
    </form>
</div>
