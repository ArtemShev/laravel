@extends('layouts.admin')
{{-- @section('title') Список категорий @endsection --}}
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="offset-2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive offset-2">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
              <tr>
                  <th>#ID</th>
                  <th>Колл-во новостей</th>
                  <th>Заголовок</th>
                  <th>Описание</th>
                  <th>Опции</th>
              </tr>
            </thead>
            <tbody>
              @forelse($categories as $category)
                  <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->news_count }}</td>
                      <td>{{ $category->title }}</td>
                      <td>{{ $category->description }}</td>
                      <td>
                          <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Ред.</a>
                          &nbsp;
                          <a href="javascript:;" class="delete" rel="{{ $category->id }}" style="color:red;">Удл.</a>
                      </td>
                  </tr>
              @empty
                  <tr><td colspan="4">Записей нет</td></tr>
              @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
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
                    //send id on backend
                    send(`/admin/categories/${id}`).then(() => {
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
