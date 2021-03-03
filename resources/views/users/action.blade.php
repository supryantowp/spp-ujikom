<div class="d-flex justify-content-center">
    <a href="{{ route('users.show', ['user' => $id]) }}"
        class="btn btn-info btn-sm mx-1">
        show
    </a>
    <a href="{{ route('users.edit', ['user' => $id]) }}"
        class="btn btn-primary btn-sm mx-1">
        Edit
    </a>
</div>
