@extends('layouts.admin')

@section('title') Список источников - @parent @stop

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ресурсы</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить ресурс</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">

    @include('inc.message')

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название ресурса</th>
              <th scope="col">Дата последнего обновления</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
          @forelse ($sources as $source)
            <tr>
              <td>
                {{ $source->id }}
              </td>
              <td>
                {{ $source->domain }} 
              </td>
              <td>
                @if ($source->updated_at) {{ $source->updated_at->format('d-m-Y H:i') }}
                @else - @endif
              </td>
              <td>
                <a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}">Ред.</a>
                &nbsp;|&nbsp;
                <a href="javascript:;" class="delete" rel="{{ $source->id }}"  style="color:red;">Уд.</a>
              </td>
            </tr>
          @empty
            "Ресурсов нет"
          @endforelse

          <div>
            {{ $sources->links()}}
          </div>


          </tbody>
        </table>
  </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();
                return body;
            }
            const links = document.querySelectorAll(".delete");
            links.forEach(function (index) {
                index.addEventListener("click", function () {
                    if(confirm("Вы подтверждаете удаление ?")) {
                        fetchData("{{ url('/admin/sources') }}/" + this.getAttribute('rel'), {
                            method: "DELETE",
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then((data) => {
                            alert('Deleted');
                            location.reload();
                        })
                    }
                });
            });
        });
    </script>
@endpush