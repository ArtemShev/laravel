@extends('layouts.admin')
{{-- @section('title') Список пользователей @parent @endsection --}}
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="offset-2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div> --}}

        </div>
    </div>

    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered offset-2">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Админ</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($usersList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Пользователей нет</td></tr>
            @endforelse
            </tbody>
        </table>

        {{-- {{ $userList->links() }} --}}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        send(`/admin/news/${id}`).then(() => {
                            alert("Запись была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
